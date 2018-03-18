<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Models\Business;
use App\Models\User;
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
            $business=Business::where('bId','<>','24')->get();
            return View::make('business.business-view')->with('business', $business);   
        }
        else if($currUser->userType=='Manager')
        {
            $bids = $this->helperSubBusiness($currUser);
           
            $business=Business::whereIn('bId', $bids)->get();
            return View::make('business.business-view')->with('business', $business);
        }
    }

    public function helperSubBusiness($usrId)
    {
        $bids = array();
        $multId = User::where('email','=',$usrId->email)->get();
        if($multId!=null)
        {
            foreach ($multId as $key => $value) 
            {
                array_push($bids, $value->bId);    
            }
        }
        return $bids;
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

    /**
     * Show the form for creating a new sub resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function createSub()
    {
        return View::make('business.subbusiness-create');  
    }

    public function store(Request $request)
    {
        $sb = Request::input('sub');
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

            if($Business->save())
            {

            }
            if ($sb==1) 
            {
                return View::make('users.linkManager-create');
            }
            else
            {
                return View::make('users.register');
            }
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