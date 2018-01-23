<?php

namespace App\Http\Controllers;
use App\Models\PayslipReport;
use App\Models\Business;
use App\Models\Payslips;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Models\EarnReport;

use Config;
use View;
use Session;
use Request;
use Validator;
use Redirect;
use Toastr;
use PDF;

class EarnReportController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }

  public function index($rType)
  {
    //To get value from shared variable (AppServiceProvider)
    $user = Config::get('userU');
    $bid = Session::get('bId');

    if($user->employee>0)//+++++++++++++ Change condition
    {
      $busid = Session::get('bId');
      if ($rType=='sum') 
      {
        return View::make('reports.payslips.pEarnSummary-View');
      }
      else if ($rType=='con') 
      {
        return View::make('reports.payslips.pConSummary-View');
      }
      else if ($rType=='ded') 
      {
        return View::make('reports.payslips.pDedSummary-View');
      }
    }
    else
    {
      return View::make('errors.notAllowed-view');
    }
  }

  public function printSummaryReport($repId)
  {
    $busid = Session::get('bId');
    $from = 0;
    $to = 0;
    //To get Business Name
    $busName = Business::where('bId',$busid)->get();
    
    //To get From and To Dates 
    $pslipRep = PayslipReport::where('id',$repId)->get();
    foreach ($pslipRep as $key => $value) 
    {
      $from = $value->from;
      $to = $value->to;
    }
   
    $pslips = Payslips::whereBetween('Date', [$from, $to])->get();

    $empName = array();
    $earnName = array();
    $summaryArr = array();
    $tempArr = array();

    foreach ($pslips as $key => $value) 
    {
      if (array_key_exists($value->user->name,$tempArr)) 
      {
        $summaryArr = $tempArr[$value->user->name];
        
        if($value->GrossPay!=null)
        {
          $summaryArr[0]+=$value->GrossPay;
        }

        if($value->Deduction!=null)
        {
          $summaryArr[1]+=$value->Deduction;
        }

        if($value->Deduction!=null)
        {
          $summaryArr[2]+=$value->NetPay;
        }
        $tempArr[$value->user->name] = $summaryArr;
      }
      else
      {
//        echo $value->GrossPay.'--'. $value->Deduction.'--'. $value->NetPay;
        if ($value->GrossPay==null) 
        {
         $value->GrossPay = 0;  
        }
        if ($value->Deduction==null) 
        {
          $value->Deduction = 0;              
        }
        if ($value->NetPay==null) 
        {
          $value->NetPay = 0; 
        }

        $tempArr[$value->user->name] = array($value->GrossPay, $value->Deduction, $value->NetPay); 
      }
    }

    //Row wise sum

    $val = array();
    $rowSum = array();

    for($j=0;$j<sizeof(array_keys($tempArr));$j++)
    {
      $empArr = array_keys($tempArr);

      $kItem = $tempArr[$empArr[$j]];
      
      $sum = 0;
      
      for ($i=0; $i < sizeof($kItem); $i++) 
      {
        $sum += $kItem[$i];
      }
      $rowSum[$j]=$sum;
    }

     $pdf = new PDF();
     if(sizeof($pslips)>0)
     {
      $pdf=PDF::loadView('reports.payslips.payslipSummary-pdf',['pslipRep'=>$pslipRep,
      'pslips'=>$pslips, 'tempArr'=>$tempArr,'empName'=>$empName,
      'earnName'=> $earnName,'rowSum'=>$rowSum, 'busName'=>$busName[0]->name])->setPaper('A4');
        return  $pdf->stream('payslipSummary.pdf',array('Attachment'=>0));  
     }
     else
     {
      $pdf=PDF::loadView('errors.noRecord-view',['pslipRep'=>$pslipRep,
      'pslips'=>$pslips, 'busName'=>$busName[0]->name])->setPaper('A4');
        return  $pdf->stream('errors.noRecord-view.pdf',array('Attachment'=>0));  
     }
  }

  public function printDeductionReport($repId)
  {
       $busid = Session::get('bId');

       //To get Business Name
       $busName = Business::where('bId',$busid)->get();
       //To get From and To Dates 
       $pslipRep = PayslipReport::where('id',$repId)->get();
        foreach ($pslipRep as $key => $value) 
        {
          $from = $value->from;
          $to = $value->to;
        }
        //echo $from.'-'.$to;
        //$pslips = Payslips::all();
        //dd('stop');   
        $pslips = Payslips::whereBetween('Date', [$from, $to])->get();

        $empName = array();
        $earnName = array();
        $dedArr = array();
        $tempArr = array();

        $a = array();
        
        for ($i=0; $i < sizeof($pslips); $i++) 
        {
          for($j=0; $j < sizeof($pslips[$i]->PayslipsDeductItem); $j++) 
          {

            if ($pslips[$i]->PayslipsDeductItem[$j]->Deduct!=null) 
            {
              if($pslips[$i]->Deduction!=0)
              {
                if (array_key_exists($pslips[$i]->User->name, $tempArr)!=null)
                {
                  $a = $tempArr[$pslips[$i]->User->name];
                  if(array_key_exists($pslips[$i]->PayslipsDeductItem[$j]->Deduct->name, $a)!=null)
                  {
                    $a1 = $a[$pslips[$i]->PayslipsDeductItem[$j]->Deduct->name];
                    $tempSum = 0;

                    array_push($a1, $pslips[$i]->PayslipsDeductItem[$j]->Amount);
                    for ($k=0; $k < sizeof($a1); $k++) 
                    { 
                        $tempSum = $tempSum + $a1[$k] ;
                    }

                    $a1 = [$tempSum];
                    //print_r($a1);
                    $a[$pslips[$i]->PayslipsDeductItem[$j]->Deduct->name] = $a1;
                    $tempArr[$pslips[$i]->User->name]=$a;
                  }
                  else
                  {
                    $temp1 = $tempArr[$pslips[$i]->User->name];
                    $temp1[$pslips[$i]->PayslipsDeductItem[$j]->Deduct->name] = array(
                         $pslips[$i]->PayslipsDeductItem[$j]->Amount);
                    $tempArr[$pslips[$i]->User->name] = $temp1;
                  }
                }
                else
                  {
                   $tempArr[$pslips[$i]->User->name] = array(
                   $pslips[$i]->PayslipsDeductItem[$j]->Deduct->name=>array(
                   $pslips[$i]->PayslipsDeductItem[$j]->Amount)); 
                  }

                array_push($earnName, $pslips[$i]->PayslipsDeductItem[$j]->Deduct->name);
                $a = array();
                $tot = 0;

                if (array_key_exists($pslips[$i]->PayslipsDeductItem[$j]->Deduct->name, $dedArr)!=null)
                {
                    $a = $dedArr[$pslips[$i]->PayslipsDeductItem[$j]->Deduct->name];
                    array_push($a, $pslips[$i]->PayslipsDeductItem[$j]->Amount);
                    $dedArr[$pslips[$i]->PayslipsDeductItem[$j]->Deduct->name] = $a;
                }
                else
                {
                  $dedArr[$pslips[$i]->PayslipsDeductItem[$j]->Deduct->name] = array($pslips[$i]->PayslipsDeductItem[$j]->Amount);
                }         
              }       
            }
          }
        }

      //Calculate row wise sum
        $sumRowArr = array();
        $totalSumRow = 0;
        
        for ($j=0;$j<sizeof(array_keys($tempArr));$j++)
        { 
         $kArr = array_keys($tempArr);
        
         for ($i=0; $i < sizeof($kArr); $i++) 
         { 
            $k1Arr = $tempArr[$kArr[$i]]; 
            $k2Arr = array_keys($k1Arr);
            $sumRow = 0;

            for ($j=0; $j < sizeof($k2Arr); $j++) 
            { 
              $valArr = $k1Arr[$k2Arr[$j]];
              $sumRow = $sumRow + $valArr[0];
            }
            array_push($sumRowArr, $sumRow);
            $totalSumRow += $sumRow;
          }
        }

      //Column wise sum

      $val = array();
      $colSum = array();

      for($j=0;$j<sizeof(array_keys($tempArr));$j++)
      {
        $empArr = array_keys($tempArr);

        $kItem = $tempArr[$empArr[$j]];
        $kSubItem = array_keys($kItem);
        
        $sum = 0;
        
        for ($i=0; $i < sizeof($kItem); $i++) 
        {
          $amont = $kItem[$kSubItem[$i]];

          if (array_key_exists($kSubItem[$i], $colSum)!=null) 
          {
            $tmp = $colSum[$kSubItem[$i]];
            $tmp = $amont[0] + $tmp;
            $colSum[$kSubItem[$i]]=$tmp;
          }
          else
          {
            $colSum[$kSubItem[$i]] = $amont[0]; 
          }
        }
      }

       $pdf = new PDF();
       if(sizeof($pslips)>0)
       {
/*        return View::make('reports.payslips.pDeductSummary-Pdf')->with(['pslipRep'=>$pslipRep,
        'pslips'=>$pslips, 'dedArr'=>$dedArr,'tempArr'=>$tempArr,'empName'=>$empName,
        'sumRowArr'=>$sumRowArr, 'totalSumRow'=>$totalSumRow,'colSum'=>$colSum,'earnName'=> $earnName,
        'busName'=>$busName[0]->name]);*/
          $pdf=PDF::loadView('reports.payslips.pDeductSummary-Pdf',['pslipRep'=>$pslipRep,
        'pslips'=>$pslips, 'dedArr'=>$dedArr,'tempArr'=>$tempArr,'empName'=>$empName,
        'sumRowArr'=>$sumRowArr, 'totalSumRow'=>$totalSumRow,'colSum'=>$colSum,'earnName'=> $earnName,
        'busName'=>$busName[0]->name])->setPaper('A4');
          return  $pdf->stream('pDeductSummary.pdf',array('Attachment'=>0));    
       }  
       else
       {
        $pdf=PDF::loadView('errors.noRecord-view',['pslipRep'=>$pslipRep,
        'pslips'=>$pslips, 'busName'=>$busName[0]->name])->setPaper('A4');
          return  $pdf->stream('errors.noRecord-view.pdf',array('Attachment'=>0));  
       }    
  }

  public function printContributeReport($repId)
  {
    $busid = Session::get('bId');

   //To get Business Name
    $busName = Business::where('bId',$busid)->get();

   //To get From and To Dates 
    $pslipRep = PayslipReport::where('id',$repId)->get();
    foreach ($pslipRep as $key => $value) 
    {
      $from = $value->from;
      $to = $value->to;
    }
   
    $pslips = Payslips::whereBetween('Date', [$from, $to])->get();

    $empName = array();
    $earnName = array();
    $dedArr = array();
    $tempArr = array();

    $a = array();
    for ($i=0; $i < sizeof($pslips); $i++) 
    {
      for($j=0; $j < sizeof($pslips[$i]->PayslipsContributeItem); $j++) 
      {
        if ($pslips[$i]->PayslipsContributeItem[$j]->Contribute!=null) 
        {
          if($pslips[$i]->Deduction!=0)
          {
            if (array_key_exists($pslips[$i]->User->name, $tempArr)!=null)
            {
              $a = $tempArr[$pslips[$i]->User->name];
              if(array_key_exists($pslips[$i]->PayslipsContributeItem[$j]->Contribute->name, $a)!=null)
              {
                $a1 = $a[$pslips[$i]->PayslipsContributeItem[$j]->Contribute->name];
                $tempSum = 0;

                array_push($a1, $pslips[$i]->PayslipsContributeItem[$j]->Amount);
                for ($k=0; $k < sizeof($a1); $k++) 
                { 
                    $tempSum = $tempSum + $a1[$k] ;
                }

                $a1 = [$tempSum];
                //print_r($a1);
                $a[$pslips[$i]->PayslipsContributeItem[$j]->Contribute->name] = $a1;
                $tempArr[$pslips[$i]->User->name]=$a;
              }
              else
              {
                $temp1 = $tempArr[$pslips[$i]->User->name];
                $temp1[$pslips[$i]->PayslipsContributeItem[$j]->Contribute->name] = array(
                     $pslips[$i]->PayslipsContributeItem[$j]->Amount);
                $tempArr[$pslips[$i]->User->name] = $temp1;
              }
            }
            else
              {
               $tempArr[$pslips[$i]->User->name] = array(
               $pslips[$i]->PayslipsContributeItem[$j]->Contribute->name=>array(
               $pslips[$i]->PayslipsContributeItem[$j]->Amount)); 
              }

            array_push($earnName, $pslips[$i]->PayslipsContributeItem[$j]->Contribute->name);
            $a = array();
            $tot = 0;

            if (array_key_exists($pslips[$i]->PayslipsContributeItem[$j]->Contribute->name, $dedArr)!=null)
            {
                $a = $dedArr[$pslips[$i]->PayslipsContributeItem[$j]->Contribute->name];
                array_push($a, $pslips[$i]->PayslipsContributeItem[$j]->Amount);
                $dedArr[$pslips[$i]->PayslipsContributeItem[$j]->Contribute->name] = $a;
            }
            else
            {
              $dedArr[$pslips[$i]->PayslipsContributeItem[$j]->Contribute->name] = array($pslips[$i]->PayslipsContributeItem[$j]->Amount);
            }         
          }       
        }
      }
    }

    $sumRowArr = array();
    $totalSumRow = 0;
    
    for ($j=0;$j<sizeof(array_keys($tempArr));$j++)
    { 
     $kArr = array_keys($tempArr);
    
     for ($i=0; $i < sizeof($kArr); $i++) 
     { 
        $k1Arr = $tempArr[$kArr[$i]]; 
        $k2Arr = array_keys($k1Arr);
        $sumRow = 0;

        for ($j=0; $j < sizeof($k2Arr); $j++) 
        { 
          $valArr = $k1Arr[$k2Arr[$j]];
          $sumRow = $sumRow + $valArr[0];
        }
        array_push($sumRowArr, $sumRow);
        $totalSumRow += $sumRow;
      }
    }

  //Column wise sum

  $val = array();
  $colSum = array();

  for($j=0;$j<sizeof(array_keys($tempArr));$j++)
  {
    $empArr = array_keys($tempArr);

    $kItem = $tempArr[$empArr[$j]];
    $kSubItem = array_keys($kItem);
    
    $sum = 0;
    
    for ($i=0; $i < sizeof($kItem); $i++) 
    {
      $amont = $kItem[$kSubItem[$i]];

      if (array_key_exists($kSubItem[$i], $colSum)!=null) 
      {
        $tmp = $colSum[$kSubItem[$i]];
        $tmp = $amont[0] + $tmp;
        $colSum[$kSubItem[$i]]=$tmp;
      }
      else
      {
        $colSum[$kSubItem[$i]] = $amont[0]; 
      }
    }
    }

     $pdf = new PDF();
     if(sizeof($pslips)>0)
     {
     /* return View::make('reports.payslips.pDeductSummary-Pdf')->with(['pslipRep'=>$pslipRep,
      'pslips'=>$pslips, 'dedArr'=>$dedArr,'tempArr'=>$tempArr,'empName'=>$empName,
      'sumRowArr'=>$sumRowArr, 'totalSumRow'=>$totalSumRow,'colSum'=>$colSum,'earnName'=> $earnName,
      'busName'=>$busName[0]->name]);*/
      $pdf=PDF::loadView('reports.payslips.pContribSummary-Pdf',['pslipRep'=>$pslipRep,
      'pslips'=>$pslips, 'dedArr'=>$dedArr,'tempArr'=>$tempArr,'empName'=>$empName,
      'sumRowArr'=>$sumRowArr, 'totalSumRow'=>$totalSumRow,'colSum'=>$colSum,'earnName'=> $earnName,
      'busName'=>$busName[0]->name])->setPaper('A4');
        return  $pdf->stream('payContributeSummary.pdf',array('Attachment'=>0));  
     }                                            
     else
     {
      $pdf=PDF::loadView('errors.noRecord-view',['pslipRep'=>$pslipRep,
      'pslips'=>$pslips, 'busName'=>$busName[0]->name])->setPaper('A4');
        return  $pdf->stream('errors.noRecord-view.pdf',array('Attachment'=>0));  
     } 
  }

  public function create($rTyper)
  {
    if ($rTyper=='sum') 
      {
        return View::make('reports.payslips.pEarnSummary-Create');
      }
      else if ($rTyper=='con') 
      {
        return View::make('reports.payslips.pConSummary-Create');
      }
      else if ($rTyper=='ded') 
      {
        return View::make('reports.payslips.pDedSummary-Create');
      }
  }   

  public function store(Request $request, $type)
  {
    $bid = Session::get('bId');
    $validator = Validator::make(Request::all(), [
        'from'  => 'required',
        'to'  => 'required',
    ]);    

    $n = array();
    $n = Request::all();
    
    if ($validator->fails())
    {
      return redirect('EarnReport/'.$type.'/create')->withInput()->withErrors($validator);
    }
    if($this->doValidate($n['from'], $n['to']))
    {
      Session::flash('message', "From date must be lesser than To date");
      return redirect('EarnReport/'.$type.'/create')->withInput();   
    }
    else{
          $earnReport = new PayslipReport;
          $earnReport->fill(Request::all());
          $earnReport->bId=$bid;
          
          if($earnReport->save())
          {
            Toastr::success('Successfully Created', 'Report');
            return Redirect::to('EarnReport/'.$type);
          }
          else
          {
            Toastr::success('Unable to Create', 'Report');
          }
    }
  }

  public function doValidate($fromD, $toD)
  {
    if($fromD<$toD)
    {
      return false;
    }
    else
    {
      return true;
    }

    ///(19|20)\d\d[- \/.](0[1-9]|1[012])[- \/.](0[1-9]|[12][0-9]|3[01])/
  }

  public function edit($Id)
  {
     $allVar =explode('-', $Id) ;
     $rId = $allVar[0];
     $typ = $allVar[1];

     $prep=PayslipReport::find($rId);    
     
     if($typ == 'sum')
     {
      $page = 'pEarnSummary-Edit';
     }
     else if($typ == 'con')
     {
      $page = 'pConSummary-Edit';
     }
     else if($typ == 'ded')
     {
      $page = 'pDedSummary-Edit';
     }
     return View::make('reports.payslips.'.$page)->with('pReport',$prep);
  }

   public function update($Id)
   {
     $allVar =explode('-', $Id) ;
     $rId = $allVar[0];
     $typ = $allVar[1];

     $bid = Session::get('bId');
     
    $validator = Validator::make(Request::all(), [
        'from'  => 'required',
        'to'  => 'required',
    ]);    

    $n = array();
    $n = Request::all();

    if ($validator->fails())
    {
      return redirect('EarnReport/' . $rId . '-'.$typ. '/edit')->withInput()
      ->withErrors($validator);
    }
    if($this->doValidate($n['from'], $n['to']))
    {
      Session::flash('message', "From date must be lesser than To date");
      return redirect('EarnReport/' . $rId . '-'.$typ. '/edit')->withInput();
    }
    if ($validator->fails()) 
    {
      return redirect('EarnReport/'.$rId.'-'.$typ. '/edit')->withInput()->withErrors($validator);
    }
    else
    {
      $pRep=PayslipReport::find($rId);
      
      if($pRep)
      {
          $pRep->fill(Request::all());
          $pRep->bId=$bid;

          if($pRep->save())
          {
            $pRep=PayslipReport::find($rId);
            Toastr::success('Successfully Updated', 'Report');
            return Redirect::to('EarnReport/'.$typ);
          }
          else
          {
            Toastr::success('Unable to Update', 'Report');
            return Redirect::to('EarnReport/'.$typ);
          }
      }
    }
   }

   public function destroy($Id)
   {
     $allVar =explode('-', $Id) ;
     $rId = $allVar[0];
     $typ = $allVar[1];
     $delEmployee=PayslipReport::find($rId);
     if($delEmployee!=null)
     {
         $delEmployee->delete();
     }
     return Redirect::to('EarnReport/'.$typ);
   }
}