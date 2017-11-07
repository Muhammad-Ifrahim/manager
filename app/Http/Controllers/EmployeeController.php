<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Models\Employee;
//use Illuminate\Http\Request;

use View;
use Session;
use Request;
use Validator;
use Redirect;

class EmployeeController extends Controller
{

   public function __invoke(){

   }
   public function index(){
		$employees=Employee::all(); 
		return View::make('employee.employee-view')->with('employees',$employees);
   }

   public function create(){
    return View::make('employee.employee-create');         //Return and Show the Add View
   }   

  public function store(Request $request){
    echo "Saver";

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
   public function setBid(){
    // dd('we are here');
    echo "ok";
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