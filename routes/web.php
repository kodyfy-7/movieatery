<?php

use App\Http\Controllers\MovieController;
use App\Http\Controllers\CommentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Route::get('/', [MovieController::class, 'index']);
// Route::get('/create', [MovieController::class, 'create']);
// Route::post('/', [MovieController::class, 'store']);

Route::resource('movies', MovieController::class);
Route::resource('comments', CommentController::class);

Route::get('/testing', function () {
    return view('template');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
