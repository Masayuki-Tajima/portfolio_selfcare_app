<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ConditionController;
use App\Http\Controllers\SignController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('top');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::middleware('auth')->group(function(){
    //ユーザーログイン後のトップページを表示
    Route::get('/users/top', [ConditionController::class, 'top'])->name('users.top');

    //体調一覧のページを表示
    Route::get('/users/{user_id}/conditions', [ConditionController::class, 'index'])->name('conditions.index');

    //体調の新規登録ページを表示
    Route::get('/users/{user_id}/conditions/add', [ConditionController::class, 'add'])->name('conditions.add');




    //体調サイン一覧のページを表示
    Route::get('/users/{user_id}/signs', [SignController::class, 'index'])->name('signs.index');

    //体調サインの新規登録ページを表示
    Route::get('/users/{user_id}/signs/create', [SignController::class, 'create'])->name('signs.create');

    //体調サインの新規登録機能
    Route::post('/users/{user_id}/signs', [SignController::class, 'store'])->name('signs.store');

    //体調サインの削除機能
    Route::delete('/users/{user_id}/signs/{sign_id}', [SignController::class, 'destroy'])->name('signs.destroy');

});
