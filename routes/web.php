<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout/{product:slug}', 'CheckoutController@index');

/* USER */

    // Main view of logged users
    Route::get('/user','UserController@index')
    ->name('userHome');

/* PRODUCTS */

    // New product form
    Route::get('/product/create','ProductController@createProduct')
    ->name('newProduct');

    // Persist a new product on database
    Route::post('/product/create','ProductController@storeProduct');

    // Edit a product
    Route::get('/product/edit/{id}','ProductController@editProduct')
    ->name('edit_product');

    // Save a product edition
    Route::post('/product/edit/{id}','ProductController@saveProduct')
    ->name('save_product');

    // Show a resume about the product and the salles
    Route::get('/product/stats','ProductController@statsProduct')
    ->name('stats_product');

    // Destroy a product from database
    Route::delete('/product/destroy','ProductController@destroyProduct')
    ->name('destroy_product');

/* SALES */

    //Buy a product
    Route::get('/sale','SaleController@test');

/* CLIENT */


/* GENERAL */

    // Formulario de login
    Route::get('/login','LoginController@acessForm')
    ->name('login');

    // Executa Login
    Route::post('/login','LoginController@login');

    // New User form
    Route::get('/login/create','UserController@createUser')
    ->name('newUser');

    // New User persist
    Route::post('/login/create','RegisterController@store')
    ->name('newUser');

    // Testes
    Route::get('/teste','TesteController@testSlug')
    ->name('teste');
