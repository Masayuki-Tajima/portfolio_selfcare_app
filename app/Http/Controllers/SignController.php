<?php

namespace App\Http\Controllers;

use App\Models\Sign;
use Illuminate\Http\Request;
use App\Http\Requests\SignRequest;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    public function index(){
        $signs = Auth::user()->signs;

        return view('signs.index', [
            'signs' => $signs
        ]);
    }

    public function create(){
        return view('signs.create');
    }

    public function store(SignRequest $request){
        $sign = new Sign();
        $sign->user_id = Auth::id();
        $sign->sign = $request->input('sign');
        $sign->sign_type = $request->input('sign_type');
        $sign->save();

        return redirect()->route('signs.index');
    }
}
