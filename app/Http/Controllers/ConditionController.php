<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Requests\ConditionRequest;
use App\Models\Sign;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Weather;

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
        $conditions = Condition::where('user_id', '=', $user_id)->with('signs')->get();

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
        $condition->sleep_duration = $request->input('sleep_duration');

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
}
