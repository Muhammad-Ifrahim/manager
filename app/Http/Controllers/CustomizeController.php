<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use View;

class CustomizeController extends Controller
{
    function index(){
    	return View::make('customize.customize-layout');
    }
}
