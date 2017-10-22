<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;

use View;

class SettingController extends Controller
{

   public function __invoke(){

   }
   public function index(){
		return View::make('settings.setting');
   }

   public function create(){
   }   

  public function store(Request $request){
  }

  public function getStartDate()
  {

  }
}
