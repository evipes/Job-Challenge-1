<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout/{product:slug}', 'CheckoutController@index');

// Clients-User

    # Route::get('/user','UserController@test');

// User

    Route::get('/user','UserController@index');
    
    Route::get('/user/beginning','UserController@createProduct')
    ->name('newUser');

    Route::get('/user/new','UserController@createProduct')
    ->name('newProduct');

// Sale

    Route::get('/sale','SaleController@test');

// Product

