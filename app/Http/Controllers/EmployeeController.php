<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Models\Employee;

use View;
use Session;
use Request;
use Validator;
use Redirect;

class EmployeeController extends Controller
{
   public function __invoke(){

   }
   public function index($bId){
		$employees=Employee::where('bId', $bId)->get();
		return View::make('employee.employee-view')->with('employees',$employees);
   }

   public function create($bId){
      return View::make('employee.employee-create');         //Return and Show the Add View
   }   

  public function store(Request $request, $bId){
    // validations of the Input 
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
          //Toastr::success('Successfully Created', 'Employee');
          return redirect('/file/'.$bId.'/employee');
    }
  }

  public function edit($bId, $Id){
    $employee=Employee::find($Id);
    return View::make('employee.employee-edit')->with('employee',$employee);  
   }

   public function update($bId, $Id){
    echo "Updaterr";
     $validationRules=array(
    'Name'  => 'required|max:255',
     );
     $validator=Validator::make(Request::all(),$validationRules);

      if ($validator->fails()) {
        return redirect('/file/'. $bId.'/employee/' . $Id . '/edit')->withInput()->withErrors($validator);
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
                    return Redirect::to('/file/'.$bId.'/employee');
              }
          }
      }
   }
   public function show(){
       
   }

  function som($bId)
  {
    //echo $bId;
    $employees=Employee::all();
    return View::make('employee.employee-view')->with('employees',$employees);
  }

   public function destroy($bId, $Id)
   {
     $delEmployee=Employee::find($Id);
     if($delEmployee!=null)
     {
         $delEmployee->delete();
     }
    
     return Redirect::to('/file/'.$bId.'/employee');
   }
}
