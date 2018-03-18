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
use Exception;
//use Illuminate\Http\Request;
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

    public function index()
    {
      $currUser = Config::get('userU');
      $busId = Session::get('bId');

      if($currUser->userType=='Admin')
      {            
        $allAUser = User::with('business')->where('userType','<>','Admin')->get();
        //dd($allAUser);
        return View::make('users.user-view')->with('allUser',$allAUser);
      }
      else if($currUser->userType=='Manager')
      {
        $allUser = User::where('bId', $busId)->where('userType','<>','Manager')->get();
         //dd($allUser);
        return View::make('users.user-view')->with('allUser',$allUser);        
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

  public function store(Request $request)
  {
    $Uid = Request::input('Uid');
    if($Uid==0)
    {
      $validator = Validator::make(Request::all(), [
          'name' => 'required|max:20',
          'email' => 'required|email|max:255',//|unique:users
          'password' => 'required|min:6|confirmed',
          'password_confirmation' => 'required|min:6', 
      ]);

      if ($validator->fails())
      {
          return redirect('user/create')->withInput()->withErrors($validator);
      }
      else
      {
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
            $uType = Request::input('userType');
    
            if ($uType!=null and $uType!='') 
            {
              $typeU = Role::find($uType);
              Request::merge(['userType'=> $typeU->role]);
            }

            if(sizeof($busId)>0)
            {
              Request::merge(['bId'=> $busId[0]->bId]);
            }
          }
          $fUsername = Request::input('email');
          //$existUname = User::where('username','=',);  
          Request::merge(['username'=> $fUsername]);   
          if($this->saveUser($fUsername)=='true')
            {
              return Redirect::to('customize');
            }
      }
    }
    else
    {
      $linkedManagers = User::find($Uid);
      $currUser = Config::get('userU');
      if($currUser->userType=='Admin')
      {
        Request::merge(['userType'=> 'Manager']);
        $busId = Business::find(DB::table('businesses')->max('bId'));
        $linkedManagers->bId = $busId->bId;
      }
      $this->insertUser($linkedManagers);
      return Redirect::to('business');
    }
  }

  public function insertUser($linkedManagers)
  {
      try
      {
        if($linkedManagers->username==null)
        {
          $linkedManagers->username = $linkedManagers->email;
        }
        DB::table('users')->insert([
          ['name' => $linkedManagers->name,
          'email' => $linkedManagers->email,
          'username' => $linkedManagers->username,//Same as email
          'password' => $linkedManagers->password,
          'created_at' => $linkedManagers->created_at,
          'updated_at' => $linkedManagers->updated_at,
          'inventory' => $linkedManagers->inventory,
          'customer' => $linkedManagers->customer,
          'accounts' => $linkedManagers->accounts,
          'employee' => $linkedManagers->employee,
          'SalesQuote' => $linkedManagers->SalesQuote,
          'SalesOrder' => $linkedManagers->SalesOrder,
          'SalesInvoice' => $linkedManagers->SalesInvoice,
          'DeliveryNotes'=>$linkedManagers->DeliveryNotes, 
          'Supplier'=>$linkedManagers->Supplier, 
          'PurchaseOrder'=>$linkedManagers->PurchaseOrder, 
          'PurchaseInvoice'=>$linkedManagers->PurchaseInvoice,
          'InventoryTransfer'=>$linkedManagers->InventoryTransfer, 
          'FixedAsset'=>$linkedManagers->FixedAsset,
          'customize'=>$linkedManagers->customize,
          'userType'=>$linkedManagers->userType,
          'payslips'=>$linkedManagers->payslips,
          'bId'=>$linkedManagers->bId]
          ]);
      }
      catch(Exception $ex)
      { 
        if (strpos($ex, 'Integrity constraint violation') == true)
        {
          $newUname = $this->genUserName($linkedManagers->email);
          $linkedManagers->username= $newUname;
          $this->insertUser($linkedManagers);
        }
      }
  }

  public function saveUser($prevUname)
  {
    try 
    {
      $User = new User;
      $User->fill(Request::all());
      return $User->save();
    } 
    catch(Exception $ex)
    { 
      if (strpos($ex, 'Integrity constraint violation') == true)
      {
        $newUname = $this->genUserName($prevUname);
        Request::merge(['username'=> $newUname]);
        saveUser($newUname);
      }
    }
  }

  public function genUserName($uname)
  {
    $num = rand(0,10000);
    $uname = $uname.$num;
    return $uname;
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
        'email' => 'required|email',
     ]);

     if ($validator->fails()) 
     {
      return redirect('user/' . $Id . '/edit')->withInput()->withErrors($validator);
     }
     else {
            $upUsr = User::find($Id);
            $currUser = Config::get('userU');
            if($currUser->userType=='Manager')
              {
                $uType = Request::input('userType');
               
                if ($uType!=null and $uType!='') 
                {
                  $typeU = Role::find($uType);
                  Request::merge(['userType'=> $typeU->role]);
                }
              }

            if($upUsr)
            {
                $upUsr->fill(Request::all());
                if($upUsr->save())
                {
                  $sRole=Role::find($Id);
                  //Toastr::success('Successfully Updated', 'User');
                  return Redirect::to('customize/'.$Id.'/edit');
                }
            }
      }
   }

  public function destroy($Id)
   {
     $delUser=User::find($Id);
     if($delUser!=null)
     {
         $delUser->delete();
         Toastr::success('Successfully Deleted', 'User');
     }
    else
    {
      Toastr::success('Unable To Delete', 'User');
    }
    return Redirect::to('user');
   }
}