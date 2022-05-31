<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('welcome')->middleware('guest');
Route::get('/home', HomeController::class)->name('home')->middleware('auth');
Route::get('/me', MeController::class)->name('me')->middleware('auth');
Route::view('/single', 'single');
Route::view('/category', 'category')->name('stories');

Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/new-story', [PostController::class, 'create'])->name('new-story')->middleware('auth');

Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit');
Route::post('/post', [PostController::class, 'store'])->name('post.store');

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified'
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});
