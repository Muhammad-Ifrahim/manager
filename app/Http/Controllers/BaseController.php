<?php

namespace App\Http\Controllers;
use  Illuminate\Support\Facades\Schema;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Employee;
use App\Models\FixedAsset;
use App\Models\User;
use View;
use Debugbar;

class BaseController extends Controller
{
    public function __construct(){
    
        Debugbar::addMessage('Another message', 'mylabel');
     
    	$customers=Customer::all();          
        View::share('customers',$customers);


        $employees=Employee::all();
        View::share('employees',$employees);
        
        //To avoid migration issue
        Schema::defaultStringLength(191);

        $fixedassets=FixedAsset::all();
        View::share('fixedassets',$fixedassets);

        $user=User::find(6);
        View::share('user',$user);
      
        // dd('--------->>>>>>>>>>>------------');
    }
    public function getAllData(){
    	
    }
}
