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
Route::resource('summary','SummaryController');
Route::resource('customer','CustomerController');
Route::resource('employee','EmployeeController');
Route::resource('customize','CustomizeController');                
//Fixed CashController
Route::resource('fixedasset', 'FixedAssetController');
Route::resource('settings', 'SettingController');
Route::resource('date-setter', 'DateSettingController');
Route::resource('business', 'BusinessController');
//Settings of Payslip
Route::resource('pdeductitem', 'pDeductItemController');
Route::resource('pcontributeitem', 'pContributeItemsController');
Route::resource('pearnitem', 'pEarnItemsController');
Route::resource('user', 'RegController');
Route::resource('ledgers', 'LedgerController');

Route::resource('cash','CashController');

Route::resource('deliverynote','DeliveryNotesController');
Route::get('/deliverynote/{id}/print', 'DeliveryNotesController@printReport');
//Payslips
Route::resource('payslip', 'PayslipController');
Route::get('/payslip/{id}/print','PayslipController@print');
// Performa
Route::resource('saleinvoice','SaleInvoiceController');
Route::resource('proforma','PerformaController');
Route::resource('InventoryTransfer','InventoryTransferController');
Route::resource('InventoryLocation','InventoryLocationController');
Route::resource('Reports', 'ReportController');
Route::resource('EarnReport', 'EarnReportController');

Route::resource('supplier','SupplierController');

Route::resource('Inventory','InventoryController');

Route::resource('Journal','JournalController');
Route::get('/Journal/{id}/print', 'JournalController@print');

Route::resource('purchaseorder','PurchaseOrderController');
Route::get('/purchaseorder/{id}/print', 'PurchaseOrderController@printReport');
// Inventory to get in Routes 
Route::get( '/getinventory', array(
'as' => 'getinventory',
'uses' => 'PerformaController@getinventory'
) );
Route::get('/logout', 'Auth\LoginController@logout');
Route::get('{bisId}/business', 'OtherBusinessController@index');
Route::get('/proformaPrint/{id}/print', 'PerformaController@printReport');