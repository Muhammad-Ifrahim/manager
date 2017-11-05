<?php

namespace App\Http\Controllers;


//use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Input;
use App\Models\Employee;
use Illuminate\Support\Facades\Request;

use View;
//use Request;
use Session;
use Validator;
use Redirect;

class EmployeeController extends Controller
{
   public function __invoke(){

   }

   public function index(){
    $bId = Session::get('bId');
	$employees=Employee::where('bId', $bId)->get();
	return View::make('employee.employee-view')->with('employees',$employees);
   }

   public function create(){
      return View::make('employee.employee-create');         //Return and Show the Add View
   }   

   public function store(Request $request){
    // validations of the Input 
    $validator = Validator::make(Request::all(), [
      'Name'  => 'required|max:255',    
    ]);
    $name = Request::input('name');
    //echo $request;
    echo $name;
    if ($validator->fails()) {
      return redirect('employee/create')->withInput()->withErrors($validator);
    }
    else{
          $Employee = new Employee;
          $Employee->fill(Request::all());
          if($Employee->save()){
          }
          //Toastr::success('Successfully Created', 'Employee');
          return redirect('employee');
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
     $validator=Validator::make(Request::all(),$validationRules);

      if ($validator->fails()) {
        return redirect('employee/' . $Id . '/edit')->withInput()->withErrors($validator);
      }
      else{
          $employee=Employee::find($Id);
          //echo 'else'.$Id. $employee;
          if($employee){
               $employee->fill(Request::all());
              if($employee->save())
              {
                    $employee=Employee::find($Id);
                    //Toastr::success('Successfully Updated', 'Employee');
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
