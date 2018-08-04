<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Models\pContributeItems;
use App\Models\expenseAccounts;

use View;
use Validator;
use Request;
use Session;
use Redirect;

class pContributeitemsController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
   
   public function index(){
    $titl = expenseAccounts::find(1)->pContributeItems()->title;
    dd($titl);
    return View::make('settings.payslip.payslipContribute-view'); 
   }

   public function create(){
    return View::make('settings.payslip.payslipContribute-create'); 
   }   

  public function store(Request $request){
/*    echo 'Storer';
    $n = array();
    $n = $request;
    dd(Request::all());*/

    $validator = Validator::make(Request::all(), [
      'name'  => 'required|max:255',    
    ]);

    if ($validator->fails()) {
      return redirect('pcontributeitem/create')->withInput()->withErrors($validator);
    }
    else{
        $pContributeItem = new pContributeItems;
        $pContributeItem->fill(Request::all());
        if($pContributeItem->save()){
        } 
        return Redirect::to('pearnitem');
    }
  }

  public function edit($Id){
    $pcont=pContributeItems::find($Id);
    return View::make('settings.payslip.payslipContribute-edit')->with('pcont',$pcont);
  }

  public function update($Id){
    $pContr = pContributeItems::find($Id);
    //dd(Request::all());
    if($pContr){
        $pContr->fill(Request::all());
        if($pContr->save())
        {
          $pContr=pContributeItems::find($Id);
          
//        Toastr::success('Successfully Updated', 'Employee');
          return Redirect::to('pearnitem');
        }
    }
  }

  public function destroy($eId)
   {
     // dd($eId);
     $delpEarnItem=pContributeItems::find($eId);
     if($delpEarnItem!=null)
     {
         $delpEarnItem->delete();
     }
    
     return Redirect::to('pearnitem');
   }
}
