<?php

use App\Http\Controllers\PostController;
use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});
// Route::get('/posts', "App\Http\Controllers\PostController@index" );
Route::get('/posts', [PostController::class , 'index'] );


