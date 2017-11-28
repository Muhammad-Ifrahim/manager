<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Carbon;
use View;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class InventoryTransferController extends Controller
{
    
    public function index()
    {
        return view('inventorytransfer.inventory-transfer-create');
    }

    
    public function create()
    {
        
    }

    
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        
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
}
