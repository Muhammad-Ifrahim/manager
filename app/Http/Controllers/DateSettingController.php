<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\StartDate;
use View;
use Request;
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
    $DateSet = new StartDate;
          $DateSet->fill(Request::all());
          if($DateSet->save()){
          }
          //Toastr::success('Successfully Created', 'Employee');
          return redirect('settings');
  }

  public function getStartDate()
  {

  }
}
