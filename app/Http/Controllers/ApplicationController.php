<?php

namespace App\Http\Controllers;
use App\Http\Traits\CustomerTrait;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
	use CustomerTrait;
    function index(){
         $customers=$this->allCustomer();
    	return view('layouts.master')->with('customers',$customers);
    }
}
