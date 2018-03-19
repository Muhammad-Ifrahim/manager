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
use App\Models\pos;
use App\Models\posItem;
use Illuminate\Support\Facades\Session;
use Carbon;
use View;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;
use Request;


class POSController extends Controller
{
    public function __construct()
   {
    $this->middleware('auth');
   }

    public function index()
    {
      return View::make('pos.pos-view');  
    }

 
    public function create()
    {


    }

   
    public function store(Request $request)
    {
        $pos=new pos();

        //$pos=findorfail($Id);
        $bid=Session::get('bId');
        $input=input::all();
          // dd(Input::all());
        $pos->customer=Input::get('customer');
        $pos->Account=Input::get('Account');
        $pos->Items=Input::get('Items');
        $pos->Total=Input::get('Total');
        $pos->Tax=Input::get('Tax');
        $pos->Discount=Input::get('Discount');
        $pos->Status=is_null(Input::get('Method')) ? 'Pending' :'Completed';
        $pos->bId=$bid;
        
        if ($pos->save()) {
            for ($id=0; $id <count($input['inventId']) ; $id++) { 
                $posItem=new posItem();
                $posItem->posSaleId=$pos->posSaleId;
                $posItem->item = $input['inventId'][$id];
                $posItem->Qty = $input['qty'][$id];
                $posItem->Price = $input['price'][$id];
                $posItem->Amount = $input['amount'][$id];

                $posItem->save();

            }
            if (Input::get('Method')!=null){
                $Journal=new Journal;
                $Journal->Date=date("Y-m-d");
                $Journal->QuoteNumber=0;
                $Journal->Narration='Point of Sale to Inventory';
                $Journal->Debit=$input['Total'];
                $Journal->Credit=$input['Total'];
                $Journal->bId=$bid;
                $Journal->otherid=1;
                $Journal->saleInvoiceId=$pos->posSaleId;

               if ($Journal->save()){
                             //Debit Side
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=$input['Account'];
                  $JournalEntry->Description='Cash Account / Account Reciveable';
                  $JournalEntry->Debit=$input['Total'];
                  $JournalEntry->Credit=NULL;
                  $JournalEntry->save();

                     //CREDIT SIDE
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=11;
                  $JournalEntry->Description='Sale';
                  $JournalEntry->Debit=NULL;
                  $JournalEntry->Credit=$input['Total'];

                                 //HIT CASH ACCOUNT
                  if($JournalEntry->save()){ 
                     $AccountName = new  CashOnHand;                                 
                     $AccountName->Description='Cash Account / Account Reciveable';
                     $AccountName->Debit=$input['Total'];
                     $AccountName->Credit=NULL;
                     $AccountName->bId=$bid;
                     $AccountName->journalid=$Journal->id;
                     $AccountName->save(); 

                                       //HIT INVENTORY
                     $AccountName = new  InventorySales;
                     $AccountName->Description='Inventory Sale';
                     $AccountName->Debit=NULL;
                     $AccountName->Credit=$input['Total'];
                     $AccountName->bId=$bid;
                     $AccountName->journalid=$Journal->id;
                     $AccountName->save();
                  }
                  

                                 ////////////////////////////////////////////SECOND ENTRY OF SALES/////////////////////////////

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
                 return Redirect::to('summary');
                }
             
             }
        
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
}
