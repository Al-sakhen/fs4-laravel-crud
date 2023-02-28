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
use App\Models\User;

Route::get('/', function () {
    return view('welcome');
});
// =====   old routes ======
// Route::get('/posts', "App\Http\Controllers\PostController@index" );

Route::middleware('test:admin')->controller(PostController::class)->prefix('posts')->name('posts.')->group(function(){
    Route::get('/', 'index')->name('index');
    Route::get('/create', 'create')->name('create');
    Route::post('/store', 'store')->name('store');
    Route::get('/edit/{id}', 'edit')->name('edit');
    Route::put('/update', 'update')->name('update');
    Route::delete('/delete/{id}', 'destroy')->name('destroy');
});

// ====== new routes =========
// Route::resource('posts' , PostController::class)->middleware('test:student');


Route::get('/test', function(){

    $user = User::withCount('posts')->find(2);

    return $user ;
});





















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
