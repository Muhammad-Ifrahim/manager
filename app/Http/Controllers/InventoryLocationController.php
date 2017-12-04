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
        $InventoryLocation=InventoryLocation::all();
        return view('inventorylocation.inventory-location-view')->with('InventoryLocation',$InventoryLocation);
    }

  
    public function create()
    {
        return view('inventorylocation.inventory-location-create');
    
    }

    public function store(Request $request)
    {
        $InventoryLocation=new InventoryLocation;
        if($InventoryLocation!=null){
            
              $InventoryLocation->fill(Request::all());
              $InventoryLocation->save();
            Toastr::success('Successfully Created', 'Inventory Location', ["positionClass" => "toast-top-right"]);
              return Redirect::to('InventoryLocation');
        }

        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $InventoryLocation=InventoryLocation::find($id);
        return view('inventorylocation.inventory-location-edit')->with('InventoryLocation',$InventoryLocation);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $InventoryLocation=InventoryLocation::find($id);
          if($InventoryLocation!=null){
            
              $InventoryLocation->fill(Request::all());
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
