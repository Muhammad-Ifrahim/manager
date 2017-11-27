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
Auth::routes();
Route::resource('/','ApplicationController');
Route::resource('customer','CustomerController');
Route::resource('employee','EmployeeController');
Route::resource('customize','CustomizeController');                
//Fixed Asset
Route::resource('fixedasset', 'FixedAssetController');
Route::resource('settings', 'SettingController');
Route::resource('date-setter', 'DateSettingController');
Route::resource('business', 'BusinessController');
//Settings of Payslip
Route::resource('pdeductitem', 'pDeductItemController');
Route::resource('pcontributeitem', 'pContributeItemsController');
Route::resource('pearnitem', 'pEarnItemsController');
Route::resource('user', 'RegController');

Route::resource('deliverynote','DeliveryNotesController');
Route::get('/deliverynote/{id}/print', 'DeliveryNotesController@printReport');
//Payslips
Route::resource('payslip', 'PayslipController');
// Performa
Route::resource('proforma','PerformaController');
//Inventory
//login

Route::resource('Inventory','InventoryController');

// Inventory to get in Routes 
Route::get( '/getinventory', array(
'as' => 'getinventory',
'uses' => 'PerformaController@getinventory'
) );
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('{bisId}/business', 'OtherBusinessController@index');
Route::get('/proformaPrint/{id}/print', 'PerformaController@printReport');
