<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\Http\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Customer;
use View;
use Session;

class CustomerController extends Controller
{
   public function __invoke(){

   }
   public function index(){
      
         $customers=Customer::all(); 
        return View::make('customer.customer-view')->with('customers',$customers);
       
   }
   public function  create(){
      return View::make('customer.customer-create');         //Return and Show the Insert View
   }
   public function  store(){
    $Customer = new Customer;
      $Customer->Name  = $request->input('Name');
      return View::make('customer.customer-create');
   }
   public function edit($Id){

   }
   public function show(Request $request){
      $Customer = new Customer;
      $Customer->Name  = $request->input('Name');
      dd(Input::get('Name'));
     
     return View::make('customer.customer-create');
   }
   public function createAnother(){

     
      
   }

}
