<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
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
        $conditions = Auth::user()->conditions;
        $signs = Auth::user()->signs->where('user_id', '=', $user_id);
        // $signs = Condition::findOrFail($user_id)->signs;
        // dd(Auth::user()->signs->where('user_id', '=', $user_id));

        return view('conditions.index', [
            'conditions' => $conditions,
            'signs' => $signs,
        ]);
    }

    //体調の新規登録画面表示
    public function create($user_id){
        $signs = Condition::findOrFail($user_id)->signs;

        return view('conditions.add', [
            'signs' => $signs
        ]);
    }
}
