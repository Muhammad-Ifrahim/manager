<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;

use App\Models\User;
use App\Models\Business;
use DB;
use View;
use Request;
use Validator;
use Session;
use Redirect;

class RegController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    | I have overriden laravel registration
    | Default Registeration is not used because it logs in newly created user
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        echo 'constructor';
        $this->middleware('auth');
    }

    public function index(){
    }

    public function create(){
        return View::make('users.register');         //Return and Show the Add View
    }

  public function store(Request $request){
    $validator = Validator::make(Request::all(), [
        'name' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6', 
    ]);

    if ($validator->fails()) {
        echo 'Fails'; //dd($validator);
        return redirect('user/create')->withInput()->withErrors($validator);
    }
    else{
        $busId = Business::find(DB::table('businesses')->max('bId'));
        $User = new User;
        $pass = Request::input('password');
        $pass = bcrypt($pass);
        Request::merge(['bId'=> $busId->bId]);
        Request::merge(['password'=> $pass]);
        $User->fill(Request::all());
        if($User->save()){
        }
        echo 'Right';
        return Redirect::to('customize');
    }
  }
/*
  public function edit($Id){
    $employee=Employee::find($Id);
    return View::make('employee.employee-edit')->with('employee',$employee);
  }
*/
/*
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

  */
   public function show(){
       
   }
/*
   public function destroy($Id)
   {
     $delEmployee=Employee::find($Id);
     if($delEmployee!=null)
     {
         $delEmployee->delete();
     }
    
     return Redirect::to('employee');
   }*/
}