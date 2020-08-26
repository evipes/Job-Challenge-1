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

Route::get('/', 'IndexController@index');

Route::get('/checkout/{product:slug}', 'CheckoutController@index');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::group(['prefix' => 'product', 'middleware' => ['role:vendedor']], function () {
    Route::get('/list', ['as' => 'product.list', 'uses' => 'ProductController@list']);
    Route::post('/adicionar', ['as' => 'product.adicionar', 'uses' => 'ProductController@adicionar']);
    Route::post('/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
    Route::post('/delete', ['as' => 'product.delete', 'uses' => 'ProductController@delete']);
});
