<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

//ログイン前のトップページ
Route::get('/', function () {
    return view('top');
})->name('top');

//ゲストユーザーログイン処理
Route::get('/guest', [AuthenticatedSessionController::class, 'guestLogin'])->name('guest.login');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::prefix('users/{user_id}/')->middleware('auth')->group(function(){

    Route::name('conditions.')->group(function(){
        //ユーザーログイン後のトップページを表示
        Route::get('top', [ConditionController::class, 'top'])->name('top');

        //体調一覧のページを表示
        Route::get('conditions', [ConditionController::class, 'index'])->name('index');

        //体調の新規登録ページを表示
        Route::get('conditions/create', [ConditionController::class, 'create'])->name('create');

        //体調の新規登録機能
        Route::post('conditions', [ConditionController::class, 'store'])->name('store');

        //体調の編集ページを表示
        Route::get('conditions/{condition_id}/edit', [ConditionController::class, 'edit'])->name('edit');

        //体調の更新機能
        Route::put('conditions/{condition_id}', [ConditionController::class, 'update'])->name('update');

        //体調の削除機能
        Route::delete('conditions/{condition_id}', [ConditionController::class, 'destroy'])->name('destroy');
    });

    Route::name('signs.')->group(function(){
        //体調サイン一覧のページを表示
        Route::get('signs', [SignController::class, 'index'])->name('index');

        //体調サインの新規登録ページを表示
        Route::get('signs/create', [SignController::class, 'create'])->name('create');

        //体調サインの新規登録機能
        Route::post('signs', [SignController::class, 'store'])->name('store');

        //体調サインの削除機能
        Route::delete('signs/{sign_id}', [SignController::class, 'destroy'])->name('destroy');
    });

});
