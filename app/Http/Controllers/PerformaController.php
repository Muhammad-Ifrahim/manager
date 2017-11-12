<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\Proforma;
use App\Models\Inventory;
use Illuminate\Support\Facades\Session;
use App\Http\Controllers\Response;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;

class PerformaController extends Controller
{
    
    public function index()
    {
             
     $proforma=Proforma::all(); 
     return View::make('proforma.proforma-view')->with('proforma',$proforma); 
        
    }

    public function create()
    {
     return view('proforma.proforma-create');   
    }

    
    public function store(Request $request)
    {
        
    }

    
    public function show($id)
    {
        //
    }

  
    public function edit($id)
    {
        //
    }

   
    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
    public function getinventory(Request $request){
          $inventId = Input::all();
          $inventory=Inventory::where('inventId', $inventId)->get();
          return response()->json($inventory);
    }
}
