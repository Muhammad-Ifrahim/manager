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
use App\Models\Role;
use App\Models\Sale;
use App\Models\PurchaseOrder;
use App\Models\Supplier;
use App\Models\DeliverySale;
use App\Models\InventoryTransfer;
use App\Models\InventoryLocation;
use App\Models\PurchaseOrderSale;
use App\Models\Tax;

use Session;
use View;
use Auth;
use Config;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        //To get id of only authenticated/logged user
        $this->app['events']->listen(Authenticated::class, function ($e) {          
        if($e->user->id)
        {
            $user=User::find($e->user->id);
            View::share('user',$user);
            
            /*App::singleton('user', function($app)
            {
                $user=User::find(13);
                return $user;
            });*/

            $user=User::find($user->id);
            Config::set('userU', $user); 

            
            $bid = $user->bId;
            Session::put('bId', $bid);
            
            $allUser = User::where('bId', $bid)->get();
            View::share('allUser', $allUser);
            
            $roles = Role::all();
            View::share('roles',$roles);
            $strtDate = StartDate::where('bId', $bid)->get();
            View::share('strtDate', $strtDate);
            if(sizeof($strtDate)>0)
            {
                View::share('dateId', $strtDate[0]->id);
                View::share('dateValue', $strtDate[0]->date);
            }
        else
            {
                View::share('dateId', '0');
                View::share('dateValue', '0');
            }   
    //        dd(sizeof($strtDate));
            $pEarnItem = pearnitems::where('bId', $bid)->get();
            View::share('pEarnItem', $pEarnItem);

            $pContributItem = pContributeItems::where('bId', $bid)->get();
            View::share('pContributItem', $pContributItem);

            $pDeductItem = pDeductItems::where('bId', $bid)->get();
            View::share('pDeductItem', $pDeductItem);

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
            Config::set('business', $business); 

            //To avoid migration issue
            Schema::defaultStringLength(191);

            $fixedassets=FixedAsset::all();
            View::share('fixedassets',$fixedassets);

            $sale=Sale::where('bId', $bid)->get();
            View::share('sale',$sale);

            $inventory=Inventory::where('bId', $bid)->get();
            View::share('inventory',$inventory);

            $supplier=Supplier::where('bId', $bid)->get();
            View::share('supplier',$supplier);

            $DeliverySale=DeliverySale::where('bId', $bid)->get();
            View::share('DeliverySale',$DeliverySale);    

            $InventoryTransfer=InventoryTransfer::where('bId', $bid)->get();

            View::share('InventoryTransfer',$InventoryTransfer); 

            $PurchaseOrderSale=PurchaseOrderSale::where('bId', $bid)->get();
            View::share('PurchaseOrderSale',$PurchaseOrderSale); 

            $Tax=Tax::all();
            View::share('Tax',$Tax);                    

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
