<?php

use App\Http\Controllers\TaskController;
use Illuminate\Support\Facades\Route;
use Spatie\Permission\Middleware\RoleMiddleware;
use App\Http\Controllers\CategoryController;



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

Route::view('/', 'welcome');

Route::view('dashboard', 'dashboard')
    ->middleware(['auth', 'verified'])
    ->name('dashboard');

Route::view('profile', 'profile')
    ->middleware(['auth'])
    ->name('profile');

require __DIR__.'/auth.php';


Route::group(['middleware' => ['role:admin']], function () {
    // Rute yang hanya dapat diakses oleh pengguna dengan peran 'admin'
    //  Route::get('/admin', [AdminController::class, 'index']);
      route::resource('tasks',TaskController::class);
      route::resource('categories',CategoryController::class);
 });

//Route::group(['middleware' => ['can:create posts']], function () { ... });
//Route::middleware(['auth', 'permission:create posts'])->group(function () {
    // Rute yang hanya dapat diakses oleh pengguna dengan izin 'create posts'
  //  Route::post('/posts', [PostController::class, 'store']);
//});
