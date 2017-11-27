<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\App;

use App\Models\User;

use DB;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;

class CustomizeController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        echo 'constructor';
        $this->middleware('auth');
    }

    function index(){
    	return View::make('customize.customize-layout');
    }

    function store(Request $request){
        $user = User::find(DB::table('users')->max('id'));

       	$user->accounts=Input::has('accounts') ? 1 : 0;
       	$user->customer=Input::has('customer') ? 1 : 0;
       	$user->SalesQuote=Input::has('SalesQuote') ? 1 : 0;
       	$user->SalesOrder=Input::has('SalesOrder') ? 1 : 0;
       	$user->SalesInvoice=Input::has('SalesInvoice') ? 1 : 0;
       	$user->DeliveryNotes=Input::has('DeliveryNotes') ? 1 : 0;
       	$user->Supplier=Input::has('Supplier') ? 1 : 0;
       	$user->PurchaseOrder=Input::has('PurchaseOrder') ? 1 : 0;
       	$user->PurchaseInvoice=Input::has('PurchaseInvoice') ? 1 : 0;
       	$user->inventory=Input::has('InventoryItems') ? 1 : 0;
       	$user->InventoryTransfer=Input::has('InventoryTransfer') ? 1 : 0;
       	$user->employee=Input::has('Employee') ? 1 : 0;
        $user->FixedAsset=Input::has('FixedAsset') ? 1 : 0; 

        //Update the recently created user
        $user->fill(Request::all());
        $user->save();   	
        
        Toastr::success('Successfully Customize', 'Sidebar', ["positionClass" => "toast-top-right"]);
        return Redirect::to('business');
    }
}
