<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;

class ConditionController extends Controller
{
    public function top()
    {
        return view('users/top');
    }

    public function index($user_id)
    {
        // $conditions = Auth::user()->conditions->orderBy('date', 'desc')->get();
        $conditions = Condition::find($user_id);
        // dd($conditions);

        return view('conditions.index', compact('conditions'));
    }
}
