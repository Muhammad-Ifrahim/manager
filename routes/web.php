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
                 
                 // Customer Panel
Route::resource('customer','CustomerController');
<<<<<<< HEAD
Route::resource('employee','EmployeeController');
=======
             
                // Customize Dashboard
Route::resource('customize','CustomizeController');
                
                //Fixed Asset
Route::resource('fixedasset', 'FixedAssetController');
>>>>>>> 8390704a219c4a8bb2b4f93f8149f2789aaded68

