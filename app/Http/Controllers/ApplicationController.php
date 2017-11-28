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

class ApplicationController extends BaseController
{
	//use CustomerTrait; 					//Trait is class develop to used by Multiple Users    
    function index(){
    	$user = Auth::user();
		// Get the currently authenticated user's ID...
		$id = Auth::id();

    	if ($id==null) {
    		return view('auth.login');
    	}
        else if ($id==13) {
            return Redirect::to('business');            
        }

    	else
    	{
            return view('layouts.master');
    	}
    }

}