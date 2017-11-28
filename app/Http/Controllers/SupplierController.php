<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;

class SupplierController extends Controller
{
    
    public function index()
    {
        $supplier = Supplier::all();
       return view('supplier.supplier-view')->with('supplier',$supplier);
    }

    
    public function create()
    {
       return view('supplier.supplier-create');
    }

    
    public function store(Request $request)
    {
        $validator = Validator::make(Request::all(), [

        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Email' => 'email|required',
        'Telephone' => 'nullable',
        'BillingAddress' => 'nullable|string',
        'Fax'=>'nullable',
        'Mobile'=>'nullable',
        'CreditLimit' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('supplier/create')->withInput()->withErrors($validator);
      }
      else{
             $supplier = new Supplier;
             $supplier->fill(Request::all());
             if($supplier->save()){
               Toastr::success('Successfully Created', 'Supplier', ["positionClass" => "toast-top-right"]);
              }
          return Redirect::to('supplier');
        }

    
    }

    
    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
         $supplier =Supplier::find($id);
         return view('supplier.supplier-edit')->with('supplier',$supplier);
        
    }

    
    public function update(Request $request, $id){
      $validator = Validator::make(Request::all(), [

        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Email' => 'email|required',
        'Telephone' => 'nullable',
        'BillingAddress' => 'nullable|string',
        'Fax'=>'nullable',
        'Mobile'=>'nullable',
        'CreditLimit' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('supplier/create')->withInput()->withErrors($validator);
      }
      else{
             $supplier = Supplier::find($id);
             if ($supplier!=null) {
                    $supplier->fill(Request::all());
                      if($supplier->save()){
                         Toastr::success('Successfully update', 'Supplier', ["positionClass" => "toast-top-right"]);
                       }
                    return Redirect::to('supplier');
                }
            }
    }

    
    public function destroy($id)
    {
        $supplier =Supplier::find($id);

        if($supplier!=null){

            $supplier->delete();
            Toastr::success('Successfully Deleted', 'Supplier', ["positionClass" => "toast-top-right"]);
        }
        return Redirect::to('supplier');
    }
}

