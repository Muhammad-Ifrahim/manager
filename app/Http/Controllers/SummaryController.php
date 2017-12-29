<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use  Illuminate\Support\Facades\App;
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
use View;
use Validator;
use Toastr;
use Redirect;

class SummaryController extends Controller
{
    public function __construct()
    {
    $this->middleware('auth');
    }

   
    public function index()
    {
        $bid = Session::get('bId');
        $Assets=0;
        $income=0;
        $expenses=0;
        $debit=0;
        $credit=0;
          $AccountReceivable=AccountReceivable::where('bId',$bid)->get();
            foreach ($AccountReceivable as $key => $value) {
                  $debit +=$value->Debit;
                  $credit +=$value->Credit;
            }
          $AccountReceivable=$debit-$credit;
           $debit=0;
           $credit=0;
 
          $CashAtBank=CashAtBank::where('bId',$bid)->get();
          foreach ($CashAtBank as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $CashAtBank=$debit-$credit;
          $debit=0;
           $credit=0;

          $CashOnHand=CashOnHand::where('bId',$bid)->get();
          foreach ($CashOnHand as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $CashOnHand=$debit-$credit;
          $debit=0;
          $credit=0;
          $InventoryOnHand=InventoryOnHand::where('bId',$bid)->get();
          foreach ($InventoryOnHand as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $InventoryOnHand=$debit-$credit;
          $debit=0;
          $credit=0;
          $AccountsPayable=AccountsPayable::where('bId',$bid)->get();
          foreach ($AccountsPayable as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $AccountsPayable=$credit-$debit;
          $debit=0;
          $credit=0;

          $EmployeeAccount=EmployeeAccount::where('bId',$bid)->get();
          foreach ($EmployeeAccount as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $EmployeeAccount=$credit-$debit;

          $debit=0;
          $credit=0;

          $PayrollLiabilities=PayrollLiabilities::where('bId',$bid)->get();
          foreach ($PayrollLiabilities as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $PayrollLiabilities=$credit-$debit;
          
           $debit=0;
          $credit=0;
          $RetainedEarnings=RetainedEarnings::where('bId',$bid)->get();
          foreach ($RetainedEarnings as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $RetainedEarnings=$credit-$debit;

           $debit=0;
          $credit=0;
          $StartingBalance=StartingBalance::where('bId',$bid)->get();
          foreach ($StartingBalance as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $StartingBalance=$credit-$debit;
          
          $debit=0;
          $credit=0;
          $InterestReceived=InterestReceived::where('bId',$bid)->get();
          foreach ($InterestReceived as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $InterestReceived=$credit-$debit;
        
          $debit=0;
          $credit=0;
          $InventorySales=InventorySales::where('bId',$bid)->get();
          foreach ($InventorySales as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $InventorySales=$credit-$debit;
                 // Expeneses
           $debit=0;
          $credit=0;
          $AccountingFees=AccountingFees::where('bId',$bid)->get();
          foreach ($AccountingFees as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $AccountingFees=$debit-$credit;
 
           $debit=0;
          $credit=0;
          $Advertising=Advertising::where('bId',$bid)->get();
          foreach ($Advertising as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Advertising=$debit-$credit;

           $debit=0;
          $credit=0;
          $BankCharges=BankCharges::where('bId',$bid)->get();
          foreach ($BankCharges as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $BankCharges=$debit-$credit;

           $debit=0;
          $credit=0;
          $ComputerEquipment=ComputerEquipment::where('bId',$bid)->get();
          foreach ($ComputerEquipment as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $ComputerEquipment=$debit-$credit;


           $debit=0;
          $credit=0;
          $Donations=Donations::where('bId',$bid)->get();
          foreach ($Donations as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Donations=$debit-$credit;

           $debit=0;
          $credit=0;
          $Electricity=Electricity::where('bId',$bid)->get();
          foreach ($Electricity as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Electricity=$debit-$credit;

           $debit=0;
          $credit=0;
          $Entertainment=Entertainment::where('bId',$bid)->get();
          foreach ($Entertainment as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Entertainment=$debit-$credit;

           $debit=0;
          $credit=0;
          $InventoryCost=InventoryCost::where('bId',$bid)->get();
          foreach ($InventoryCost as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $InventoryCost=$debit-$credit;

           $debit=0;
          $credit=0;
          $LegalFees=LegalFees::where('bId',$bid)->get();
          foreach ($LegalFees as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $LegalFees=$debit-$credit;

          $debit=0;
          $credit=0;
          $MotorVehicle=MotorVehicle::where('bId',$bid)->get();
          foreach ($MotorVehicle as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $MotorVehicle=$debit-$credit;

          $Rent=Rent::where('bId',$bid)->get();
          foreach ($Rent as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Rent=$debit-$credit;
          
          $debit=0;
          $credit=0;
          $Repairs=Repairs::where('bId',$bid)->get();
          foreach ($Repairs as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Repairs=$debit-$credit;
 
          $debit=0;
          $credit=0;
          $Rounding=Rounding::where('bId',$bid)->get();
          foreach ($Rounding as $key => $value) {
                  $debit+=$value->Debit;
                  $credit+=$value->Credit;
            }
          $Rounding=$debit-$credit;


          $Assets=$AccountReceivable+$CashOnHand+$InventoryOnHand;
          $Liability=$AccountsPayable+$EmployeeAccount+$PayrollLiabilities;
          $income=$InterestReceived+$InventorySales;
          //$equity=$RetainedEarnings+$StartingBalance;
          $expenses=$AccountingFees+$Advertising+$AccountingFees+$Advertising+$BankCharges+$ComputerEquipment+$Donations+$Electricity+$Entertainment+$InventoryCost+$LegalFees+$MotorVehicle+$Rent+$Repairs;
          $net=$income-$expenses;
          $RetainedEarnings +=$net;
          $equity=$RetainedEarnings+$StartingBalance;

        return view('summary.summary-view')->with('AccountReceivable',$AccountReceivable)->with('CashAtBank',$CashAtBank)->with('CashOnHand',$CashOnHand)->with('InventoryOnHand',$InventoryOnHand)->with('AccountsPayable',$AccountsPayable)->with('EmployeeAccount',$EmployeeAccount)->with('PayrollLiabilities',$PayrollLiabilities)->with('RetainedEarnings',$RetainedEarnings)->with('InterestReceived',$InterestReceived)->with('InventorySales',$InventorySales)->with('AccountingFees',$AccountingFees)->with('Advertising',$Advertising)->with('BankCharges',$BankCharges)->with('ComputerEquipment',$ComputerEquipment)->with('Donations',$Donations)->with('Electricity',$Electricity)->with('Entertainment',$Entertainment)->with('InventoryCost',$InventoryCost)->with('LegalFees',$LegalFees)->with('MotorVehicle',$MotorVehicle)->with('Rent',$Rent)->with('Repairs',$Repairs)->with('Assets',$Assets)->with('Liability',$Liability)->with('income',$income)->with('expenses',$expenses)->with('Rounding',$Rounding)->with('StartingBalance',$StartingBalance)->with('equity',$equity)->with('net',$net);
       
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
