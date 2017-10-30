<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Input;
use App\Models\Business;
use Illuminate\Support\Facades\Session;

use View;
use Request;
use Validator;
use Redirect;

class BusinessController extends Controller
{
    public function __invoke(){

   }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $business=Business::all();
        return View::make('business.business-view')->with('business', $business);
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
        echo "Creter2";
        $validator = Validator::make(Request::all(), [
        'Name'  => 'required|max:255',
    ]);

    if ($validator->fails()) {
       return redirect('business/create')->withInput()->withErrors($validator);
    }
    else{
        $Business = new Business;
        
        $Business->fill(Request::all());

        if($Business->save()){
          //Toastr::success('Successfully Created', 'Business', ["positionClass" => "toast-top-right"]);
        }
        $rout = '';
        return Redirect::to($rout);
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
