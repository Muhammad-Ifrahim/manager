<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Models\pDeductItems;

use View;
use Request;
use Session;
use Redirect;

class pDeductItemController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
   
   public function index(){
    return View::make('settings.payslip.payslipDeduct-view'); 
   }

   public function create(){
    return View::make('settings.payslip.payslipDeduct-create'); 
   }   

  public function store(Request $request){
    $DateSet = new pDeductItems;
    //dd($request);
    $DateSet->fill(Request::all());
    if($DateSet->save()){
    }
    //Toastr::success('Successfully Created', 'Employee');
    return Redirect::to('pearnitem');
  }

  public function edit($Id){
    $pdeduct=pDeductItems::find($Id);
    return View::make('settings.payslip.payslipDeduct-edit')->with('pdeduct',$pdeduct);
  }

  public function update($Id){
    $stDate=pDeductItems::find($Id);
    if($stDate){
        $stDate->fill(Request::all());
        if($stDate->save())
        {
          $stDate=pDeductItems::find($Id);
//              Toastr::success('Successfully Updated', 'Employee');
          return Redirect::to('pearnitem');
        }
    }
  }

  public function destroy($eId)
   {
     // dd($eId);
     $delpEarnItem=pDeductItems::find($eId);
     if($delpEarnItem!=null)
     {
         $delpEarnItem->delete();
     }
    
     return Redirect::to('pearnitem');
   }
}
