<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
use  Illuminate\Support\Facades\App;
//use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Events\Authenticated;

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

use Session;
use View;
use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->app['events']->listen(Authenticated::class, function ($e) {          
        if($e->user->id)
        {
        echo $e->user->id;
        $user=User::find($e->user->id);
        View::share('user',$user);
echo $user->name;
        App::singleton('user', function($app)
        {
            $user=User::find(7);
            return $user;
        });
        //Get business id from users table
        $bid = $user->bId;
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

        $inventory=Inventory::all();
        View::share('inventory',$inventory);
        }

        // $proforma=Proforma::all(); 
        // View::share('proforma',$proforma);
        }); 
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