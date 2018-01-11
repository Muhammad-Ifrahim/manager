<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\Inventory;
use Illuminate\Support\Facades\Session;
use Carbon;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class SaleInvoiceController extends Controller
{
     public function __construct()
    {
       $this->middleware('auth');
    }
  
    public function index()
    {
         return view('sale.sale-view');          

    }

   
    public function create()
    {
       return view('sale.sale-create');
        
    }

    
    public function store(Request $request)
    {
        //  dd(Input::all());
        $SaleInvoice = new SaleInvoice;
        $bid = Session::get('bId'); 
        $input = Input::all();
        $SaleInvoice->IssueDate=Input::get('date');
        $SaleInvoice->DueDate=Input::get('duedate');
        $SaleInvoice->InvoiceNumber=Input::get('InvoiceNumber');
        $SaleInvoice->QuoteNumber=Input::get('QuoteNumber');
        $SaleInvoice->customer =Input::get('customer'); 
        $SaleInvoice->Amount = is_null(Input::get('NetAmount')) ? 0 : Input::get('NetAmount');
        $SaleInvoice->Tax = Input::get('tax');
        $SaleInvoice->TaxAmount = Input::get('taxvalue');
        $SaleInvoice->bId=$bid;
        if($SaleInvoice->save()){
            for($id = 0; $id < count($input['inventId']); $id++){
                $SaleItem = new SaleItem;
                $SaleItem->saleId=$SaleInvoice->saleinId;
                $SaleItem->inventId = $input['inventId'][$id];
                $SaleItem->Description = $input['discription'][$id];
                $SaleItem->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $SaleItem->Price = $input['price'][$id];
                $SaleItem->Amount = $input['amount'][$id];
                $SaleItem->save();
            }
        }
        Toastr::success('Successfully Created', 'Sale Invoice', ["positionClass" => "toast-top-right"]);
        return Redirect::to('saleinvoice');
    }

    public function show($id)
    {
        
    }

    
    public function edit($id)
    {
      $sale=SaleInvoice::find($id);
      $salesItem = SaleInvoice::with('saleQuote')->with('saleQuote.inventoryItem')->where('saleinId',$id)->get();  
     // dd($salesItem);
      return view('sale.sale-edit')->with('sale',$sale)->with('salesItem',$salesItem); 
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
