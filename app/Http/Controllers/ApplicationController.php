<<<<<<< HEAD
<?php

namespace App\Http\Controllers;
use App\Http\Traits\CustomerTrait;
use Illuminate\Http\Request;
use App\Models\Customer;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use View;
use Debugbar;


class ApplicationController extends BaseController
{
	//use CustomerTrait; 					//Trait is class develop to used by Multiple Users    
    function index(){
    	 	
          return view('layouts.master');

    }


}