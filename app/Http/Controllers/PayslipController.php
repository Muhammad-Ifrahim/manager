<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use App\Models\Payslips;
use App\Models\PayslipsEarn;
use App\Models\PayslipsDeduct;
use App\Models\PayslipsContribute;
use View;
use Validator;
use Request;
use Session;
use Redirect;
use Toastr;
use Config;
use PDF;

class PayslipController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
   
   public function index()
   {
    $user = Config::get('userU');
    $bid = Session::get('bId');

    if ($user->payslips > 0) 
    {
      $payslip=Payslips::where('bId',$bid)->get();    
      return View::make('settings.payslip.payslip-view')->with('payslip',$payslip); 
    }
    else
    {
      return View::make('errors.notAllowed-view');
    }
   }

   public function create()
   {
    return View::make('settings.payslip.payslip-create'); 
   }   

  public function store(Request $request){

    $bid = Session::get('bId');         
    
    $payslip=new Payslips;
    $Input=Input::all();
    
    $payslip->Date=Input::get('date');
    $payslip->Employee=Input::get('Employee');
    $payslip->NetPay=Input::get('NetAmount');
    $payslip->Deduction=Input::get('deductamount');
    $payslip->GrossPay=Input::get('GrossPay');
    $payslip->Contribution=Input::get('ct');
    
    $payslip->bId=$bid;
   
     if ($payslip->save())
     {
        for ($Id=0; $Id <count($Input['EarnItem']) ; $Id++) 
        {         
          $PayslipsEarn =new PayslipsEarn;
          $PayslipsEarn->payEarnId=$payslip->payId;
          $PayslipsEarn->Earning=$Input['EarnItem'][$Id];
          $PayslipsEarn->Description=$Input['discription'][$Id];
          $PayslipsEarn->Quantity=$Input['qty'][$Id];
          $PayslipsEarn->Price=$Input['price'][$Id];
          $PayslipsEarn->Amount=$Input['amount'][$Id];
          $PayslipsEarn->save();
        }
        for ($Id=0; $Id <count($Input['DeductItem']) ; $Id++) { 
             $PayslipsDeduct = new PayslipsDeduct;
             $PayslipsDeduct->payId=$payslip->payId;
             $PayslipsDeduct->Deduction=$Input['DeductItem'][$Id];
             $PayslipsDeduct->Description=$Input['discription-deduction'][$Id];
             $PayslipsDeduct->Amount=$Input['amount-deduction'][$Id];
             $PayslipsDeduct->save();

        }
          for ($Id=0; $Id <count(($Input['ContributItem'])) ; $Id++) {
                $PayslipsContribute = new PayslipsContribute;
                $PayslipsContribute->payId=$payslip->payId;
                $PayslipsContribute->Contribution=$Input['ContributItem'][$Id];
                $PayslipsContribute->Description=$Input['discription-contribution'][$Id];
                $PayslipsContribute->Amount=$Input['amount-contribution'][$Id];
                $PayslipsContribute->save();
          }
        
      } 
         Toastr::success('Successfully Created', 'Payslip', ["positionClass" => "toast-top-right"]);
        return Redirect::to('payslip');
    
  }

  public function edit($Id){
    $payslip=Payslips::find($Id);
    $PayslipsEarn=Payslips::with('PayslipsEarnItem')->where('payId',$Id)->get();
    $PayslipsDeduct=Payslips::with('PayslipsDeductItem')->where('payId',$Id)->get();
    $PayslipsContribute=Payslips::with('PayslipsContributeItem')->where('payId',$Id)->get();
    return View::make('settings.payslip.payslip-edit')->with('PayslipsContribute',$PayslipsContribute)->with('PayslipsDeduct',$PayslipsDeduct)->with('PayslipsEarn',$PayslipsEarn)->with('payslip',$payslip);
  }

  public function update($Id){

    $bid = Session::get('bId');         
    $payslip=Payslips::find($Id);

    $payslip->PayslipsEarnItem()->delete();
    $payslip->PayslipsDeductItem()->delete();
    $payslip->PayslipsContributeItem()->delete();
    $Input=Input::all();
    $payslip->Date=Input::get('Date');
    $payslip->Employee=Input::get('Employee');
    $payslip->NetPay=Input::get('NetAmount');
    $payslip->Deduction=Input::get('deductamount');
    $payslip->GrossPay=Input::get('GrossPay');
    $payslip->Contribution=Input::get('ct');
    $payslip->bId=$bid;

     if ($payslip->save()) {

          // for ($Id=0; $Id <count($Input['EarnItem']) ; $Id++) {
             
          //       $PayslipsEarn =new PayslipsEarn;
          //       $PayslipsEarn->payEarnId=$payslip->payId;
          //       $PayslipsEarn->Earning=$Input['EarnItem'][$Id];
          //       $PayslipsEarn->Description=$Input['discription'][$Id];
          //       $PayslipsEarn->Quantity=$Input['qty'][$Id];
          //       $PayslipsEarn->Price=$Input['price'][$Id];
          //       $PayslipsEarn->Amount=$Input['amount'][$Id];
          //       $PayslipsEarn->save();
                   
          // }
          for ($Id=0; $Id <count($Input['DeductItem']) ; $Id++) { 
               $PayslipsDeduct = new PayslipsDeduct;
               $PayslipsDeduct->payId=$payslip->payId;
               $PayslipsDeduct->Deduction=$Input['DeductItem'][$Id];
               $PayslipsDeduct->Description=$Input['discription-deduction'][$Id];
               $PayslipsDeduct->Amount=$Input['amount-deduction'][$Id];
               $PayslipsDeduct->save();

          }
          for ($Id=0; $Id <count(($Input['ContributItem'])) ; $Id++) {
                $PayslipsContribute = new PayslipsContribute;
                $PayslipsContribute->payId=$payslip->payId;
                $PayslipsContribute->Contribution=$Input['ContributItem'][$Id];
                $PayslipsContribute->Description=$Input['discription-contribution'][$Id];
                $PayslipsContribute->Amount=$Input['amount-contribution'][$Id];
                $PayslipsContribute->save();
          }
        
      } 
         Toastr::success('Successfully Updated', 'Payslip', ["positionClass" => "toast-top-right"]);
        return Redirect::to('payslip');

  }

  public function destroy($Id)
   {

        $payslip=Payslips::find($Id);
        $payslip->PayslipsEarnItem()->delete();
        $payslip->PayslipsDeductItem()->delete();
        $payslip->PayslipsContributeItem()->delete();
        $payslip->delete();
        Toastr::success('Successfully Deleted', 'Payslips', ["positionClass" => "toast-top-right"]);
          return Redirect::to('payslip');
  }
  public function rint($Id)
  {    
    $payslip=Payslips::find($Id);
    $PayslipsEarn=Payslips::with('PayslipsEarnItem')->where('payId',$Id)->get();
    $PayslipsDeduct=Payslips::with('PayslipsDeductItem')->where('payId',$Id)->get();
    $pdf=new PDF();
    $pdf=PDF::loadView('settings.payslip.payslip-pdf',['payslip'=>$payslip,'PayslipsEarn'=>$PayslipsEarn,'PayslipsDeduct'=>$PayslipsDeduct])->setPaper('A4');
    return $pdf->stream('payslip.pdf',array('Attachment'=>0));

  }
}