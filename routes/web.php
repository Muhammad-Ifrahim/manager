<?php

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
 Route::resource('/','ApplicationController');

// Route::get('/', function () {
//     return view('layouts/master');
// });

Route::resource('customer','CustomerController');
