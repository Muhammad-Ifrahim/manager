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

Route::get('/file/{id}','ApplicationController@index');      
//Route::get('/file/{id}', 'ApplicationController@som');
// Customer Panel
Route::resource('customer','CustomerController');
//Route::resource('employee','EmployeeController');
Route::get('/file/{bId}/employee','EmployeeController@index');
Route::get('/file/{bId}/employee/create','EmployeeController@create');
Route::get('/file/{bId}/employee/{id}/edit','EmployeeController@edit');
Route::put('/file/{bId}/employee/{id}/update','EmployeeController@update');
Route::post('/file/{bId}/employee/store', array('uses'=>'EmployeeController@store'));
Route::delete('/file/{bId}/employee/{Id}', array('uses'=>'EmployeeController@destroy'));
// Customize Dashboard
Route::resource('customize','CustomizeController');
                
//Fixed Asset
Route::resource('fixedasset', 'FixedAssetController');
Route::resource('settings', 'SettingController');
Route::resource('date-setter', 'DateSettingController');
Route::resource('business', 'BusinessController');