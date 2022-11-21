<?php

use App\Http\Controllers\{
    CategoryController, 
    CommentController, 
    MovieController, 
    SearchController,
    HomeController
};
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

// 
// Route::get('/create', [MovieController::class, 'create']);
// Route::post('/', [MovieController::class, 'store']);

Route::get('/', [MovieController::class, 'index'])->name('welcome');
Route::post('/search', [SearchController::class, 'index'])->name('search');
Route::resource('movies', MovieController::class)->except('index');

Route::resource('comments', CommentController::class);

Route::get('/testing', function () {
    return view('template');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->middleware(['auth', 'user-access:admin'])->group(function () {
  
    Route::get('home', [HomeController::class, 'adminHome'])->name('home');

    Route::resource('categories', CategoryController::class);
});
  
/*------------------------------------------
--------------------------------------------
All Admin Routes List
--------------------------------------------
--------------------------------------------*/
Route::middleware(['auth', 'user-access:manager'])->group(function () {
  
    Route::get('/manager/home', [HomeController::class, 'managerHome'])->name('manager.home');
});