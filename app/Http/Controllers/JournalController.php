<?php
namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\Journal;
use App\Models\JournalEntry;
use App\Models\AccountReceivable;
use App\Models\CashAtBank;
use App\Models\CashOnHand;
use App\Models\InventoryOnHand;
use App\Models\AccountsPayable;
use App\Models\EmployeeAccount;
use App\Models\PayrollLiabilities;
use App\Models\RetainedEarnings;
use App\Models\StartingBalance;
use App\Models\InterestReceived;
use App\Models\InventorySales;
use App\Models\AccountingFees;
use App\Models\Advertising;
use App\Models\BankCharges;
use App\Models\ComputerEquipment;
use App\Models\Donations;
use App\Models\Electricity;
use App\Models\Entertainment;
use App\Models\InventoryCost;
use App\Models\LegalFees;
use App\Models\MotorVehicle;
use App\Models\Printing;
use App\Models\Rent;
use App\Models\Repairs;
use App\Models\Rounding;
use Debugbar;
use Carbon;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class JournalController extends Controller
{
     public function __construct()
  {
    $this->middleware('auth');
  }
    
    public function index()
    {
        return view('journal.journal-view');
        
    }
    public function create()
    {
        return view('journal.journal-create');
        
    }

    
    public function store(Request $request)
    {

        $Journal = new Journal;
        $bid = Session::get('bId'); 
        $input = Input::all();
        //dd(Input::all());
        $Journal->Date=is_null(Input::get('date')) ? '' : Input::get('date');
        $Journal->QuoteNumber=Input::get('QuoteNumber');
        $Journal->Narration=Input::get('Narration');
        $Journal->Debit=Input::get('debtTotal');
        $Journal->Credit=Input::get('creditTotal');
        $Journal->bId =$bid;
        if ($Journal->save()) {
            $Id=$Journal->id;
         
           for($id = 0; $id < count($input['inventId']); $id++){
                $JournalEntry = new JournalEntry;
                $JournalEntry->journalid=$Journal->id;
                $JournalEntry->Account=$input['inventId'][$id];
                $JournalEntry->Description=$input['discription'][$id];
                $JournalEntry->Debit=$input['debt'][$id];
                $JournalEntry->Credit=$input['credit'][$id];
                $JournalEntry->save();

               } 
          }
          $JournalEntryRecord =JournalEntry::with('Accounts')->Where('journalid',$Id)->get();
        //  dd($JournalEntryRecord);
                    foreach ($JournalEntryRecord as $value) {
                            $AccountName= $value->Accounts->AccountName;
                             if($AccountName =='Account receivable') { $AccountName = new  AccountReceivable; }
                             if($AccountName =='Cash at bank') { $AccountName = new  CashAtBank;}
                             if($AccountName =='Cash on hand') {$AccountName= new  CashOnHand;} 
                             if($AccountName =='Inventory on hand'){ $AccountName = new  InventoryOnHand;} 
                             if($AccountName =='Accounts payable') {$AccountName = new  AccountsPayable;}
                             if($AccountName =='Employee clearing account') {$AccountName=new  EmployeeAccount;}
                             if($AccountName =='Payroll liabilities') { $AccountName=new  PayrollLiabilities;} 
                             if($AccountName =='Retained earnings'){ $AccountName=new  RetainedEarnings;} 
                             if($AccountName =='Starting balance equity') { $AccountName = new StartingBalance; }
                             if($AccountName =='Interest received') {$AccountName= new  InterestReceived;} 
                             if($AccountName =='Inventory - sales') { $AccountName =new  InventorySales; }                          
                                                  //Expenses in Debt 
                             if($AccountName =='Accounting fees') { $AccountName = new  AccountingFees; }
                             if($AccountName =='Advertising and promotion') { $AccountName = new  Advertising;}
                             if($AccountName =='Bank charges') {$AccountName= new  BankCharges;} 
                             if($AccountName =='Computer equipment'){ $AccountName = new  ComputerEquipment;} 
                             if($AccountName =='Donations') {$AccountName = new  Donations;}
                             if($AccountName =='Electricity') {$AccountName=new  Electricity;}
                             if($AccountName =='Entertainment') { $AccountName=new  Entertainment;} 
                             if($AccountName =='Inventory - cost'){ $AccountName=new  InventoryCost;} 
                             if($AccountName =='Legal fees') { $AccountName = new LegalFees; }
                             if($AccountName =='Motor vehicle expenses') { $AccountName = new MotorVehicle;}
                             if($AccountName =='Printing and stationery') { $AccountName = new Printing;}
                             if($AccountName =='Rent') { $AccountName = new Rent;}
                             if($AccountName =='Repairs and maintenance') { $AccountName = new Repairs;}     
                             if($AccountName =='Rounding expense') { $AccountName = new Rounding;}
                                        
                          //Object is created
                       $AccountName->Description=$value->Description;
                       $AccountName->Debit=$value->Debit;
                       $AccountName->Credit=$value->Credit;
                       $AccountName->bId=$bid;
                       $AccountName->journalid=$Id;
                       $AccountName->save();  
                                     
            }

       Toastr::success('Successfully Created', 'Journal Entry', ["positionClass" => "toast-top-right"]);
        return Redirect::to('Journal');
        
    }

    
    public function show($id)
    {
    
    }

    
    public function edit($id)
    {
        $Journal = Journal::find($id);
        $JournalEntry=Journal::with('JournalEntries')->Where('id',$id)->get();
       // dd($JournalEntry);
        return view('journal.journal-edit')->with('Journal',$Journal)->with('JournalEntry',$JournalEntry);
    }

    public function update(Request $request, $id)
    {
         $Journal = Journal::find($id);

         if (!is_null($Journal)) {
            
             $Journal->JournalEntries()->delete();
             $Journal->JournalAccountReceivable()->delete();
             $Journal->JournalCashAtBank()->delete();
             $Journal->JournalCashOnHand()->delete();
             $Journal->JournalInventoryOnHand()->delete();
             $Journal->JournalAccountsPayable()->delete();
             $Journal->JournalEmployeeAccount()->delete();
             $Journal->JournalPayrollLiabilities()->delete();
             $Journal->JournalRetainedEarnings()->delete();
             $Journal->JournalInterestReceived()->delete();
             $Journal->JournalInventorySales()->delete();
             $Journal->JournalAccountingFees()->delete();
             $Journal->JournalAdvertising()->delete();
             $Journal->JournalBankCharges()->delete();
             $Journal->JournalDonations()->delete();
             $Journal->JournalElectricity()->delete();
             $Journal->JournalEntertainment()->delete();
             $Journal->JournalInventoryCost()->delete();
             $Journal->JournalLegalFees()->delete();
             $Journal->JournalMotorVehicle()->delete();
             $Journal->JournalPrinting()->delete();
             $Journal->JournalRent()->delete();
             $Journal->JournalRepairs()->delete();
             $Journal->JournalRounding()->delete(); 
         
           $Journal->delete();

        $bid = Session::get('bId'); 
        $input = Input::all();
        //dd(Input::all());
        $Journal->Date=is_null(Input::get('date')) ? '' : Input::get('date');
        $Journal->QuoteNumber=Input::get('QuoteNumber');
        $Journal->Narration=Input::get('Narration');
        $Journal->Debit=Input::get('debtTotal');
        $Journal->Credit=Input::get('creditTotal');
        $Journal->bId =$bid;
        if ($Journal->save()) {
            $Id=$Journal->id;
         
           for($id = 0; $id < count($input['inventId']); $id++){
                $JournalEntry = new JournalEntry;
                $JournalEntry->journalid=$Journal->id;
                $JournalEntry->Account=$input['inventId'][$id];
                $JournalEntry->Description=$input['discription'][$id];
                $JournalEntry->Debit=$input['debt'][$id];
                $JournalEntry->Credit=$input['credit'][$id];
                $JournalEntry->save();

               } 
          }
          $JournalEntryRecord =JournalEntry::with('Accounts')->Where('journalid',$Id)->get();
        //  dd($JournalEntryRecord);
                    foreach ($JournalEntryRecord as $value) {
                            $AccountName= $value->Accounts->AccountName;
                             if($AccountName =='Account receivable') { $AccountName = new  AccountReceivable; }
                             if($AccountName =='Cash at bank') { $AccountName = new  CashAtBank;}
                             if($AccountName =='Cash on hand') {$AccountName= new  CashOnHand;} 
                             if($AccountName =='Inventory on hand'){ $AccountName = new  InventoryOnHand;} 
                             if($AccountName =='Accounts payable') {$AccountName = new  AccountsPayable;}
                             if($AccountName =='Employee clearing account') {$AccountName=new  EmployeeAccount;}
                             if($AccountName =='Payroll liabilities') { $AccountName=new  PayrollLiabilities;} 
                             if($AccountName =='Retained earnings'){ $AccountName=new  RetainedEarnings;} 
                             if($AccountName =='Starting balance equity') { $AccountName = new StartingBalance; }
                             if($AccountName =='Interest received') {$AccountName= new  InterestReceived;} 
                             if($AccountName =='Inventory - sales') { $AccountName =new  InventorySales; }                          
                                                  //Expenses in Debt 
                             if($AccountName =='Accounting fees') { $AccountName = new  AccountingFees; }
                             if($AccountName =='Advertising and promotion') { $AccountName = new  Advertising;}
                             if($AccountName =='Bank charges') {$AccountName= new  BankCharges;} 
                             if($AccountName =='Computer equipment'){ $AccountName = new  ComputerEquipment;} 
                             if($AccountName =='Donations') {$AccountName = new  Donations;}
                             if($AccountName =='Electricity') {$AccountName=new  Electricity;}
                             if($AccountName =='Entertainment') { $AccountName=new  Entertainment;} 
                             if($AccountName =='Inventory - cost'){ $AccountName=new  InventoryCost;} 
                             if($AccountName =='Legal fees') { $AccountName = new LegalFees; }
                             if($AccountName =='Motor vehicle expenses') { $AccountName = new MotorVehicle;}
                             if($AccountName =='Printing and stationery') { $AccountName = new Printing;}
                             if($AccountName =='Rent') { $AccountName = new Rent;}
                             if($AccountName =='Repairs and maintenance') { $AccountName = new Repairs;}     
                             if($AccountName =='Rounding expense') { $AccountName = new Rounding;}
                                        
                          //Object is created
                       $AccountName->Description=$value->Description;
                       $AccountName->Debit=$value->Debit;
                       $AccountName->Credit=$value->Credit;
                       $AccountName->bId=$bid;
                       $AccountName->journalid=$Id;
                       $AccountName->save();  
                                     
            }

           

              Toastr::success('Successfully Updated', 'Journal Entry', ["positionClass" => "toast-top-right"]);
               return Redirect::to('Journal');         
         }

    }

    
    public function destroy($id)
    {
      $Journal = Journal::find($id);

         if (!is_null($Journal)) {
      
             $Journal->JournalEntries()->delete();
             $Journal->JournalAccountReceivable()->delete();
             $Journal->JournalCashAtBank()->delete();
             $Journal->JournalCashOnHand()->delete();
             $Journal->JournalInventoryOnHand()->delete();
             $Journal->JournalAccountsPayable()->delete();
             $Journal->JournalEmployeeAccount()->delete();
             $Journal->JournalPayrollLiabilities()->delete();
             $Journal->JournalRetainedEarnings()->delete();
             $Journal->JournalStartingBalance()->delete();
             $Journal->JournalInterestReceived()->delete();
             $Journal->JournalInventorySales()->delete();
             $Journal->JournalAccountingFees()->delete();
             $Journal->JournalAdvertising()->delete();
             $Journal->JournalBankCharges()->delete();
             $Journal->JournalDonations()->delete();
             $Journal->JournalElectricity()->delete();
             $Journal->JournalEntertainment()->delete();
             $Journal->JournalInventoryCost()->delete();
             $Journal->JournalLegalFees()->delete();
             $Journal->JournalMotorVehicle()->delete();
             $Journal->JournalPrinting()->delete();
             $Journal->JournalRent()->delete();
             $Journal->JournalRepairs()->delete();
             $Journal->JournalRounding()->delete();
                 $Journal->delete();

              Toastr::success('Successfully Deleted', 'Journal Entry', ["positionClass" => "toast-top-right"]);
               return Redirect::to('Journal');         
         }
        
    }

    public function print($id){
         $Journal = Journal::find($id);
        $JournalEntry=Journal::with('JournalEntries')->Where('id',$id)->get();
        $pdf=new PDF();
        $pdf=PDF::loadView('journal.jornal-pdf',['Journal'=>$Journal,'JournalEntry'=>$JournalEntry])->setPaper('A4');
        return  $pdf->stream('proforma.pdf',array('Attachment'=>0));
      //  return view('journal.journal-edit')->with('Journal',$Journal)->with('JournalEntry',$JournalEntry);
    }
}
