<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::post('/comments', [CommentController::class, 'store'])->name('comments.store');
// Route::get('/comments/create', 'CommentController@create')->name('comments.create');
// Route::get('/comments/{comment}', 'CommentController@show')->name('comments.show');
// Route::get('/comments/{comment}/edit', 'CommentController@edit')->name('comments.edit');
// Route::put('/comments/{comment}', 'CommentController@update')->name('comments.update');
// Route::delete('/comments/{comment}', 'CommentController@destroy')->name('comments.destroy');
