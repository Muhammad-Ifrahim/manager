<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Models\InventoryLocation;
use Illuminate\Support\Facades\Session;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Config;

class InventoryLocationController extends Controller
{
      public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        $bid = Session::get('bId'); 
        $InventoryLocation=InventoryLocation::where('bId', $bid)->get();
        return view('inventorylocation.inventory-location-view')->with('InventoryLocation',$InventoryLocation);
    }

  
    public function create()
    {
        return view('inventorylocation.inventory-location-create');
    
    }

    public function store(Request $request)
    {
        $bid = Session::get('bId'); 
        $InventoryLocation=new InventoryLocation;
        if($InventoryLocation!=null){
            
              $InventoryLocation->fill(Request::all());
              $InventoryLocation->bId=$bid;
              $InventoryLocation->save();
            Toastr::success('Successfully Created', 'Inventory Location', ["positionClass" => "toast-top-right"]);
              return Redirect::to('InventoryLocation');
        }

        
    }

  
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        $InventoryLocation=InventoryLocation::find($id);
        return view('inventorylocation.inventory-location-edit')->with('InventoryLocation',$InventoryLocation);
    }

    public function update(Request $request, $id)
    {
        $InventoryLocation=InventoryLocation::find($id);
          if($InventoryLocation!=null){
            
              $InventoryLocation->fill(Request::all());
              $InventoryLocation->bId=$bid;
              $InventoryLocation->save();
              Toastr::success('Successfully Updated', 'Inventory Location', ["positionClass" => "toast-top-right"]);
              return Redirect::to('InventoryLocation');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
