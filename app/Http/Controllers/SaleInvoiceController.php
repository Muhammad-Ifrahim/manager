<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\SaleInvoice;
use App\Models\SaleItem;
use App\Models\Inventory;
use App\Models\Journal;
use App\Models\JournalEntry;
use App\Models\AccountReceivable;
use App\Models\CashOnHand;
use App\Models\SaleInvoiceSummary;
use App\Models\InventorySales;
use App\Models\InventoryOnHand;
use App\Models\CostOfSale;
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
        $check=false;
        $SaleInvoice = new SaleInvoice;
        $bid = Session::get('bId'); 
        $input = Input::all();
        //dd($input);
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
                $check=true;
            }
            if ($check) {

                $Journal=new Journal;
                $Journal->Date='';
                $Journal->QuoteNumber=0;
                $Journal->Narration='Cash OR Account Reciveable';
                $Journal->Debit=$input['NetAmount'];
                $Journal->Credit=$input['NetAmount'];
                $Journal->bId=$bid;
                $Journal->otherid=1;
                $Journal->saleInvoiceId=$SaleInvoice->saleinId;

               if ($Journal->save()){
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=$input['Account'];
                  $JournalEntry->Description='Cash Account / Account Reciveable';
                  $JournalEntry->Debit=$input['NetAmount'];
                  $JournalEntry->Credit=NULL;
                  $JournalEntry->save();

                     //CREDIT SIDE
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=11;
                  $JournalEntry->Description='Sale';
                  $JournalEntry->Debit=NULL;
                  $JournalEntry->Credit=$input['NetAmount'];
                      if ($JournalEntry->save()) {
                            if ($input['Account']==1) {
                              $AccountName = new  AccountReceivable;
                            }
                            else {
                              $AccountName = new  CashOnHand;
                            }  
                            
                            $AccountName->Description='Cash Account / Account Reciveable';
                            $AccountName->Debit=$input['NetAmount'];
                            $AccountName->Credit=NULL;
                            $AccountName->bId=$bid;
                            $AccountName->journalid=$Journal->id;
                            $AccountName->save(); 


                            $AccountName = new  InventorySales;
                            $AccountName->Description='Inventory Sale';
                            $AccountName->Debit=NULL;
                            $AccountName->Credit=$input['NetAmount'];
                            $AccountName->bId=$bid;
                            $AccountName->journalid=$Journal->id;
                            $AccountName->save(); 
                          }
               }  
            }

            ///////////////////////////////////////////// SECOND ENTRY OF INVENTORY SALES/////////////////////////////////////
            if ($check) {

                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=$input['Account'];
                  $JournalEntry->Description='Cost of Sale ';
                  $JournalEntry->Debit=$input['costofsale'];
                  $JournalEntry->Credit=NULL;
                  $JournalEntry->save();

                     //CREDIT SIDE
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=28;
                  $JournalEntry->Description='Inventory on Hand';
                  $JournalEntry->Debit=NULL;
                  $JournalEntry->Credit=$input['costofsale'];
                      if ($JournalEntry->save()) {
                            
                            $AccountName = new  CostOfSale;
                            $AccountName->Description='Cost of Sale';
                            $AccountName->Debit=$input['costofsale'];
                            $AccountName->Credit=NULL;
                            $AccountName->bId=$bid;
                            $AccountName->journalid=$Journal->id;
                            $AccountName->save(); 


                            $AccountName = new  InventoryOnHand;
                            $AccountName->Description='Inventory on Hand Credit';
                            $AccountName->Debit=NULL;
                            $AccountName->Credit=$input['costofsale'];
                            $AccountName->bId=$bid;
                            $AccountName->journalid=$Journal->id;
                            $AccountName->save(); 
                          }
                
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
    public function printreport($id){
      try{
       // dd("sdsdsdsds");
        $sale=SaleInvoice::find($id);
        $salesItem=SaleInvoice::with('saleQuote')->with('saleQuote.inventoryItem')->where('saleinId',$id)->get();

        $pdf=new PDF();
        $pdf=PDF::loadView('sale.sale-print',['sale'=>$sale,'salesItem'=>$salesItem])->setPaper('A4');
       return  $pdf->stream('sale-print.pdf',array('Attachment'=>0));
       //   return view('sale.sale-print')->with('sale',$sale)->with('salesItem',$salesItem); 
      }
      catch(Exception $e){
        echo "eror";
      }
    } 
    public function update(Request $request, $id)
    {

             $this->destroy($id);
             $this->store($request);
            Toastr::success('Successfully Updaed', 'Sale Invoice', ["positionClass" => "toast-top-right"]);
            return Redirect::to('saleinvoice');           
    }

    public function destroy($id)
    {
        $SaleInvoice=SaleInvoice::with('journal')->where('saleinId',$id)->get();
        $Id=NULL;
        foreach ($SaleInvoice as $key => $value) {
            $Id=$value->journal->id;
        }
        if ($SaleInvoice!=NULL) {
              if ($Id!=NULL) {                
                app('App\Http\Controllers\JournalController')->destroy($Id);      
              }
              $SaleInvoice=SaleInvoice::where('saleinId',$id);
              if($SaleInvoice){
                     $SaleInvoice->delete();   
               }
        }
        Toastr::success('Successfully Deleted', 'Sale Invoice', ["positionClass" => "toast-top-right"]);
        return Redirect::to('saleinvoice');
      
    }
}
