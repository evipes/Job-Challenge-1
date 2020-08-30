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



// Rota para exibir página de vendas
Route::get('/checkout/{product}',['as' => 'checkout.{product}', 'uses' => 'CheckoutController@index']);


// Rota da página inicial
Route::get('/', ['as' => 'home', 'uses' => 'IndexController@index']);

// Rota do CRUD produtos
Route::group(['prefix' => 'product', 'middleware' => ['role:vendedor']], function () {
    Route::get('/index', ['as' => 'product.index', 'uses' => 'ProductController@index']);
    Route::post('/store', ['as' => 'product.store', 'uses' => 'ProductController@store']);
    Route::post('/update', ['as' => 'product.update', 'uses' => 'ProductController@update']);
    Route::post('/destroy', ['as' => 'product.destroy', 'uses' => 'ProductController@destroy']);
});

// Rota para listar vendas
Route::get('/list-vendas', ['as' => 'list-vendas', 'uses' => 'SalesController@list_vendas'])->middleware('role:vendedor');

// Rotas somente para quem possue o papel de vendedor
Route::get('/painel-vendedor', ['as' => 'painel-vendedor', 'uses' => 'PainelController@vendedor'])->middleware('role:vendedor');

// Rota para o painel de vendedor
Route::get('/painel-cliente', ['as' => 'painel-cliente', 'uses' => 'PainelController@cliente'])->middleware('role:cliente');

// Rota para listar compras
Route::get('/list-compras', ['as' => 'list-compras', 'uses' => 'SalesController@list_compras'])->middleware('role:cliente');

// Tota de compra
Route::post('/checkout/store', ['as' => 'checkout.store', 'uses' => 'CheckoutController@store']);




























