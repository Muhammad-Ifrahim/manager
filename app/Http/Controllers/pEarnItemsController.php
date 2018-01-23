<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Models\pearnitems;

use View;
use Request;
use Session;
use Redirect;

class pEarnItemsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
   
   public function index(){
    return View::make('settings.payslip.payslipEarn-view'); 
   }

   public function create()
   {
    return View::make('settings.payslip.payslipEarn-create'); 
   }   

  public function store(Request $request){
    $DateSet = new pearnitems;
    //dd(Request::all());
    $DateSet->fill(Request::all());
    if($DateSet->save())
    {
      //Toastr::success('Successfully Created', 'Employee');
      return Redirect::to('pearnitem');
    }
}

  public function edit($Id){
    $pearn=pearnitems::find($Id);
    return View::make('settings.payslip.payslipEarn-edit')->with('pearn',$pearn);
  }

  public function update($Id){
    $stDate=pearnitems::find($Id);
    if($stDate){
        $stDate->fill(Request::all());
        if($stDate->save())
        {
          $stDate=pearnitems::find($Id);
//              Toastr::success('Successfully Updated', 'Employee');
          return Redirect::to('pearnitem');
        }
    }
  }

  public function destroy($eId)
   {
     // dd($eId);
     $delpEarnItem=pearnitems::find($eId);
     if($delpEarnItem!=null)
     {
         $delpEarnItem->delete();
     }
    
     return Redirect::to('pearnitem');
   }
}
