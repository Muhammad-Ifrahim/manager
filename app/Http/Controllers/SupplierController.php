<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\Supplier;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Config;

class SupplierController extends Controller
{
     public function __construct()
     {
    $this->middleware('auth');
    }

    
    public function index()
    {
       $user = Config::get('userU');
       $bid = Session::get('bId'); 
       $supplier = Supplier::where('bId', $bid)->get();
       return view('supplier.supplier-view')->with('supplier',$supplier);
    }

    
    public function create()
    {
       return view('supplier.supplier-create');
    }

    
    public function store(Request $request)
    {
        $bid = Session::get('bId');
        $validator = Validator::make(Request::all(), [

        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Email' => 'email|nullable',
        'Telephone' => 'required|min:11|numeric',
        'BillingAddress' => 'required|string',
        'Fax'=>'min:11|numeric|nullable',
        'Mobile'=>'min:11|numeric|nullable',
        'CreditLimit' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('supplier/create')->withInput()->withErrors($validator);
      }
      else{
             $supplier = new Supplier;
             $supplier->bId=$bid;
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
      $bid = Session::get('bId');
      $validator = Validator::make(Request::all(), [
        
        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Email' => 'email|nullable',
        'Telephone' => 'required|min:11|numeric',
        'BillingAddress' => 'required|string',
        'Fax'=>'min:11|numeric|nullable',
        'Mobile'=>'min:11|numeric|nullable',
        'CreditLimit' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('supplier/create')->withInput()->withErrors($validator);
      }
      else{
             $supplier = Supplier::find($id);
             if ($supplier!=null) {
                    $supplier->fill(Request::all());
                    $supplier->bId=$bid;
                      if($supplier->save()){
                         Toastr::success('Successfully updated', 'Supplier', ["positionClass" => "toast-top-right"]);
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

