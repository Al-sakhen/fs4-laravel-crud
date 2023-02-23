<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;


Route::get('/', function () {
    return view('welcome');
});
// Route::get('/posts', "App\Http\Controllers\PostController@index" );
Route::get('/posts', [PostController::class , 'index'] );
Route::get('/posts/create', [PostController::class , 'create'] );
Route::post('/posts/store', [PostController::class , 'store'] );
Route::get('/posts/edit/{id}', [PostController::class , 'edit'] );
Route::put('/posts/update', [PostController::class , 'update'] );
Route::delete('/posts/delete/{id}', [PostController::class , 'delete'] );



