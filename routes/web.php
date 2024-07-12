<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SessionController;
use App\Http\Controllers\Admin\UserController;

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

Route::get('/', [HomeController::class, 'home'])->name('login');
Route::post('dashboard', [SessionController::class, 'login'])->name('home');
Route::post('logout', [SessionController::class, 'logout'])->name('logout');

Route::group(['middleware' => 'auth'], function () {

  Route::get('dashboard', [HomeController::class, 'panel'])->name('panel');

  Route::resource('/users', UserController::class)->names('users');
});
