<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;


Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::get('/', [PostController::class, 'index']);

Route::get('create-post', [PostController::class, 'create']);

Route::post('save', [PostController::class, 'store']);

Route::get('test', [PostController::class, 'test']);

Route::get('show/{id}', [PostController::class, 'show']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

