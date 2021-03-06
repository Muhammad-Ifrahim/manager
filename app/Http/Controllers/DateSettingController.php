<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use App\Models\StartDate;

use View;
use Request;
use Session;
use Redirect;
use Config;

class DateSettingController extends Controller
{

public function __construct()
{
  $this->middleware('auth');
}
 
public function index(){
  $user = Config::get('userU');
  $bid = Session::get('bId');
  //In case if start date is already set show update page for date otherwise
  //show the create date page
  //as it is in manager.io
  $strtDate = StartDate::where('bId', $bid)->get();
  if(sizeof($strtDate)<=0)
  {
    return View::make('settings.startdate'); 
  }
  else
  {
    return View::make('settings.startdate-edit'); 
  }  
}

 public function create(){

 }   

public function store(Request $request){
  $DateSet = new StartDate;
  $DateSet->fill(Request::all());
  if($DateSet->save()){
  }
  //Toastr::success('Successfully Created', 'Employee');
  return redirect('settings');
}

public function edit($Id){

}

public function update($Id){
  $stDate=StartDate::find($Id);
  if($stDate){
      $stDate->fill(Request::all());
      if($stDate->save())
      {
        $stDate=StartDate::find($Id);
//              Toastr::success('Successfully Updated', 'Employee');
        return Redirect::to('settings');
      }
  }
}

public function getStartDate()
{

}
}
