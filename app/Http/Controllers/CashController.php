<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Models\Customer;
use Illuminate\Support\Facades\Session;
use App\Models\CashAccount;
use App\Models\Journal;
use App\Models\JournalEntry;
use App\Models\StartingBalance;
use App\Models\CashOnHand;
use Request;
use View;
use Validator;
use Toastr;
use Redirect;
use Config;
use Form;

class CashController extends Controller
{
    
    public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {
        $bid = Session::get('bId');
        $CashAccount=CashAccount::where('bId',$bid)->get();
        return view('cash.cash-view')->with('CashAccount',$CashAccount);
    }

    public function create()
    {
       return view('cash.cash-create');
    }

    
    public function store(Request $request)
    {
      $bid = Session::get('bId'); 
        $input=Input::all();
        $bool=false;
       // dd($input['Name']);
        $cashAccount=new CashAccount;
        $cashAccount->Name=$input['Name'];
        $cashAccount->Code=$input['Code'];
        $cashAccount->Amount=$input['Amount'];
        $cashAccount->bId=$bid;

        if ($cashAccount->save()) {
                 // have to stored the Journal Entries
            $Journal=new Journal;
            $Journal->Date='';
            $Journal->QuoteNumber=0;
            $Journal->Narration='Cash Account(Debit)/Starting Balance Equity(Credit)';
            $Journal->Debit=$input['Amount'];
            $Journal->Credit=$input['Amount'];
            $Journal->bId =$bid;
            $Journal->otherid=1;
            $Journal->cashAccountId=$cashAccount->id;

               if ($Journal->save()){
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=3;
                  $JournalEntry->Description='Cash Account';
                  $JournalEntry->Debit=$input['Amount'];
                  $JournalEntry->Credit=NULL;
                  $JournalEntry->save();

                     //CREDIT SIDE
                  $JournalEntry = new JournalEntry;
                  $JournalEntry->journalid=$Journal->id;
                  $JournalEntry->Account=9;
                  $JournalEntry->Description='Starting Balance Equity';
                  $JournalEntry->Debit=NULL;
                  $JournalEntry->Credit=$input['Amount'];
                      if ($JournalEntry->save()) {
                            $AccountName = new  CashOnHand;
                            $AccountName->Description='Cash Account';
                            $AccountName->Debit=$input['Amount'];
                            $AccountName->Credit=NULL;
                            $AccountName->bId=$bid;
                            $AccountName->journalid=$Journal->id;
                            $AccountName->save(); 


                            $AccountName = new  StartingBalance;
                            $AccountName->Description='Starting Balance';
                            $AccountName->Debit=NULL;
                            $AccountName->Credit=$input['Amount'];
                            $AccountName->bId=$bid;
                            $AccountName->journalid=$Journal->id;
                            $AccountName->save(); 

                      }
               }
         }
       Toastr::success('Successfully Created', 'Cash Account', ["positionClass" => "toast-top-right"]);
        return Redirect::to('cash');
    }

    
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
      $CashAccount=CashAccount::find($id);
      return view('cash.cash-edit')->with('CashAccount',$CashAccount);
    }

    
    public function update(Request $request, $id)
    {
        $cashAccount=CashAccount::with('journal')->where('id',$id)->get();
        foreach ($cashAccount as $key => $value) {
            $Id=$value->journal->id;
        }
      //  dd($Id);
        if ($cashAccount!=NULL) {
              if ($Id!=NULL) {                
                app('App\Http\Controllers\JournalController')->destroy($Id);      
              }
              $cashAccount=CashAccount::find($id);
            //  dd($cashAccount);
              if($cashAccount){
                  $cashAccount->delete();
                  $cashAccount=new CashAccount;
                  $bid = Session::get('bId'); 
                  $input=Input::all();
                  $bool=false;
                 // dd($input['Name']);
                  $cashAccount->Name=$input['Name'];
                  $cashAccount->Code=$input['Code'];
                  $cashAccount->Amount=$input['Amount'];
                  $cashAccount->bId=$bid;

                  if ($cashAccount->save()) {
                           // have to stored the Journal Entries
                      $Journal=new Journal;
                      $Journal->Date='';
                      $Journal->QuoteNumber=0;
                      $Journal->Narration='Cash Account(Debit)/Starting Balance Equity(Credit)';
                      $Journal->Debit=$input['Amount'];
                      $Journal->Credit=$input['Amount'];
                      $Journal->bId =$bid;
                      $Journal->otherid=1;
                      $Journal->cashAccountId=$cashAccount->id;

                         if ($Journal->save()){
                            $JournalEntry = new JournalEntry;
                            $JournalEntry->journalid=$Journal->id;
                            $JournalEntry->Account=3;
                            $JournalEntry->Description='Cash Account';
                            $JournalEntry->Debit=$input['Amount'];
                            $JournalEntry->Credit=NULL;
                            $JournalEntry->save();

                               //CREDIT SIDE
                            $JournalEntry = new JournalEntry;
                            $JournalEntry->journalid=$Journal->id;
                            $JournalEntry->Account=9;
                            $JournalEntry->Description='Starting Balance Equity';
                            $JournalEntry->Debit=NULL;
                            $JournalEntry->Credit=$input['Amount'];
                                if ($JournalEntry->save()) {
                                      $AccountName = new  CashOnHand;
                                      $AccountName->Description='Cash Account';
                                      $AccountName->Debit=$input['Amount'];
                                      $AccountName->Credit=NULL;
                                      $AccountName->bId=$bid;
                                      $AccountName->journalid=$Journal->id;
                                      $AccountName->save(); 


                                      $AccountName = new  StartingBalance;
                                      $AccountName->Description='Starting Balance';
                                      $AccountName->Debit=NULL;
                                      $AccountName->Credit=$input['Amount'];
                                      $AccountName->bId=$bid;
                                      $AccountName->journalid=$Journal->id;
                                      $AccountName->save(); 

                                }
                         }
                   }
                 Toastr::success('Successfully Created', 'Cash Account', ["positionClass" => "toast-top-right"]);
                  return Redirect::to('cash'); 

               }
        }
        return Redirect::to('cash');




    }

    public function destroy($id)
    {
        $cashAccount=CashAccount::with('journal')->where('id',$id)->get();
        foreach ($cashAccount as $key => $value) {
            $Id=$value->journal->id;
        }
        if ($cashAccount!=NULL) {
              if ($Id!=NULL) {                
                app('App\Http\Controllers\JournalController')->destroy($Id);      
              }
              $cashAccount=CashAccount::where('id',$id);
              if($cashAccount){
                     $cashAccount->delete();   
               }
        }
        Toastr::success('Successfully Deleted', 'Cash Account', ["positionClass" => "toast-top-right"]);
        return Redirect::to('cash');
    }
}
