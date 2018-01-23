<?php

namespace App\Http\Middleware;

use Closure;
use View;
use Redirect;
use App\Article;
use Illuminate\Contracts\Auth\Guard;

class KAccessMiddleware
{
     /**
     * The Guard implementation.
     *
     * @var Guard
     */
    protected $auth;

    /**
     * Create a new filter instance.
     *
     * @param  Guard  $auth
     * @return void
     */
    public function __construct(Guard $auth)
    {
        $this->auth = $auth;
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $fullPath = $request->route()->getName();
        
        $kModule = '';

        if (strpos($fullPath, '.'))
        {
            $allVar = explode('.', $fullPath) ;
            $kModule = $allVar[0];
            $kMethod = $allVar[1];
        }

        if ($request->user()!=null)
        {
            if($kModule=='supplier')
            {
                if($request->user()->Supplier==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='employee')
            {
                if($request->user()->employee==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='customer')
            {
                if($request->user()->customer==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='proforma')
            {
                if($request->user()->SalesQuote==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='deliverynote')
            {
                if($request->user()->DeliveryNotes==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='purchaseorder')
            {
                if($request->user()->PurchaseOrder==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='Inventory')
            {
                if($request->user()->inventory==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='InventoryTransfer')
            {
                if($request->user()->InventoryTransfer==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='fixedasset')
            {
                if($request->user()->FixedAsset==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='supplier')
            {
                if($request->user()->Supplier==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='supplier')
            {
                if($request->user()->Supplier==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='supplier')
            {
                if($request->user()->Supplier==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='supplier')
            {
                if($request->user()->Supplier==0)
                {
                    return Redirect::to('notAllowed');
                }
            }

            if($kModule=='supplier')
            {
                if($request->user()->Supplier==0)
                {
                    return Redirect::to('notAllowed');
                }
            }
        }
        return $next($request);
    }
}
