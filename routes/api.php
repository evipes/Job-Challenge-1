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


    Route::get('user',      'Api\AuthController@user');
    Route::post('logout',   'Api\AuthController@logout');


    Route::middleware('isSeller')->get('/teste', function () {
        return 'nada';
    });
});


Route::post('auth/register',    'Api\AuthController@register');
Route::post('auth/login',       'Api\AuthController@login');
Route::post('auth/refresh',     'Api\AuthController@refresh');
