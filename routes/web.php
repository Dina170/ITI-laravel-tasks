<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

use App\Http\Controllers\PostController;
use App\Http\Controllers\CommentController;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::middleware('auth')->get('/posts', [PostController::class, 'index'])->name('posts.index');
Route::middleware('auth')->post('/posts', [PostController::class, 'store'])->name('posts.store');
Route::middleware('auth')->get('/posts/create', [PostController::class, 'create'])->name('posts.create');
Route::middleware('auth')->get('/posts/{post}', [PostController::class, 'show'])->name('posts.show');
Route::middleware('auth')->get('/posts/{post}/edit', [PostController::class, 'edit'])->name('posts.edit');
Route::middleware('auth')->put('/posts/{post}', [PostController::class, 'update'])->name('posts.update');
Route::middleware('auth')->delete('/posts/{post}', [PostController::class, 'destroy'])->name('posts.destroy');


Route::middleware('auth')->get('/comments', [CommentController::class, 'index'])->name('comments.index');
Route::middleware('auth')->post('/comments', [CommentController::class, 'store'])->name('comments.store');
Route::middleware('auth')->get('/comments/create', [CommentController::class, 'create'])->name('comments.create');
Route::middleware('auth')->get('/comments/{comment}', [CommentController::class, 'show'])->name('comments.show');
Route::middleware('auth')->get('/comments/{comment}/edit', [CommentController::class, 'edit'])->name('comments.edit');
Route::middleware('auth')->put('/comments/{comment}', [CommentController::class, 'update'])->name('comments.update');
Route::middleware('auth')->delete('/comments/{comment}', [CommentController::class, 'destroy'])->name('comments.destroy');


Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
