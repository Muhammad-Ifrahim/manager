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
Route::group(['middleware' => 'App\Http\Middleware\KAccessMiddleware'], function()
{
	Route::get('notAllowed', function () 
	{
		return View::make('errors.notAllowed-view');
	});
	Route::resource('summary','SummaryController');
	Route::resource('customer','CustomerController');
	Route::resource('employee','EmployeeController');
	Route::resource('customize','CustomizeController');
	Route::get('customize/{uid}/updater','CustomizeController@updater');
	Route::resource('NotAvailable','NothingController');                
	//Fixed Asset
	Route::resource('customize','CustomizeController');                
	//Fixed CashController
	Route::resource('fixedasset', 'FixedAssetController');
	Route::resource('settings', 'SettingController');
	Route::resource('date-setter', 'DateSettingController');
	Route::get('/business/createSub', 'BusinessController@createSub');
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
	Route::get('/payslip/{id}/print','PayslipController@rint');
	// Performa
	Route::resource('saleinvoice','SaleInvoiceController');
	Route::resource('proforma','PerformaController');
	Route::resource('InventoryTransfer','InventoryTransferController');
	Route::resource('InventoryLocation','InventoryLocationController');
	Route::resource('Reports', 'ReportController');

	Route::get('EarnReport/{rType}', 'EarnReportController@index');
	Route::post('EarnReport/{rType}/save', 'EarnReportController@store');
	Route::get('EarnReport/{rType}/create', 'EarnReportController@create');
	Route::delete('EarnReport/{rType}/delete', 'EarnReportController@destroy');
	Route::get('EarnReport/{rType}/edit', 'EarnReportController@edit');
	Route::resource('ReportUpdate', 'EarnReportController');

	Route::resource('supplier','SupplierController');
	Route::resource('Inventory','InventoryController');
	Route::resource('Journal','JournalController');
	Route::get('/Journal/{id}/print', 'JournalController@printreport');

	Route::resource('purchaseorder','PurchaseOrderController');
	Route::get('/purchaseorder/{id}/print', 'PurchaseOrderController@printReport');

	// Inventory to get in Routes 
	Route::get( '/getinventory', array(
		'as' => 'getinventory',
		'uses' => 'PerformaController@getinventory'
	));

	Route::get('/logout', 'Auth\LoginController@logout');
	Route::get('{bisId}/business', 'OtherBusinessController@index');
	Route::get('/printContributeReport/{repId}', 'EarnReportController@printContributeReport');
	Route::get('/printDeductionReport/{repId}', 'EarnReportController@printDeductionReport');
	Route::get('/printSummaryReport/{repId}', 'EarnReportController@printSummaryReport');
	Route::get('/proformaPrint/{id}/print', 'PerformaController@printReport');
	Auth::routes();
	Route::get('/home', 'HomeController@index')->name('home');
});