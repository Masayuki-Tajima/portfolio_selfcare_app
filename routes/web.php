<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\AuthenticatedSessionController;

Route::get('/', function () {
    return view('top');
});

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

Route::prefix('users/')->middleware('auth')->group(function(){
    //ユーザーログイン後のトップページを表示
    Route::get('{user_id}/top', [ConditionController::class, 'top'])->name('conditions.top');

    Route::name('conditions.')->group(function(){
        //体調一覧のページを表示
        Route::get('{user_id}/conditions', [ConditionController::class, 'index'])->name('index');

        //体調の新規登録ページを表示
        Route::get('{user_id}/conditions/create', [ConditionController::class, 'create'])->name('create');

        //体調の新規登録機能
        Route::post('{user_id}/conditions', [ConditionController::class, 'store'])->name('store');

        //体調の編集ページを表示
        Route::get('{user_id}/conditions/{condition_id}/edit', [ConditionController::class, 'edit'])->name('edit');

        //体調の更新機能
        Route::put('{user_id}/conditions/{condition_id}', [ConditionController::class, 'update'])->name('update');

        //体調の削除機能
        Route::delete('{user_id}/conditions/{condition_id}', [ConditionController::class, 'destroy'])->name('destroy');
    });

    Route::name('signs.')->group(function(){
        //体調サイン一覧のページを表示
        Route::get('{user_id}/signs', [SignController::class, 'index'])->name('index');

        //体調サインの新規登録ページを表示
        Route::get('{user_id}/signs/create', [SignController::class, 'create'])->name('create');

        //体調サインの新規登録機能
        Route::post('{user_id}/signs', [SignController::class, 'store'])->name('store');

        //体調サインの削除機能
        Route::delete('{user_id}/signs/{sign_id}', [SignController::class, 'destroy'])->name('destroy');
    });

});
