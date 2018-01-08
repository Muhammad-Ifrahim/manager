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
use Config;

class CustomizeController extends Controller
{
   /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    function index(){
      $currUser = Config::get('userU');
      if($currUser->userType=='Admin' || $currUser->userType=='Manager')
      {
        return View::make('customize.customize-layout');        
      }
      else
      {
        return View::make('errors.notAllowed-view');
      }
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
        $user->payslips=Input::has('PaySlip') ? 1 : 0;
        //$user->reports=Input::has('reports') ? 1 : 0; 

        $user->save();   	
        
        Toastr::success('Successfully Customized', 'Sidebar', ["positionClass" => "toast-top-right"]);
        $cUser = Config::get('userU');
        if($cUser->userType=='Admin')
        {
          return Redirect::to('business');
        }
        else if ($cUser->userType=='Manager')
        {
          return Redirect::to('user');
        }

    }
}
