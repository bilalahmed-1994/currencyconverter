<?php

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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/generateToken', [App\Http\Controllers\HomeController::class, 'generateToken'])->name('generateToken');
Route::get('/getToken', [App\Http\Controllers\HomeController::class, 'getToken'])->name('getToken');
Route::get('/currency', [App\Http\Controllers\HomeController::class, 'currency'])->name('currency');

