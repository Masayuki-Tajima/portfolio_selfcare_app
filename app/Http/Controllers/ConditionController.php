<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Requests\ConditionRequest;
use App\Models\Sign;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Weather;
use Carbon\Carbon;
use GuzzleHttp\Client;
use OpenAI\Laravel\Facades\OpenAI;

class ConditionController extends Controller
{
    //ユーザーログイン後のトップページを表示
    public function top(int $user_id)
    {
        return view('conditions.top', [
            'user_id' => $user_id
        ]);
    }

    //体調一覧の表示
    public function index(int $user_id, Request $request)
    {
        if($request->has('good_signs') || $request->has('caution_signs') || $request->has('bad_signs')){
            //検索フォームから体調サインが送信された場合の処理
            if($request->input('good_signs') == null){
                $goodSignsIds = array();
            }else{
                $goodSignsIds = $request->input('good_signs');
            }

            if($request->input('caution_signs') == null){
                $cautionSignsIds = array();
            }else{
                $cautionSignsIds = $request->input('caution_signs');
            }

            if($request->input('bad_signs') == null){
                $badSignsIds = array();
            }else{
                $badSignsIds = $request->input('bad_signs');
            }

            $searchSignsIds = array_merge($goodSignsIds, $cautionSignsIds, $badSignsIds);

            $conditions = Condition::where('user_id', '=', $user_id)->with('signs')->whereHas('signs', function($query) use($searchSignsIds) {
                $query->whereIn('signs.id', $searchSignsIds);
            })->orderBy('conditions.date', 'desc')->get();
        }else{
            //すべてのデータを表示する処理
            $conditions = Condition::where('user_id', '=', $user_id)->with('signs')->orderBy('date', 'desc')->get();
        }

        //すべての体調サイン
        $allSigns = Auth::user()->signs;

        return view('conditions.index', [
            'conditions' => $conditions,
            'allSigns' => $allSigns
        ]);
    }

    //体調の新規登録画面表示
    public function create(int $user_id)
    {
        $signs = Auth::user()->signs->where('user_id', '=', $user_id);

        return view('conditions.create', [
            'signs' => $signs
        ]);
    }

    //体調の新規登録機能
    public function store(ConditionRequest $request, int $user_id)
    {
        //conditionテーブルへの値の挿入
        $condition = new Condition();
        $condition->user_id = $user_id;
        $condition->date = now()->format('Y-m-d');
        $condition->sleep_time = $request->input('sleep_time');
        $condition->wakeup_time = $request->input('wakeup_time');
        $condition->exercise = $request->input('exercise');
        $condition->breakfast = $request->input('breakfast');
        $condition->lunch = $request->input('lunch');
        $condition->dinner = $request->input('dinner');
        $condition->comment = $request->input('comment');

        //睡眠時間を計算
        $sleep_time = new Carbon($request->input('sleep_time'));
        $wakeup_time = new Carbon($request->input('wakeup_time'));
        $condition->sleep_duration = $this->calculateSleepDuration($sleep_time, $wakeup_time);

        $condition->save();

        //condition_signテーブルへの値の挿入
        $condition->signs()->attach($request->input('good_signs'));
        $condition->signs()->attach($request->input('caution_signs'));
        $condition->signs()->attach($request->input('bad_signs'));

        //天気情報取得の準備
        $city_name = $request->area;
        $city_latitude = config('const.positions.' . $city_name . '.lat');  //緯度
        $city_longitude = config('const.positions.' . $city_name . '.lon'); //経度
        $api_key = config('const.api.weather.key');
        $base_url = config('const.api.weather.url');
        $url = $base_url . '?lat=' . $city_latitude . '&lon=' . $city_longitude . '&appid=' . $api_key . '&lang=ja&units=metric';

         // apiに接続
        $client = new Client();
        $response = $client->request('GET', $url);
        $weather_data = $response->getBody();
        $weather_data = json_decode($weather_data, true);

        //weatherテーブルへの値の挿入
        $weather = new Weather();
        $weather->condition_id = $condition->id;
        $weather->weather = $weather_data['weather'][0]['description'];
        $weather->temperature = $weather_data['main']['temp'];
        $weather->humidity = $weather_data['main']['humidity'];
        $weather->save();

        //chatGPTと接続し、返信コメントを受け取る
        $inputText=$condition->comment;
        if($inputText!=null) {
            $responseText = $this->generateResponse($inputText);
        }

        //体調一覧ページへリダイレクト
        return redirect()->route('conditions.index', ['user_id' => $user_id])->with('responseMessage', $responseText)->with('flash_message', '体調データを新規に作成しました。');
    }

