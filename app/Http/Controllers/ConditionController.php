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

class ConditionController extends Controller
{
    //ユーザーログイン後のトップページを表示
    public function top()
    {
        return view('users.top');
    }

    //体調一覧の表示
    public function index($user_id)
    {
        $conditions = Condition::where('user_id', '=', $user_id)->with('signs')->orderBy('date', 'desc')->get();

        return view('conditions.index', [
            'conditions' => $conditions,
        ]);
    }

    //体調の新規登録画面表示
    public function create($user_id)
    {
        $signs = Auth::user()->signs->where('user_id', '=', $user_id);

        return view('conditions.create', [
            'signs' => $signs
        ]);
    }

    //体調の新規登録機能
    public function store(ConditionRequest $request, $user_id)
    {
        //conditionテーブルへの値の挿入
        $condition = new Condition();
        $condition->user_id = $user_id;
        $condition->date = $request->input('date');
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
        $diffInSeconds = $sleep_time->diffInSeconds($wakeup_time);
        $hours = floor($diffInSeconds / 3600);
        $minutes = floor(($diffInSeconds % 3600) / 60);
        $condition->sleep_duration = $hours . ':' . $minutes;

        $condition->save();

        //condition_signテーブルへの値の挿入
        $condition->signs()->attach($request->input('good_signs'));
        $condition->signs()->attach($request->input('caution_signs'));
        $condition->signs()->attach($request->input('bad_signs'));

        //weatherテーブルへの値の挿入
        $weather = new Weather();
        $weather->condition_id = $condition->id;
        $weather->weather = '曇り';
        $weather->temperature = 26;
        $weather->humidity = 60;

        $weather->save();

        //体調一覧ページへリダイレクト
        return redirect()->route('conditions.index', ['user_id' => $user_id]);
    }

    //体調編集画面の表示
    public function edit($user_id, $condition_id)
    {
        $condition = Condition::where('user_id', '=', $user_id)->where('id', '=', $condition_id)->with('signs')->get();
        $signs = Auth::user()->signs;
        $allGoodSigns = $signs->where('sign_type', '=', 0);
        $allCautionSigns = $signs->where('sign_type', '=', 1);
        $allBadSigns = $signs->where('sign_type', '=', 2);
        $selectedGoodSignsIds = $condition[0]->signs->where('sign_type', '=', 0)->pluck('id')->toArray();
        $selectedCautionSignsIds = $condition[0]->signs->where('sign_type', '=', 1)->pluck('id')->toArray();
        $selectedBadSignsIds = $condition[0]->signs->where('sign_type', '=', 2)->pluck('id')->toArray();
        // $selectedGoodSignsIds = [0 => 1];
        // $selectedCautionSignsIds = [];
        // $selectedBadSignsIds = [];

        // dd($condition[0]->signs[0]);
        // dd('すべての良好サイン', $allGoodSigns[0]);
        // dd('選択された良好サイン', $selectedGoodSignsIds, '選択された注意サイン', $selectedCautionSignsIds, '選択された悪化サイン', $selectedBadSignsIds);

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
    public function update(ConditionRequest $request, $user_id, $condition_id)
    {
        //conditionテーブルの値を更新
        $condition = Condition::findOrFail($condition_id);
        $condition->user_id = $user_id;
        $condition->date = $request->input('date');
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
        $diffInSeconds = $sleep_time->diffInSeconds($wakeup_time);
        $hours = floor($diffInSeconds / 3600);
        $minutes = floor(($diffInSeconds % 3600) / 60);
        $condition->sleep_duration = $hours . ':' . $minutes;

        $condition->save();

        //condition_signテーブルの紐づけを更新
        $condition->signs()->sync($request->input('good_signs'));
        $condition->signs()->syncWithoutDetaching($request->input('caution_signs'));
        $condition->signs()->syncWithoutDetaching($request->input('bad_signs'));

        //体調一覧ページへリダイレクト
        return redirect()->route('conditions.index', ['user_id' => $user_id]);
    }

    //体調の削除機能
    public function destroy($user_id, $condition_id)
    {
        $condition = Condition::findOrFail($condition_id);

        $condition->delete();

        //condition_signテーブルの紐づけを削除
        $condition->signs()->detach();

        //体調一覧ページへリダイレクト
        return redirect()->route('conditions.index', ['user_id' => $user_id])->with('flash_message', '体調データを削除しました。');
    }
}
