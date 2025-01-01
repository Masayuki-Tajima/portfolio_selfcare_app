<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\View\View;
use App\Models\User;

class AuthenticatedSessionController extends Controller
{
    /**
     * Display the login view.
     */
    public function create(): View
    {
        return view('auth.login');
    }

    /**
     * Handle an incoming authentication request.
     */
    public function store(LoginRequest $request): RedirectResponse
    {
        $request->authenticate();

        $request->session()->regenerate();

        //ユーザーログイン後のトップページにリダイレクト
        return redirect()->intended(route('users.top', absolute: false));
    }

    /**
     * ゲストログイン機能
     */
    // ゲストユーザー用のユーザーIDを定数として定義
    private const GUEST_USER_ID = 1;

    public function guestLogin()
    {
        // id=1 のゲストユーザー情報がDBに存在すれば、ゲストログインする
        if(Auth::loginUsingId(self::GUEST_USER_ID)){
            return redirect()->route('users.top');
        }

        return view('top');
    }

    /**
     * Destroy an authenticated session.
     */
    public function destroy(Request $request): RedirectResponse
    {
        Auth::guard('web')->logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/');
    }
}
