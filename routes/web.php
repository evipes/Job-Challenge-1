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
Auth::routes(['verify' => true]);

Route::get('/', 'HomeController@index')->name('home');
Route::get('/products', 'ProductsController@index')->name('products');

// ROTAS CLIENTE
Route::group(['namespace' => 'Client', ], function()
{
    // ÁREA PROTEGIDA
    Route::group(['prefix' => 'cliente', 'as' => 'client.', 'middleware' => 'auth:client'], function () {
       Route::get('/', 'ClientController@index')->name('dash');
    });
});

// ROTAS VENDEDOR
Route::group(['namespace' => 'Vendor', 'prefix' => 'vendedor',  'as' => 'vendor.'], function()
{
    // ÁREA PROTEGIDA
    Route::group(['middleware' => 'auth:vendor'], function () {
        Route::get('/', 'VendorController@index')->name('dash');
    });
});
