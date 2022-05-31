<?php

use App\Http\Controllers\CategoryController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\MeController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\UserCommentsController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\WelcomeController;
use Illuminate\Support\Facades\Route;

Route::get('/', WelcomeController::class)->name('welcome');
Route::get('/home', HomeController::class)->name('home')->middleware('auth');
Route::get('category/{category}', [CategoryController::class, 'show'])->name('category.show');

Route::get('/me', MeController::class)->name('me')->middleware('auth');
Route::get('/user/{user}', [UserController::class, 'show'])->name('user.show');
Route::get('/user/{user}/comments', [UserCommentsController::class, 'show'])->name('user.comments');

Route::get('/new-story', [PostController::class, 'create'])->name('new-story')->middleware('auth');
Route::get('/post/{post}/edit', [PostController::class, 'edit'])->name('post.edit')->middleware('auth');
Route::get('/post/{post}', [PostController::class, 'show'])->name('post.show');
Route::post('/post', [PostController::class, 'store'])->name('post.store')->middleware('auth');
Route::put('/post/{post}', [PostController::class, 'update'])->middleware('auth');
