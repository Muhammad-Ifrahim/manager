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

Route::get('/','ApplicationController@index');
Route::resource('customer','CustomerController');
Route::resource('employee','EmployeeController');
Route::resource('customize','CustomizeController');                
//Fixed Asset
Route::resource('fixedasset', 'FixedAssetController');
Route::resource('settings', 'SettingController');
Route::resource('date-setter', 'DateSettingController');
Route::resource('business', 'BusinessController');
// Performa
Route::resource('performa','PerformaController');
//Inventory
Route::resource('Inventory','InventoryController');