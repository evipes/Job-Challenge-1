<?php

use Illuminate\Support\Facades\Route;

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

Route::prefix('/')->middleware('RotaProtegidaApi')->group(function () {


    Route::get('auth/user',      'Api\AuthController@user');
    Route::post('auth/logout',   'Api\AuthController@logout');

    Route::middleware('isSeller')->group(function () {
        Route::get('products',          'Api\ProductController@index');
        Route::post('product',          'Api\ProductController@store');
        Route::put('product/{id}',      'Api\ProductController@update');
        Route::delete('product/{id}',   'Api\ProductController@destroy');
        Route::put('/saler/{id}',       'API\SaleController@update');
    });

    Route::get('/saler', 'API\SaleController@index');

    Route::middleware('isClient')->group(function () {
        Route::put('user',      'Api\UserController@updateRole');
    });
});


Route::post('auth/register',    'Api\AuthController@register');
Route::post('auth/login',       'Api\AuthController@login');
Route::post('auth/refresh',     'Api\AuthController@refresh');
Route::get('/checkout/{product:slug}', 'Api\CheckoutController@index');
Route::post('/saler', 'API\SaleController@store');