<?php

use Illuminate\Http\Request;

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

Route::get('products/{id}', 'ProductController@show');
Route::get('products','ProductController@index');
Route::post('products/store','ProductController@store');
Route::put('products/{id}/update','ProductController@update');
Route::delete('products/{id}/delete','ProductController@destroy');