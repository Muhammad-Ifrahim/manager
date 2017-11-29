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
use App\Models\pearnitems;
use App\Models\pDeductItems;
use App\Models\pContributeItems;
use App\Models\expenseAccounts;
use App\Models\Payslips;
use App\Models\Proforma;
use App\Models\Sale;
use App\Models\DeliverySale;
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

     $bid = '1';
      if (!empty($bid)) {

          
        //Hardcoded temporarily
        
        Session::put('bId', $bid);
        
        $strtDate = StartDate::where('bId', $bid)->get();
        view()->share('strtDate', $strtDate);

        $pEarnItem = pearnitems::where('bId', $bid)->get();
        view()->share('pEarnItem', $pEarnItem);

        $pContributItem = pContributeItems::where('bId', $bid)->get();
        view()->share('pContributItem', $pContributItem);

        $pDeductItem = pDeductItems::where('bId', $bid)->get();
        view()->share('pDeductItem', $pDeductItem);

        $customers=Customer::where('bId', $bid)->get();            //this is used to share data between all view
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

        $fixedassets=FixedAsset::where('bId', $bid)->get();
        View::share('fixedassets',$fixedassets);

        $user=User::find(6);
        View::share('user',$user);
        App::singleton('user', function($app)
        {
            $user=User::find(6);
            return $user;
        });
        $inventory=Inventory::where('bId', $bid)->get();
        View::share('inventory',$inventory);

        $Sale=Sale::where('bId', $bid)->get(); 
        View::share('Sale',$Sale);

        $DeliverySale=DeliverySale::where('bId', $bid)->get(); 
        View::share('DeliverySale',$DeliverySale); 


      }
    }

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