<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\Inventory;
use App\Models\InventoryOnHand;
use App\Models\CashOnHand;
use App\Models\AccountsPayable;
use App\Models\Journal;
use App\Models\JournalEntry;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Config;
use Session;


class InventoryController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {
      $user = Config::get('userU');
      $bid = Session::get('bId'); 
      $inventory =Inventory::where('bId', $bid)->get();
      
      return view('inventory.inventory-view')->with('inventory',$inventory);
    }
    public function create()
    {
        return view('inventory.inventory-create');
    }

    public function store(Request $request)
    {
       $bid = Session::get('bId');  
        $validator = Validator::make(Request::all(), [

        'ItemCode'  => 'numeric|nullable',
        'ItemName'  => 'string|required',
        'UnitName' => 'string|nullable',
        'PurchasePrice' => 'integer|nullable',
        'SalePrice' => 'integer|nullable',
        'Description'=>'string|nullable',
        'QtyOnHand'=>'integer|nullable',
        'AverageCost' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('Inventory/create')->withInput()->withErrors($validator);
      }
      else{
             $inventory = new Inventory;
             $inventory->fill(Request::all());
             $input=Input::all();
             // dd($input);
             $inventory->bId=$bid;
             $inventory->accountId=$input['account'];

             if($inventory->save()){
                $Journal=new Journal;
                $Journal->Date='';
                $Journal->QuoteNumber=0;
                $Journal->Narration='Inventory on Hand(Debit)/Starting Balance Equity(Credit)';
                $Journal->Debit=$input['ValueOnHand'];
                $Journal->Credit=$input['ValueOnHand'];
                $Journal->bId =$bid;
                $Journal->otherid=1;
                $Journal->inventaccountId=$inventory->inventId;
                   if ($Journal->save()){
                      $JournalEntry = new JournalEntry;
                      $JournalEntry->journalid=$Journal->id;
                      $JournalEntry->Account=4;
                      $JournalEntry->Description='Inventory on Hand';
                      $JournalEntry->Debit=$input['ValueOnHand'];
                      $JournalEntry->Credit=NULL;
                      $JournalEntry->save();

                         //CREDIT SIDE
                      
                      $JournalEntry = new JournalEntry;
                      $JournalEntry->journalid=$Journal->id;
                      $JournalEntry->Account=$input['account'];
                      $JournalEntry->Description='Cash-Account Payable';
                      $JournalEntry->Debit=NULL;
                      $JournalEntry->Credit=$input['ValueOnHand'];

                          if ($JournalEntry->save()) {
                              
                                $AccountName = new  InventoryOnHand;
                                $AccountName->Description='Cash Account';
                                $AccountName->Debit=$input['ValueOnHand'];
                                $AccountName->Credit=NULL;
                                $AccountName->bId=$bid;
                                $AccountName->journalid=$Journal->id;
                                $AccountName->save(); 

                           if ($input['account']==3) {$AccountName = new  CashOnHand;}
                            if ($input['account']==5) {$AccountName = new  AccountsPayable;}
                                $AccountName->Description='Starting Balance';
                                $AccountName->Debit=NULL;
                                $AccountName->Credit=$input['ValueOnHand'];
                                $AccountName->bId=$bid;
                                $AccountName->journalid=$Journal->id;
                                $AccountName->save(); 




                      }
               }
         
               Toastr::success('Successfully Added', 'Inventory', ["positionClass" => "toast-top-right"]);
              }
           return Redirect::to('Inventory');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $inventory=Inventory::find($id);
        return view('inventory.inventory-edit')->with('inventory',$inventory);
    }

    public function update(Request $request, $id)
    {
        $bid = Session::get('bId');
        $validator = Validator::make(Request::all(), [

        'ItemCode'  => 'integer|nullable',
        'ItemName'  => 'string|required',
        'UnitName' => 'string|nullable',
        'PurchasePrice' => 'integer|nullable',
        'SalePrice' => 'integer|nullable',
        'Discription'=>'string|nullable',
        'QtyOnHand'=>'integer|nullable',
        'AverageCost' =>'integer|nullable',
        
    ]);

    // $validator=Validator::make(Request::all(),$validationRules);
      if ($validator->fails()) {

         return redirect('Inventory/' . $id . '/edit')->withInput()->withErrors($validator);
      }
      else{
           $inventory=Inventory::with('journal')->where('inventId',$id)->get();
          foreach ($inventory as $key => $value) {
               $Id=$value->journal->id;
            }
            
            if ($inventory!=NULL) {
                 if ($Id!=NULL) {                
                   app('App\Http\Controllers\JournalController')->destroy($Id);      
                  }
              $Inventory=Inventory::where('inventId',$id);
               if($Inventory){
                   $Inventory->delete(); 
                   $inventory = new Inventory;
                   $inventory->fill(Request::all());
                   $input=Input::all();
                   $inventory->bId=$bid;
                   $inventory->accountId=$input['account'];

                   if($inventory->save()){
                      $Journal=new Journal;
                      $Journal->Date='';
                      $Journal->QuoteNumber=0;
                      $Journal->Narration='Inventory on Hand(Debit)/Starting Balance Equity(Credit)';
                      $Journal->Debit=$input['ValueOnHand'];
                      $Journal->Credit=$input['ValueOnHand'];
                      $Journal->bId =$bid;
                      $Journal->otherid=1;
                      $Journal->inventaccountId=$inventory->inventId;
                         if ($Journal->save()){
                            $JournalEntry = new JournalEntry;
                            $JournalEntry->journalid=$Journal->id;
                            $JournalEntry->Account=4;
                            $JournalEntry->Description='Inventory on Hand';
                            $JournalEntry->Debit=$input['ValueOnHand'];
                            $JournalEntry->Credit=NULL;
                            $JournalEntry->save();

                               //CREDIT SIDE
                            
                            $JournalEntry = new JournalEntry;
                            $JournalEntry->journalid=$Journal->id;
                            $JournalEntry->Account=$input['account'];
                            $JournalEntry->Description='Cash-Account Payable';
                            $JournalEntry->Debit=NULL;
                            $JournalEntry->Credit=$input['ValueOnHand'];

                                if ($JournalEntry->save()) {
                                    
                                      $AccountName = new  InventoryOnHand;
                                      $AccountName->Description='Cash Account';
                                      $AccountName->Debit=$input['ValueOnHand'];
                                      $AccountName->Credit=NULL;
                                      $AccountName->bId=$bid;
                                      $AccountName->journalid=$Journal->id;
                                      $AccountName->save(); 

                                 if ($input['account']==3) {$AccountName = new  CashOnHand;}
                                  if ($input['account']==5) {$AccountName = new  AccountsPayable;}
                                      $AccountName->Description='Starting Balance';
                                      $AccountName->Debit=NULL;
                                      $AccountName->Credit=$input['ValueOnHand'];
                                      $AccountName->bId=$bid;
                                      $AccountName->journalid=$Journal->id;
                                      $AccountName->save(); 
                        }
                      }
                    }
                 }
               }
               Toastr::success('Successfully Updated', 'Inventory', ["positionClass" => "toast-top-right"]);
           }
           return Redirect::to('Inventory');
        }

    public function destroy($id)
    {

      $inventoryDelete=Inventory::with('journal')->where('inventId',$id)->get();
        foreach ($inventoryDelete as $key => $value) {
            $Id=$value->journal->id;
        }
        if ($inventoryDelete!=NULL) {
              if ($Id!=NULL) {                
                app('App\Http\Controllers\JournalController')->destroy($Id);      
              }
              $Inventory=Inventory::where('inventId',$id);
              if($Inventory){
                     
                  $Inventory->delete();

               }
        }
        Toastr::success('Successfully Deleted', 'Inventory Item', ["positionClass" => "toast-top-right"]);
        return Redirect::to('Inventory');
    }
}
