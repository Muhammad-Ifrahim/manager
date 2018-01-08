<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

use App\Models\AccountReceivable;
use App\Models\CashAtBank;
use App\Models\CashOnHand;
use App\Models\InventoryOnHand;
use App\Models\AccountsPayable;
use App\Models\EmployeeAccount;
use App\Models\PayrollLiabilities;
use App\Models\RetainedEarnings;
use App\Models\InterestReceived;
use App\Models\StartingBalance;
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

class Journal extends Model
{
    public $primaryKey ='id';
    public  $table='Journal';


    public  function JournalEntries(){

    	return  $this->hasMany('App\Models\JournalEntry', 'journalid')->orderBy('jouId');;
    }

   public  function JournalAccountReceivable(){

        return  $this->hasMany('App\Models\AccountReceivable', 'journalid');
    }
    public  function JournalStartingBalance(){

        return  $this->hasMany('App\Models\StartingBalance', 'journalid');
    }

    public  function JournalCashAtBank(){

    	return  $this->hasMany('App\Models\CashAtBank', 'journalid');
    }
    public  function JournalCashOnHand(){

    	return  $this->hasMany('App\Models\CashOnHand', 'journalid');
    }
    public  function JournalInventoryOnHand(){

    	return  $this->hasMany('App\Models\InventoryOnHand', 'journalid');
    }
    public  function JournalAccountsPayable(){

    	return  $this->hasMany('App\Models\AccountsPayable', 'journalid');
    }
    public  function JournalEmployeeAccount(){

    	return  $this->hasMany('App\Models\EmployeeAccount', 'journalid');
    }
    public  function JournalPayrollLiabilities(){

    	return  $this->hasMany('App\Models\PayrollLiabilities', 'journalid');
    }
    public  function JournalRetainedEarnings(){

    	return  $this->hasMany('App\Models\RetainedEarnings', 'journalid');
    }
    public  function JournalInterestReceived(){

    	return  $this->hasMany('App\Models\InterestReceived', 'journalid');
    }
    public  function JournalInventorySales(){

    	return  $this->hasMany('App\Models\InventorySales', 'journalid');
    }
    public  function JournalAccountingFees(){

    	return  $this->hasMany('App\Models\AccountingFees', 'journalid');
    }
     public  function JournalAdvertising(){

    	return  $this->hasMany('App\Models\Advertising', 'journalid');
    }
    
    public  function JournalBankCharges(){

    	return  $this->hasMany('App\Models\ComputerEquipment', 'journalid');
    }
    public  function JournalDonations(){

    	return  $this->hasMany('App\Models\Donations', 'journalid');
    }
    public  function JournalElectricity(){

    	return  $this->hasMany('App\Models\Electricity', 'journalid');
    }
    public  function JournalEntertainment(){

    	return  $this->hasMany('App\Models\Entertainment', 'journalid');
    }
    public  function JournalInventoryCost(){

    	return  $this->hasMany('App\Models\InventoryCost', 'journalid');
    }
    public  function JournalLegalFees(){

    	return  $this->hasMany('App\Models\LegalFees', 'journalid');
    }
    public  function JournalMotorVehicle(){

    	return  $this->hasMany('App\Models\MotorVehicle', 'journalid');
    }
    public  function JournalPrinting(){

    	return  $this->hasMany('App\Models\Printing', 'journalid');
    }
    public  function JournalRent(){

    	return  $this->hasMany('App\Models\Rent', 'journalid');
    }
    public  function JournalRepairs(){

    	return  $this->hasMany('App\Models\Repairs', 'journalid');
    }      
    public  function JournalRounding(){

    	return  $this->hasMany('App\Models\Rounding', 'journalid');
    }          
                                                       
    public $timestamps = false;
}