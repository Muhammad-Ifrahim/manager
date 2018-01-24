<?php

namespace App\Http\Controllers;
use App\Http\Traits\CustomerTrait;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use Debugbar;
use Redirect;
use Config;

class ApplicationController extends BaseController
{
	//Used CustomerTrati - Trait is class develop to used by Multiple Users    
    function index()
    {
    	$user = Auth::user();
		// Get the currently authenticated user's ID...
		$id = Auth::id();
        $userU = Config::get('userU');

    	if ($id==null) {
    		return view('auth.login');
    	}
        else if ($userU->userType=='Admin') {
            return Redirect::to('business');            
        }

    	else
    	{
            return view('layouts.master');
    	}
    }
}