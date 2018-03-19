<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;
use App\Models\User;
use Config;
use Auth;
use View;
use Request;
use Validator;
use Redirect;
use Config;

class OtherBusinessController extends Controller
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
    public function index($bisId)
    {
        $currUser = Config::get('userU');
        if($currUser->userType=='Admin')
        { 
            $userId = User::where('bId',$bisId)->where('userType','Manager')->first();
            //dd($userId['id']);
            if ($userId['id']!=null) 
            {
                $user = User::find($userId['id']);
                Auth::login($user);
                return view('layouts.master');    
            }
            else
            {
                return view('users.noUser-view');    
            }
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

    }

    public function store(Request $request)
    {

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

    }
}