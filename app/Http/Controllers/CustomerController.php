<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Input;
use App\Models\Customer;
//use Illuminate\Http\Request;
use View;
use Session;
use Request;
use Validator;

class CustomerController extends Controller
{
   // Validation Rules
  
   public function __invoke(){

   }
   public function index(){
      
         $customers=Customer::all(); 
        return View::make('customer.customer-view')->with('customers',$customers);
       
   }
   public function  create(){
      return View::make('customer.customer-create');         //Return and Show the Insert View
   }
   public function  store(Request $request){
        // validations of the Input 
    $validator = Validator::make(Request::all(), [
        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Email' => 'email|required',
        // 'Telephone' => 'nullable|regex:/(01)[0-9]{9}/',
        'Billing Address' => 'nullable|string',
        // 'Fax'=>'nullable|regex:/(012)[0-9]{7}/',
        //'Mobile'=>'nullable|regex:/(01)[0-9]{9}/',
        'Credit Limit' =>'numeric|nullable',
    ]);

      if ($validator->fails()) {
        return redirect('customer/create')->withInput()->withErrors($validator);
    }
        else{
             $Customer = new Customer;
             $Customer->fill(Request::all());
             if($Customer->save()){
               // Here when it successfully
              }
             return View::make('customer.customer-view');
        }

      }
      
   public function edit($Id){

   }
   public function show(){
    
    
   }


}
