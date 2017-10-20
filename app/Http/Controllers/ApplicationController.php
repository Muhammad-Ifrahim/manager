<?php

namespace App\Http\Controllers;
use App\Http\Traits\CustomerTrait;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
	use CustomerTrait; 					//Trait is class develop to used by Multiple Users    
    function index(){
    	return view('layouts.master');
    }
}
