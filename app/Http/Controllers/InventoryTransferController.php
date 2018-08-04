<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\InventoryTransfer;
use App\Models\InventoryTransferItem;
use App\Models\InventoryLocation;
use Carbon;
use View;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class InventoryTransferController extends Controller
{

    public function __construct()
   {
    $this->middleware('auth');
   }

    
    public function index()
    {
       $bid = Session::get('bId'); 
       $InventoryTransfer =InventoryTransfer::where('bId', $bid)->get();   
       return view('inventorytransfer.inventory-transfer-view')->with('InventoryTransfer',$InventoryTransfer);

    }

    
    public function create()
    {

        $InventoryLocation =InventoryLocation::all(); 
        return view('inventorytransfer.inventory-transfer-create')->with('InventoryLocation',$InventoryLocation);
        
    }

    
    public function store(Request $request)
    {
        $bid = Session::get('bId');
        $InventoryTransfer =new  InventoryTransfer;
          $input = Input::all();

        $InventoryTransfer->DeliveryDate=is_null(Input::get('DeliveryDate')) ? '' : Input::get('DeliveryDate');
        $InventoryTransfer->Description=is_null(Input::get('Description')) ? '' : Input::get('Description');
        $InventoryTransfer->InventoryLocationFrom=Input::get('InventoryLocationFrom');
        $InventoryTransfer->InventoryLocationTo=Input::get('InventoryLocationTo');
        $InventoryTransfer->bId=$bid;

        if ($InventoryTransfer->save()) {

             for($id = 0; $id < count($input['inventId']); $id++){
                $InventoryTransferItem = new InventoryTransferItem;
                $InventoryTransferItem->InventTransferId =$InventoryTransfer->itransId;
                $InventoryTransferItem->inventId = $input['inventId'][$id];
                $InventoryTransferItem->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $InventoryTransferItem->save();
            }
          Toastr::success('Successfully Created', 'Inventory Transfer', ["positionClass" => "toast-top-right"]);
        return Redirect::to('InventoryTransfer');    

        }


    }

    public function show($id)
    {
        
    }

   
    public function edit($id)
    {
        $InventoryTransfer =InventoryTransfer::find($id);
        $InventoryTransferItem=InventoryTransfer::with('items')->with('items.inventoryItem')->where('itransId',$id)->get();
        
        $InventoryLocation =InventoryLocation::all(); 
        return view('inventorytransfer.inventory-transfer-edit')->with('InventoryTransfer',$InventoryTransfer)->with('InventoryLocation',$InventoryLocation)->with('InventoryTransferItem',$InventoryTransferItem);
    }

  
    public function update(Request $request, $id){

       $bid = Session::get('bId');
      $InventoryTransfer = InventoryTransfer::find($id);

       if($InventoryTransfer!=null){
          $InventoryTransfer->items()->delete();
        $input = Input::all();
        $InventoryTransfer->DeliveryDate=is_null(Input::get('DeliveryDate')) ? '' : Input::get('DeliveryDate');
        $InventoryTransfer->Description=is_null(Input::get('Description')) ? '' : Input::get('Description');
        $InventoryTransfer->InventoryLocationFrom=Input::get('InventoryLocationFrom');
        $InventoryTransfer->InventoryLocationTo=Input::get('InventoryLocationTo');
        $InventoryTransfer->bId=$bid;

        if ($InventoryTransfer->save()) {
             for($id = 0; $id < count($input['inventId']); $id++){
                $InventoryTransferItem = new InventoryTransferItem;
                $InventoryTransferItem->InventTransferId =$InventoryTransfer->itransId;
                $InventoryTransferItem->inventId = $input['inventId'][$id];
                $InventoryTransferItem->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $InventoryTransferItem->save();
            }
          Toastr::success('Successfully Updated', 'Inventory Transfer', ["positionClass" => "toast-top-right"]);
        return Redirect::to('InventoryTransfer');    

        } 
       } 
    
    }

    public function destroy($id)
    {
        //
    }
}
