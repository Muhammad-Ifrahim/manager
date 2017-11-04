<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use  Illuminate\Support\Facades\Schema;
use App\Models\Customer;
use App\Models\Business;
use App\Models\Employee;
use App\Models\StartDate;
use App\Models\FixedAsset;

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
        Session::put('bId', $bid);
        
        $strtDate= StartDate::where('bId', $bid)->get();
        
        //View::share('employees', $strtDate);
        view()->share('strtDate', $strtDate);

        $customers=Customer::all();            //this is used to share data between all view
        View::share('customers',$customers);

        $employees=Employee::where('bId', $bid)->get();
        View::share('employees',$employees);

        $business = Business::all();
        View::share('business', $business);
        
        //To avoid migration issue
        Schema::defaultStringLength(191);

        $fixedassets=FixedAsset::all();
        View::share('fixedassets',$fixedassets);
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
