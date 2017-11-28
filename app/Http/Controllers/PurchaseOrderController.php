<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\PurchaseOrderSale;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use Input;
use Toastr;
use Redirect;
use PDF;

class PurchaseOrderController extends Controller
{
   
    public function index()
    {

        $purchaseordersale = PurchaseOrderSale::all();
        return view('purchaseorder.purchase-order-view')->with('purchaseordersale',$purchaseordersale);
    }

   
    public function create()
    {
        $supplier=Supplier::all();
        return view('purchaseorder.purchase-order-create')->with('supplier',$supplier);
    }

  
    public function store(Request $request)
    {
         $purchaseordersale = new PurchaseOrderSale;
        $input = Input::all();
        //dd(Input::all());
        $purchaseordersale->IssueDate=is_null(Input::get('IssueDate')) ? '' : Input::get('IssueDate');
        $purchaseordersale->DeliveryDate=is_null(Input::get('DeliveryDate')) ? '' : Input::get('DeliveryDate');
        $purchaseordersale->Supplier =Input::get('Supplier');
        $purchaseordersale->DeliveryAddress =Input::get('DeliveryAddress');
        $purchaseordersale->DeliveryInstruction = is_null(Input::get('DeliveryInstruction')) ? '' : Input::get('DeliveryInstruction');
        $purchaseordersale->AuthorizedBy = is_null(Input::get('AuthorizedBy')) ? '' : Input::get('AuthorizedBy');
        $purchaseordersale->Amount = is_null(Input::get('NetAmount')) ? 0 : Input::get('NetAmount');
        $purchaseordersale->Reference='';
        
        
        
        if($purchaseordersale->save()){
            for($id = 0; $id < count($input['inventId']); $id++){
                $purchaseorder = new PurchaseOrder;
                $purchaseorder->supId=$purchaseordersale->id;
                $purchaseorder->inventId = $input['inventId'][$id];
                $purchaseorder->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $purchaseorder->SalePrice = $input['price'][$id];
                $purchaseorder->Discount = is_null($input['dis'][$id]) ? 0 : $input['dis'][$id] ;
                $purchaseorder->Amount = is_null($input['amount'][$id]) ? 0 : $input['amount'][$id] ;
                $purchaseorder->save();
            }
            
        }
       Toastr::success('Successfully Created', 'Sales Order', ["positionClass" => "toast-top-right"]);
        return Redirect::to('purchaseorder');
        
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {

    $supplier=Supplier::all();    
   $purchaseordersale=PurchaseOrderSale::find($id);
   $purchaseorder=PurchaseOrderSale::with('purchaseSale')->with('purchaseSale.inventoryItem')->where('id',$id)->get();
      return view('purchaseorder.purchase-order-edit')->with('purchaseordersale',$purchaseordersale)->with('purchaseorder',$purchaseorder)->with('supplier',$supplier);  
        
    }

    public function update(Request $request, $id)
    {

        $purchaseordersale =PurchaseOrderSale::find($id);

        if ($purchaseordersale!=null) {
                
            $purchaseordersale->purchaseSale()->delete();   
            $input = Input::all();
            $purchaseordersale->IssueDate=is_null(Input::get('IssueDate')) ? '' : Input::get('IssueDate');
            $purchaseordersale->DeliveryDate=is_null(Input::get('DeliveryDate')) ? '' : Input::get('DeliveryDate');
            $purchaseordersale->Supplier =Input::get('Supplier');
            $purchaseordersale->DeliveryAddress =Input::get('DeliveryAddress');
            $purchaseordersale->DeliveryInstruction = is_null(Input::get('DeliveryInstruction')) ? '' : Input::get('DeliveryInstruction');
            $purchaseordersale->AuthorizedBy = is_null(Input::get('AuthorizedBy')) ? '' : Input::get('AuthorizedBy');
            $purchaseordersale->Amount = is_null(Input::get('NetAmount')) ? 0 : Input::get('NetAmount');
            $purchaseordersale->Reference='';
            
        
        
        if($purchaseordersale->save()){
            for($id = 0; $id < count($input['inventId']); $id++){
                $purchaseorder = new PurchaseOrder;
                $purchaseorder->supId=$purchaseordersale->id;
                $purchaseorder->inventId = $input['inventId'][$id];
                $purchaseorder->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $purchaseorder->SalePrice = $input['price'][$id];
                $purchaseorder->Discount = is_null($input['dis'][$id]) ? 0 : $input['dis'][$id] ;
                $purchaseorder->Amount = is_null($input['amount'][$id]) ? 0 : $input['amount'][$id] ;
                $purchaseorder->save();
            }
            
        }
       Toastr::success('Successfully Created', 'Sales Order', ["positionClass" => "toast-top-right"]);
        return Redirect::to('purchaseorder');
        }
      
        
    }

    public function destroy($id)
    {
        $purchaseordersale=PurchaseOrderSale::find($id);
           if($purchaseordersale!=null)
         {
             $purchaseordersale->purchaseSale()->delete();
             $purchaseordersale->delete();
             Toastr::success('Successfully Deleted', 'SALE ORDER', ["positionClass" => "toast-top-right"]);
                  
         }
        
         return Redirect::to('purchaseorder');
    }

    public function printReport($id){

     $supplier=Supplier::all();    
     $purchaseordersale=PurchaseOrderSale::find($id);
     $purchaseorder=PurchaseOrderSale::with('purchaseSale')->with('purchaseSale.inventoryItem')->where('id',$id)->get();
    $pdf = new PDF();
    $pdf=PDF::loadView('purchaseorder.purchase-order-print',['purchaseordersale'=>$purchaseordersale,'purchaseorder'=>$purchaseorder])->setPaper('A4');
    return  $pdf->stream('purchaseorder.pdf',array('Attachment'=>0));   
     

    }
}
