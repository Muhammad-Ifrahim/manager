<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;

use View;

class DateSettingController extends Controller
{

   public function __invoke(){

   }
   
   public function index(){
		return View::make('settings.startdate');
   }

   public function create(){
   }   

  public function store(Request $request){
   
  }

  public function getStartDate()
  {

  }
}
