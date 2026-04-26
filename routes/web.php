<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;
use App\Http\Controllers\Auth\GoogleController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Public
|--------------------------------------------------------------------------
*/

Route::get('/', function () {
    return view('welcome');
});

/*
|--------------------------------------------------------------------------
| Google Login（未ログインのみ）
|--------------------------------------------------------------------------
*/

Route::middleware('guest')->group(function () {
    Route::get('/auth/google/redirect', [GoogleController::class, 'redirect'])
        ->name('google.redirect');

    Route::get('/auth/google/callback', [GoogleController::class, 'callback'])
        ->name('google.callback');
});

/*
|--------------------------------------------------------------------------
| Posts（公開）
|--------------------------------------------------------------------------
*/

// 一覧
Route::get('/posts', [PostController::class, 'index'])
    ->name('posts.index');

// 詳細（IDのみ許可）
Route::get('/posts/{post}', [PostController::class, 'show'])
    ->whereNumber('post')
    ->name('posts.show');

/*
|--------------------------------------------------------------------------
| Auth Required
|--------------------------------------------------------------------------
*/

Route::middleware('auth')->group(function () {

    // 投稿作成
    Route::get('/posts/create', [PostController::class, 'create'])
        ->name('posts.create');

    Route::post('/posts', [PostController::class, 'store'])
        ->name('posts.store');

    // 編集
    Route::get('/posts/{post}/edit', [PostController::class, 'edit'])
        ->whereNumber('post')
        ->name('posts.edit');

    Route::put('/posts/{post}', [PostController::class, 'update'])
        ->whereNumber('post')
        ->name('posts.update');

    Route::delete('/posts/{post}', [PostController::class, 'destroy'])
        ->whereNumber('post')
        ->name('posts.destroy');

    // コメント
    Route::post('/posts/{post}/comments', [CommentController::class, 'store'])
        ->whereNumber('post')
        ->name('comments.store');

    // マイ投稿
    Route::get('/myposts', [PostController::class, 'myPosts'])
        ->name('posts.my');

    /*
    |--------------------------------------------------------------------------
    | Dashboard
    |--------------------------------------------------------------------------
    */

    Route::get('/dashboard', function () {
        return redirect()->route('posts.index');
    })->name('dashboard');

    // プロフィール
    Route::get('/profile', [ProfileController::class, 'edit'])
        ->name('profile.edit');

    Route::patch('/profile', [ProfileController::class, 'update'])
        ->name('profile.update');

    Route::delete('/profile', [ProfileController::class, 'destroy'])
        ->name('profile.destroy');
});

/*
|--------------------------------------------------------------------------
| Laravel Auth Routes
|--------------------------------------------------------------------------
*/

require __DIR__.'/auth.php';