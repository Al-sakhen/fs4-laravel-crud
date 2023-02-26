<?php

use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

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


//  ============= breeze routes =================
Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';
