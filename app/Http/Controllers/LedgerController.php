<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use Illuminate\Http\Request;
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

use View;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class LedgerController extends Controller
{

    public function __construct()
    {
    $this->middleware('auth');
    }
  
    public function index()
    { 
          $bid = Session::get('bId');
          $AccountReceivable=AccountReceivable::where('bId',$bid)->get();
          $CashAtBank=CashAtBank::where('bId',$bid)->get();
          $CashOnHand=CashOnHand::where('bId',$bid)->get();
          $InventoryOnHand=InventoryOnHand::where('bId',$bid)->get();
          $AccountsPayable=AccountsPayable::where('bId',$bid)->get();
          $EmployeeAccount=EmployeeAccount::where('bId',$bid)->get();
          $PayrollLiabilities=PayrollLiabilities::where('bId',$bid)->get();
          $RetainedEarnings=RetainedEarnings::where('bId',$bid)->get();
          $StartingBalance=StartingBalance::where('bId',$bid)->get();
          $InterestReceived=InterestReceived::where('bId',$bid)->get();
          $InventorySales=InventorySales::where('bId',$bid)->get();
                 // Expeneses
          $AccountingFees=AccountingFees::where('bId',$bid)->get();
          $Advertising=Advertising::where('bId',$bid)->get();
          $BankCharges=BankCharges::where('bId',$bid)->get();
          $ComputerEquipment=ComputerEquipment::where('bId',$bid)->get();
          $Donations=Donations::where('bId',$bid)->get();
          $Electricity=Electricity::where('bId',$bid)->get();
          $Entertainment=Entertainment::where('bId',$bid)->get();
          $InventoryCost=InventoryCost::where('bId',$bid)->get();
          $LegalFees=LegalFees::where('bId',$bid)->get();
          $MotorVehicle=MotorVehicle::where('bId',$bid)->get();
          $Rent=Rent::where('bId',$bid)->get();
          $Repairs=Repairs::where('bId',$bid)->get();
          $Rounding=Rounding::where('bId',$bid)->get();

        return view('ledgers.ledgers-view')->with('AccountReceivable',$AccountReceivable)->with('CashAtBank',$CashAtBank)->with('CashOnHand',$CashOnHand)->with('InventoryOnHand',$InventoryOnHand)->with('AccountsPayable',$AccountsPayable)->with('EmployeeAccount',$EmployeeAccount)->with('PayrollLiabilities',$PayrollLiabilities)->with('RetainedEarnings',$RetainedEarnings)->with('InterestReceived',$InterestReceived)->with('InventorySales',$InventorySales)->with('AccountingFees',$AccountingFees)->with('Advertising',$Advertising)->with('BankCharges',$BankCharges)->with('ComputerEquipment',$ComputerEquipment)->with('Donations',$Donations)->with('Electricity',$Electricity)->with('Entertainment',$Entertainment)->with('InventoryCost',$InventoryCost)->with('LegalFees',$LegalFees)->with('MotorVehicle',$InventorySales)->with('Rent',$Rent)->with('Repairs',$Repairs)->with('Rounding',$Rounding)->with('StartingBalance',$StartingBalance);    
    }
   
    public function create()
    {
        //
    }

   
    public function store(Request $request)
    {
        //
    }

    
    public function show($id)
    {
        //
    }

    
    public function edit($id)
    {
        $Journal = Journal::find($id);
        //dd($Journal);
        $JournalEntry=Journal::with('JournalEntries')->Where('id',$id)->get();
        return view('journal.journal-edit')->with('Journal',$Journal)->with('JournalEntry',$JournalEntry);
        
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
