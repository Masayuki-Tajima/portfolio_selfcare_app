<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use App\Http\Requests\ConditionRequest;
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

        return view('conditions.add', [
            'signs' => $signs
        ]);
    }

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
}
