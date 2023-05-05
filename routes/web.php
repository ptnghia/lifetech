<?php

use App\Http\Controllers\admin\HomeAdminController;
use App\Http\Controllers\admin\LoginAdminController;
use Illuminate\Support\Facades\Auth;
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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes(); //route đăng nhập, đăng ký....

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');


Route::prefix('admin')->name('admin.')->middleware(['auth:admin'])->group(function () {
    Route::get('/', [HomeAdminController::class, 'index'])->name('home');
});

Route::prefix('admin')->name('admin.')->group(function () {
    Route::get('/login', [LoginAdminController::class, 'index'])->name('login');
    Route::post('/login', [LoginAdminController::class, 'login']);
    Route::post('/logout', [LoginAdminController::class, 'logout'])->name('logout');
});