    //体調編集画面の表示
    public function edit(int $user_id, int $condition_id)
    {
        $condition = Condition::where('user_id', '=', $user_id)->where('id', '=', $condition_id)->with('signs')->get();
        $signs = Auth::user()->signs;
        $allGoodSigns = $signs->where('sign_type', '=', 0);
        $allCautionSigns = $signs->where('sign_type', '=', 1);
        $allBadSigns = $signs->where('sign_type', '=', 2);
        $selectedGoodSignsIds = $condition[0]->signs->where('sign_type', '=', 0)->pluck('id')->toArray();
        $selectedCautionSignsIds = $condition[0]->signs->where('sign_type', '=', 1)->pluck('id')->toArray();
        $selectedBadSignsIds = $condition[0]->signs->where('sign_type', '=', 2)->pluck('id')->toArray();

        return view('conditions.edit', [
            'condition' => $condition,
            'allGoodSigns' => $allGoodSigns,
            'allCautionSigns' => $allCautionSigns,
            'allBadSigns' => $allBadSigns,
            'selectedGoodSignsIds' => $selectedGoodSignsIds,
            'selectedCautionSignsIds' => $selectedCautionSignsIds,
            'selectedBadSignsIds' => $selectedBadSignsIds,
        ]);

    }

    //体調の更新機能
    public function update(ConditionRequest $request, int $user_id, int $condition_id)
    {
        //conditionテーブルの値を更新
        $condition = Condition::findOrFail($condition_id);
        $condition->user_id = $user_id;
        $condition->sleep_time = $request->input('sleep_time');
        $condition->wakeup_time = $request->input('wakeup_time');
        $condition->exercise = $request->input('exercise');
        $condition->breakfast = $request->input('breakfast');
        $condition->lunch = $request->input('lunch');
        $condition->dinner = $request->input('dinner');
        $condition->comment = $request->input('comment');

        //睡眠時間を計算
        $sleep_time = new Carbon($request->input('sleep_time'));
        $wakeup_time = new Carbon($request->input('wakeup_time'));
        $condition->sleep_duration = $this->calculateSleepDuration($sleep_time, $wakeup_time);

        $condition->save();

        //condition_signテーブルの紐づけを更新
        $condition->signs()->sync($request->input('good_signs'));
        $condition->signs()->syncWithoutDetaching($request->input('caution_signs'));
        $condition->signs()->syncWithoutDetaching($request->input('bad_signs'));

        //体調一覧ページへリダイレクト
        return redirect()->route('conditions.index', ['user_id' => $user_id])->with('flash_message', '体調データを更新しました。');
    }

    //体調の削除機能
    public function destroy(int $user_id, int $condition_id)
    {
        $condition = Condition::findOrFail($condition_id);

        $condition->delete();

        //condition_signテーブルの紐づけを削除
        $condition->signs()->detach();

        //体調一覧ページへリダイレクト
        return redirect()->route('conditions.index', ['user_id' => $user_id])->with('flash_message', '体調データを削除しました。');
    }

    /**
     * 睡眠時間を計算する関数
     */
    private function calculateSleepDuration($sleep_time, $wakeup_time)
    {
        $diffInSeconds = $sleep_time->diffInSeconds($wakeup_time);
        $hours = floor($diffInSeconds / 3600);
        $minutes = floor(($diffInSeconds % 3600) / 60);

        return $hours . ':' . $minutes;
    }

    /**
     * chatGPTから回答を得て返す関数
     */
    private function generateResponse($inputText)
    {
        $result = OpenAI::completions()->create([
            'model' => 'gpt-3.5-turbo-instruct',
            'prompt' => '今日の体調を教えます。'.$inputText.'励ます言葉を5文以内で教えてください。',
            'temperature' => 0.8,
            'max_tokens' => 100,
        ]);
        return $result['choices'][0]['text'];
    }

}
