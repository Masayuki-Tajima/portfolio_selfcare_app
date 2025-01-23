<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ModalController extends Controller
{
    public function modal()
    {
        $signs = Auth::user()->signs;
        return view('modal', [
            'signs' => $signs
        ]);
    }
}
