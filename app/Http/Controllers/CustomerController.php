<?php

namespace App\Http\Controllers;



use Illuminate\Support\Facades\Input;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
//use Illuminate\Http\Request;
use View;
use Request;
use Validator;
//use Toastr;
use Redirect;

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
        'Telephone' => 'nullable|regex:/(01)[0-9]{9}/',
        'BillingAddress' => 'nullable|string',
        'Fax'=>'nullable|regex:/(012)[0-9]{7}/',
        'Mobile'=>'nullable|regex:/(01)[0-9]{9}/',
        'CreditLimit' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('customer/create')->withInput()->withErrors($validator);
      }
      else{
             $Customer = new Customer;
             $Customer->fill(Request::all());
             if($Customer->save()){
               
             //   Toastr::success('Successfully Created', 'Customer', ["positionClass" => "toast-top-right"]);
            //  Session::flash('flash_message', 'customer successfully created!');
              }
           return Redirect::to('customer');
        }

      }
      
   public function edit($Id){
       $customer=Customer::find($Id);
        return View::make('customer.customer-edit')->with('customer',$customer);  
   }
   public function update($Id){

         $validationRules=array(

        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Email' => 'email|required',
        'BusinessIdentifier' => 'string|nullable',
        'Telephone' => 'nullable|regex:/(01)[0-9]{9}/',
        'BillingAddress' => 'nullable|string',
        'AdditionalInformation'=>'string|nullable',
        'Fax'=>'nullable|regex:/(012)[0-9]{7}/',
        'Mobile'=>'nullable|regex:/(01)[0-9]{9}/',
        'CreditLimit' =>'integer|nullable',

         );

      // Validation Rules
    $validator=Validator::make(Request::all(),$validationRules);

    if ($validator->fails()) {
      
        return redirect('customer/' . $Id . '/edit')->withInput()->withErrors($validator);
     }
     else{
        $customer=Customer::find($Id);
         if($customer){

             $customer->fill(Request::all());
            if($customer->save())
            {
                  $customer=Customer::find($Id);
                  Toastr::success('Successfully Updated', 'Customer', ["positionClass" => "toast-top-right"]);
                   return Redirect::to('customer');

            }

         }
   
     }

   }
   public function show(){
        
    
   }


}
