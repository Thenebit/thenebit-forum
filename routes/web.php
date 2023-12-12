<?php

use App\Http\Controllers\CommentController;
use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', [PostController::class, 'index']);

Route::get('create-post', [PostController::class, 'create']);

Route::post('save', [PostController::class, 'store']);

Route::get('test', [PostController::class, 'test']);

Route::get('show/{id}', [PostController::class, 'show']);

Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');

