<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Models\Payslips;

use View;
use Validator;
use Request;
use Session;
use Redirect;

class PayslipController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
   
   public function index(){
    return View::make('settings.payslip.payslip-view'); 
   }

   public function create(){
    return View::make('settings.payslip.payslip-create'); 
   }   

  public function store(Request $request){
    $validator = Validator::make(Request::all(), [
      'name'  => 'required|max:255',    
    ]);

    if ($validator->fails()) {
      return redirect('pcontributeitem/create')->withInput()->withErrors($validator);
    }
    else{
        $pContributeItem = new Payslips;
        $pContributeItem->fill(Request::all());
        if($pContributeItem->save()){
        } 
        return Redirect::to('pearnitem');
    }
  }

  public function edit($Id){
    $pcont=Payslips::find($Id);
    return View::make('settings.payslip.payslipContribute-edit')->with('pcont',$pcont);
  }

  public function update($Id){
    $pContr = Payslips::find($Id);
    //dd(Request::all());
    if($pContr){
        $pContr->fill(Request::all());
        if($pContr->save())
        {
          $pContr=Payslips::find($Id);
          
//        Toastr::success('Successfully Updated', 'Employee');
          return Redirect::to('pearnitem');
        }
    }
  }

  public function destroy($eId)
   {
     // dd($eId);
     $delpEarnItem=Payslips::find($eId);
     if($delpEarnItem!=null)
     {
         $delpEarnItem->delete();
     }
    
     return Redirect::to('pearnitem');
   }
}
