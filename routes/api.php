<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
Use App\Models\Currency;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

 
Route::middleware('auth:api')->get('currencies', 'App\Http\Controllers\CurrencyController@index');

Route::middleware('auth:api')->post('getcurrencies', 'App\Http\Controllers\CurrencyController@getcurrencies');
 
Route::middleware('auth:api')->get('currencies/{id}', 'App\Http\Controllers\CurrencyController@show');

Route::middleware('auth:api')->post('getCurrency/{ApiId}', 'App\Http\Controllers\CurrencyController@currencyHistory');

Route::middleware('auth:api')->post('currencies', 'App\Http\Controllers\CurrencyController@store');

Route::middleware('auth:api')->put('currencies/{id}', 'App\Http\Controllers\CurrencyController@update');

Route::middleware('auth:api')->delete('currencies/{id}', 'App\Http\Controllers\CurrencyController@delete');
