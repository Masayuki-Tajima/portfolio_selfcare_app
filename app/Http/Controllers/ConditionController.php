<?php

namespace App\Http\Controllers;

use App\Models\Condition;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use App\Models\Weather;

class ConditionController extends Controller
{
    public function top()
    {
        return view('users/top');
    }

    public function index($user_id)
    {
        // $conditions = Auth::user()->conditions->orderBy('date', 'desc')->get();
        $conditions = Auth::user()->conditions;
        // $conditions = Condition::findOrFail($user_id);
        // dd(Condition::with('weather')->findOrFail($user_id));
        // dd(Auth::user()->conditions);

        return view('conditions.index', [
            'conditions' => $conditions,
        ]);
    }
}
