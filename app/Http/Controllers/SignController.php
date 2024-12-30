<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Illuminate\Http\Request;
use App\Http\Requests\SignRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SignController extends Controller
{
    //体調サインの一覧表示
    public function index(){
        $signs = Auth::user()->signs;

        return view('signs.index', [
            'signs' => $signs
        ]);
    }

    // 体調サインの新規登録画面表示
    public function create(){
        return view('signs.create');
    }

    //体調サインの新規登録機能
    public function store(SignRequest $request, $user_id){
        $sign = new Sign();
        $sign->user_id = Auth::id();
        $sign->sign = $request->input('sign');
        $sign->sign_type = $request->input('sign_type');
        $sign->save();

        return redirect()->route('signs.index', ['user_id' => $user_id])->with('flash_message', '登録が完了しました。');
    }

    //体調サインの削除機能
    public function destroy($user_id, $sign_id){
        // dd($sign_id);
        Sign::findOrFail($sign_id)->delete();

        return redirect()->route('signs.index', ['user_id' => $user_id])->with('flash_message', '体調サインを削除しました。');
    }
}
