<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
use  Illuminate\Support\Facades\App;

use App\Models\Customer;
use App\Models\Business;
use App\Models\Employee;
use App\Models\StartDate;
use App\Models\FixedAsset;
use App\Models\Inventory;
use App\Models\User;
<<<<<<< HEAD
use App\Models\pEarnItems;
use App\Models\pDeductItems;
use App\Models\pContributeItems;
use App\Models\expenseAccounts;
use App\Models\Payslips;

=======
use App\Models\Proforma;
>>>>>>> 36d8c56161db6565434836b621fee39e942e96de
use Session;
use View;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //Hardcoded temporarily
        $bid = '1';
        Session::put('bId', $bid);
        
        $strtDate = StartDate::where('bId', $bid)->get();
        view()->share('strtDate', $strtDate);

        $pEarnItem = pearnitems::where('bId', $bid)->get();
        view()->share('pEarnItem', $pEarnItem);

        $pContributItem = pContributeItems::where('bId', $bid)->get();
        view()->share('pContributItem', $pContributItem);

        $pDeductItem = pDeductItems::where('bId', $bid)->get();
        view()->share('pDeductItem', $pDeductItem);

        $customers=Customer::all();            //this is used to share data between all view
        View::share('customers',$customers);

        $employees=Employee::where('bId', $bid)->get();
        View::share('employees',$employees);

        $expAccounts = expenseAccounts::where('bId',$bid)->get();
        View::share('expAccounts',$expAccounts);

        //For Payslips     
        $payslp = Payslips::where('bId', $bid)->get();
        View::share('payslp', $payslp);

        $business = Business::all();
        View::share('business', $business);
        
        //To avoid migration issue
        Schema::defaultStringLength(191);

        $fixedassets=FixedAsset::all();
        View::share('fixedassets',$fixedassets);

        $user=User::find(6);
        View::share('user',$user);
        App::singleton('user', function($app)
        {
            $user=User::find(6);
            return $user;
        });
        $inventory=Inventory::all();
        View::share('inventory',$inventory);
<<<<<<< HEAD
   }
=======

        // $proforma=Proforma::all(); 
        // View::share('proforma',$proforma); 

        
        

    }
>>>>>>> 36d8c56161db6565434836b621fee39e942e96de

    /**
     * Register gupnp_service_proxy_add_notify(proxy, value, type, callback) application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}