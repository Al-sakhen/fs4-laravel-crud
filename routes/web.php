<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;
use App\Http\Controllers\TestController;

Route::get('/', function () {
    return view('welcome');
});
// =====   old routes ======
// Route::get('/posts', "App\Http\Controllers\PostController@index" );
// Route::get('/posts', [PostController::class, 'index'])->name('posts.index');
// Route::get('/posts/create', [PostController::class, 'create'])->name('posts.create');
// Route::post('/posts/store', [PostController::class, 'store'])->name('posts.store');
// Route::get('/posts/edit/{id}', [PostController::class, 'edit'])->name('posts.edit');
// Route::put('/posts/update', [PostController::class, 'update'])->name('posts.update');
// Route::delete('/posts/delete/{id}', [PostController::class, 'delete'])->name('posts.delete');

// ====== new routes =========
Route::resource('posts' , PostController::class);

