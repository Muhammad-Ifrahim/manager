<?php

namespace App\Http\Controllers;
use App\Models\PayslipReport;
use App\Models\Business;
use App\Models\Payslips;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

use Config;
use View;
use Session;
use Request;
use Validator;
use Redirect;
use PDF;

class EarnReportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){
    //To get value from shared variable (AppServiceProvider)
    $user = Config::get('userU');
    $bid = Session::get('bId');

    if($user->employee>0)//+++++++++++++ Change condition
    {
      $busid = Session::get('bId');
      return View::make('reports.payslips.pEarnSummary-View');
    }
    else
    {
      return View::make('errors.notAllowed-view');
    }
  }

  public function printReport(){
       dd('Got it');
       $busid = Session::get('bId');
       $pslips = Payslips::where('bId',$busid)->get();
       $busName = Business::where('bId',$busid)->get();
       $pdf = new PDF();
       $pdf=PDF::loadView('reports.payslips.pEarnSummary-Pdf',['pslips'=>$pslips, 
        'busName'=>$busName->name])
       ->setPaper('A4');
       return  $pdf->stream('pEarnSummary.pdf',array('Attachment'=>0));
    }

  public function create(){
       $busid = Session::get('bId');
       //To get all info for Report
       $pslips = Payslips::where('bId',$busid)->get();
       //To get Business Name
       $busName = Business::where('bId',$busid)->get();
       //To get From and To Dates 
       $pslipRep = PayslipReport::where('id',1)->get();//Passed hardocded id
       
       /*return View::make('reports.payslips.pEarnSummary-Pdf')->with(['pslipRep'=>$pslipRep,
        'pslips'=>$pslips, 'busName'=>$busName[0]->name]);*/

       $pdf = new PDF();
       $pdf=PDF::loadView('reports.payslips.pEarnSummary-Pdf',['pslipRep'=>$pslipRep,
        'pslips'=>$pslips, 'busName'=>$busName[0]->name])
       ->setPaper('A4');
       return  $pdf->stream('pEarnSummary.pdf',array('Attachment'=>0));                                                                                                                                            
       return View::make('reports.payslips.pEarnSummary-Create');
  }   

  public function store(Request $request){
    $bid = Session::get('bId');

    $validator = Validator::make(Request::all(), [
      //  'From'  => 'required',    
      //  'To'  => 'required',    
    ]);
    
    echo $validator->fails();

    if ($validator->fails()) {
      return redirect('EarnReport/create')->withInput()->withErrors($validator);
    }
    else{
        $earnReport = new EarnReport;
        $earnReport->fill(Request::all());
        $earnReport->bId=$bid;
        if($earnReport->save()){
        } 
        return Redirect::to('EarnReport');
    }
  }

  public function edit($Id){
    $employee=Employee::find($Id);
    return View::make('employee.employee-edit')->with('employee',$employee);
  }

   public function update($Id){
    $bid = Session::get('bId');
     $validationRules=array(
    'Name'  => 'required|max:255',
     );
     //dd(Request::all());

    $chkVal = array();
    $chkVal = Request::has('checkValue');

    if($chkVal==null)
    {
     // Request::set
    }

     $validator=Validator::make(Request::all(),$validationRules);

     if ($validator->fails()) {
      return redirect('employee/' . $Id . '/edit')->withInput()->withErrors($validator);
     }
      else{
          $employee=Employee::find($Id);
          if($employee){
              $employee->fill(Request::all());
              $employee->bId=$bid;
              echo "ok-tk";
              //dd($employee);
      //        dd(Request::all());

              if($employee->save())
              {
                $employee=Employee::find($Id);
                //dd($employee);
//              Toastr::success('Successfully Updated', 'Employee');
                return Redirect::to('employee');
              }
          }
      }
   }

   public function show(){
       
   }

   public function destroy($Id)
   {
     $delEmployee=Employee::find($Id);
     if($delEmployee!=null)
     {
         $delEmployee->delete();
     }
    
     return Redirect::to('employee');
   }
}