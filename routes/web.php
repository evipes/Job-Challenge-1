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

Auth::routes();

// Rota da página inicial
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);

// Rotas somente para quem possue o papel de vendedor
Route::get('/painel-vendedor', ['as' => 'painel-vendedor', 'uses' => 'PainelController@vendedor'])->middleware('role:vendedor');
Route::group(['prefix' => 'product', 'middleware' => ['role:vendedor']], function () {
    Route::get('/list', ['as' => 'product.list', 'uses' => 'ProductController@list']);
    Route::post('/adicionar', ['as' => 'product.adicionar', 'uses' => 'ProductController@adicionar']);
    Route::post('/edit', ['as' => 'product.edit', 'uses' => 'ProductController@edit']);
    Route::post('/delete', ['as' => 'product.delete', 'uses' => 'ProductController@delete']);
});

Route::get('/list-vendas', ['as' => 'list-vendas', 'uses' => 'SalesController@list'])->middleware('role:vendedor');

    
