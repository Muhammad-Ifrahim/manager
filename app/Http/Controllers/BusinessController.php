<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Models\Business;
use Illuminate\Support\Facades\Session;
use  Illuminate\Support\Facades\App;

use View;
use Request;
use Validator;
use Redirect;
use Config;

class BusinessController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $currUser = Config::get('userU');
        if($currUser->userType=='Admin')
        { 
            $business=Business::all();
            return View::make('business.business-view')->with('business', $business);   
        }
        else
        {
            return View::make('errors.notAllowed-view');
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return View::make('business.business-create');  
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Request::all(), [
        'Name'  => 'required|max:255',
        ]);

        if ($validator->fails()) {
           return redirect('business/create')->withInput()->withErrors($validator);
        }
        else
        {
            $Business = new Business;
            
            $Business->fill(Request::all());

            if($Business->save()){
              //Toastr::success('Successfully Created', 'Business', ["positionClass" => "toast-top-right"]);
            }
            
            return View::make('users.register');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
     $delBusiness=Business::find($id);
     if($delBusiness!=null)
     {
         $delBusiness->delete();
     }
    
     return Redirect::to('business');
    }

    /**
    * Sets id of each business globally
    *
    */
    public function setBid()
    {
        return View::make('business.business-create');  
        echo "okk";
    }
}