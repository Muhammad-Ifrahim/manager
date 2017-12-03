<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Models\Business;
use App\Models\User;
use App\Models\Role;
use DB;
use View;
use Request;
use Validator;
use Session;
use Redirect;
use Config;
use Toastr;

class RegController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    | I have overriden laravel registration
    | Default Registeration is not used because it logs in newly created user
    | This controller handles the registration of new users as well as their
    | validation and creation. 
    */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
      $currUser = Config::get('userU');
      if($currUser->userType=='Admin' || $currUser->userType=='Manager')
      {
        return View::make('users.user-view');
      }
      else
      {
        return View::make('errors.notAllowed-view');
      }
    }

    public function create()
    {
      $currUser = Config::get('userU');
      if($currUser->userType=='Admin' || $currUser->userType=='Manager')
      {
        return View::make('users.register');
      }
      else
      {
        return View::make('errors.notAllowed-view');
      }
    }

  public function store(Request $request){
    $validator = Validator::make(Request::all(), [
        'name' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
        'password' => 'required|min:6|confirmed',
        'password_confirmation' => 'required|min:6', 
    ]);

    if ($validator->fails()) {
        return redirect('user/create')->withInput()->withErrors($validator);
    }
    else{
        $User = new User;
        $pass = Request::input('password');
        $pass = bcrypt($pass);
        Request::merge(['password'=> $pass]);
        
        $currUser = Config::get('userU');
        if($currUser->userType=='Admin')
        {
          Request::merge(['userType'=> 'Manager']);
          $busId = Business::find(DB::table('businesses')->max('bId'));
          Request::merge(['bId'=> $busId->bId]);
        }
        else if ($currUser->userType=='Manager')
        {
          $b = Session::get('bId');
          $busId = Business::where('bId', $b)->get();
          if(sizeof($busId)>0)
          {
            Request::merge(['bId'=> $busId[0]->bId]);
          }
        }

        $User->fill(Request::all());
        if($User->save()){
        }       
        return Redirect::to('customize');
    }
  }

  public function edit($Id)
  {
    $userEdit=User::find($Id);
    return View::make('users.user-edit')->with('userEdit',$userEdit);
  }

  public function update($Id)
  {
      $validator = Validator::make(Request::all(), [
        'name' => 'required|max:20',
        'email' => 'required|email|max:255|unique:users',
     ]);

     if ($validator->fails()) {
      return redirect('user/' . $Id . '/edit')->withInput()->withErrors($validator);
     }
     else{
          $upUsr = User::find($Id);
          if($upUsr)
          {
              $upUsr->fill(Request::all());
              if($upUsr->save())
              {
                $sRole=Role::find($Id);
                Toastr::success('Successfully Updated', 'User');
                return Redirect::to('user');
              }
          }
      }
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