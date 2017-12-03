<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Models\Employee;
use App\Models\User;
//use Illuminate\Http\Request;
use Config;
use View;
use Session;
use Request;
use Validator;
use Redirect;

class EmployeeController extends Controller
{
  public function __construct()
  {
    $this->middleware('auth');
  }
  public function index(){
    //To get value from shared variable (AppServiceProvider)
    $user = Config::get('userU');
    $bid = Session::get('bId');

    if($user->employee>0)
    {

      $busid = Session::get('bId');
      $employees=Employee::where('bId',$busid)->get(); 
   

      return View::make('employee.employee-view')->with('employees',$employees);
    }
    else
    {
      return View::make('errors.notAllowed-view');
    }
  }

  public function create(){
    return View::make('employee.employee-create');         //Return and Show the Add View
  }   

  public function store(Request $request){
     $bid = Session::get('bId');
    //echo "Saver";

/*    $n = array();
    $n = $request;
    echo $n->Name;
    dd($request->all());*/

    //validations of the Input 
    $validator = Validator::make(Request::all(), [
        'Name'  => 'required|max:255',    
    ]);

    if ($validator->fails()) {
      return redirect('employee/create')->withInput()->withErrors($validator);
    }
    else{
        $Employee = new Employee;
        $Employee->fill(Request::all());
        $Employee->bId=$bid;
        if($Employee->save()){
        } 
        return Redirect::to('employee');
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