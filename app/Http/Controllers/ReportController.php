<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Config;

class ReportController extends Controller
{
   // Validation Rules

  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index()
  {
    return View::make('reports.reportHome-View');
  }

  public function create()
  {
    return View::make('reports.payslips.pEarnSummary-Create');
  }

  public function store(Request $request){
    
  }
}