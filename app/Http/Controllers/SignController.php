<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SignController extends Controller
{
    public function index(){
        $signs = Auth::user()->signs;

        return view('signs.index', [
            'signs' => $signs
        ]);
    }

    public function add(){
        return view('signs.add');
    }
}
