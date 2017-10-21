<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Models\Employee;

use View;
use Session;
use Request;
use Validator;

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
               // Here when it successfully
              }
             return View::make('employee.employee-view');
        }
	}
}
