<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('index');
});

Route::get('/checkout/{product:slug}', 'CheckoutController@index');


/* USER */

    // Main view of logged users
    Route::get('/user','UserController@index');

    // New product form
    Route::get('/product/create','ProductController@createProduct')
    ->name('newProduct');

    // Persist a new product on database
    Route::post('/product/create','ProductController@saveProduct');

    // New User form
    Route::get('/user/beginning','UserController@createUser')
    ->name('newUser');

    // Persist user on database
    Route::post('/user/beginning','UserController@saveUser');


/* SALES */

    Route::get('/sale','SaleController@test');

/* CLIENT */


/* GENERAL */

 // Formulario de login
 Route::get('/login','LoginController@acessForm')
 ->name('login');

 // Executa Login
 Route::post('/login','LoginController@login');


  // Testes
  Route::get('/teste','TesteController@testSlug')
  ->name('teste');
