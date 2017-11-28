<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\Proforma;
use App\Models\Inventory;
use App\Models\Sale;
use App\Models\DeliveryNote;
use App\Models\DeliverySale;
use Carbon;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class DeliveryNotesController extends Controller
{
    
    public function index()
    {
        $deliverySale = DeliverySale::all();
        return view('deliverynotes.deliverynotes-view')->with('deliverySale',$deliverySale);
    }

    public function create()
    {
        return view('deliverynotes.deliverynotes-create');
    }

  
    public function store(Request $request)
    {
        $deliverySale = new DeliverySale;
        $input = Input::all();
        //dd($input);
    $deliverySale->DeliveryDate=is_null(Input::get('DeliveryDate')) ? '' : Input::get('DeliveryDate');
    $deliverySale->Reference=is_null(Input::get('Reference')) ? 0 : Input::get('Reference');
    $deliverySale->OrderNo =is_null(Input::get('OrderNo')) ? 0 : Input::get('OrderNo');
    $deliverySale->InvoiceNumber = is_null(Input::get('InvoiceNumber')) ? 0 : Input::get('InvoiceNumber');
    $deliverySale->Description = is_null(Input::get('Descriptions')) ? '' : Input::get('Descriptions');
    $deliverySale->Notes = is_null(Input::get('Notes')) ? '' : Input::get('Notes');
    $deliverySale->customer = Input::get('customer');

        $deliverySale->save();
        $j = $deliverySale->id;
        
        if($deliverySale->save()){
            for($id = 0; $id < count($input['inventId']); $id++){
                $deliverynote = new DeliveryNote;
                $deliverynote->deliverysaleId=$deliverySale->id;
                $deliverynote->inventId = $input['inventId'][$id];
                $deliverynote->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $deliverynote->save();
            }
            
        }
        Toastr::success('Created Successfully', 'Delivery Note', ["positionClass" => "toast-top-right"]);
        return Redirect::to('deliverynote');
        
    }
    public function printReport($id){

       $deliverySale = DeliverySale::with('saleDelivery')->with('saleDelivery.inventoryItem')->with('user')->where('id',$id)->get();
       $pdf = new PDF();
       $pdf=PDF::loadView('deliverynotes.deliverynotes-pdf',['deliverySale'=>$deliverySale])->setPaper('A4');
     return  $pdf->stream('deliverynotes.pdf',array('Attachment'=>0));

    }
   
    public function show($id)
    {
    
    }

    
    public function edit($id)
    {
        $deliverySale = DeliverySale::find($id);
        //dd($deliverySale);
        $deliverySaleItem = DeliverySale::with('saleDelivery')->with('saleDelivery.inventoryItem')->where('id',$id)->get();
        return view('deliverynotes.deliverynotes-edit')->with('deliverySale',$deliverySale)->with('deliverySaleItem',$deliverySaleItem);
    
    }

   
    public function update(Request $request, $id)
    {
         $deliverySale = DeliverySale::find($id);
         if ($deliverySale!=null) {
           
            $deliverySale->saleDelivery()->delete();
          $input = Input::all();
            $deliverySale->DeliveryDate=is_null(Input::get('DeliveryDate')) ? '' : Input::get('DeliveryDate');
            $deliverySale->Reference=is_null(Input::get('Reference')) ? 0 : Input::get('Reference');
            $deliverySale->OrderNo =is_null(Input::get('OrderNo')) ? 0 : Input::get('OrderNo');
            $deliverySale->InvoiceNumber = is_null(Input::get('InvoiceNumber')) ? 0 : Input::get('InvoiceNumber');
            $deliverySale->Description = is_null(Input::get('Descriptions')) ? '' : Input::get('Descriptions');
            $deliverySale->Notes = is_null(Input::get('Notes')) ? '' : Input::get('Notes');
            $deliverySale->customer = Input::get('customer');

        $deliverySale->save();
        $j = $deliverySale->id;
        
        if($deliverySale->save()){
            for($id = 0; $id < count($input['inventId']); $id++){
                $deliverynote = new DeliveryNote;
                $deliverynote->deliverysaleId=$deliverySale->id;
                $deliverynote->inventId = $input['inventId'][$id];
                $deliverynote->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $deliverynote->save();
            }
            
        }
        Toastr::success('Created Successfully', 'Delivery Note', ["positionClass" => "toast-top-right"]);
        return Redirect::to('deliverynote');
            
         }
        
        //dd($input);
  
        
    
    }

    
    public function destroy($id)
    {
       $deliverySale=DeliverySale::find($id);
       if($deliverySale!=null){
             $deliverySale->saleDelivery()->delete();
             $deliverySale->delete();
            Toastr::success('Deleted Successfully', 'Delivery Note', ["positionClass" => "toast-top-right"]);
            return Redirect::to('deliverynote');

       } 
    }
}
