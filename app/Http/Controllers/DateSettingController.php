<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use App\Models\StartDate;

use View;
use Request;
use Session;
use Redirect;

class DateSettingController extends Controller
{

public function __construct()
{
  $this->middleware('auth');
}
 
public function index(){
  $user = App::make('user');
  if($user->FixedAsset>0)
  {
    $bid = Session::get('bId'); 
    $strtDate = StartDate::where('bId', $bid)->get();
    if($strtDate==null)
    {
      return View::make('settings.startdate'); 
    }
    else
    {
      return View::make('settings.startdate-edit'); 
    }  
  }
  else
  {
    return View::make('errors.notAllowed-view');
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
