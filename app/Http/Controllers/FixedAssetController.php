<?php
namespace App\Http\Controllers;

use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\App;
use App\Models\FixedAsset;
use Illuminate\Support\Facades\Session;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Config;

class FixedAssetController extends Controller
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
        $user = Config::get('userU');
        if($user->FixedAsset>0)
        {
          $fixedasset=FixedAsset::all();
          return  View::make('fixedasset.fixed-asset-view')->with('fixedasset',$fixedasset);    
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
        return View::make('fixedasset.fixed-asset-create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         $validator = Validator::make(Request::all(), [

        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Description' => 'nullable|string',
        'PurchaseCost' =>'integer|nullable',
        'BookValue'=>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('fixedasset/create')->withInput()->withErrors($validator);
      }
      else{
             $fixedasset = new FixedAsset;
             $fixedasset->fill(Request::all());
             if($fixedasset->save()){
               
        Toastr::success('Successfully Created', 'Asset', ["positionClass" => "toast-top-right"]);
              }
           return Redirect::to('fixedasset');
        }


    }

  
    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $fixedasset =FixedAsset::find($id);
        return View::make('fixedasset.fixed-asset-edit')->with('fixedasset',$fixedasset);

    }

    public function update(Request $request, $id)
    {
       $validationRules=array(

        'Name'  => 'required|max:255',
        'Code'  => 'string|nullable',
        'Description' => 'nullable|string',
        'PurchaseCost' =>'integer|nullable',
        'BookValue'=>'integer|nullable',

         );

      // Validation Rules
    $validator=Validator::make(Request::all(),$validationRules);

    if ($validator->fails()) {
      
        return redirect('fixedasset/' . $id . '/edit')->withInput()->withErrors($validator);
     }
     else{
        $fixedasset=FixedAsset::find($id);
         if($fixedasset){

             $fixedasset->fill(Request::all());
            if($fixedasset->save())
            {
                  
                  Toastr::success('Successfully Updated', 'Fixed Assest', ["positionClass" => "toast-top-right"]);
                   return Redirect::to('fixedasset');

            }

         }
   
     }
    }

    public function destroy($id)
    {
        
     $fixedAssetDelete=FixedAsset::find($id);
     if($fixedAssetDelete!=null)
     {
         $fixedAssetDelete->delete();
         Toastr::success('Successfully Deleted', 'Asset', ["positionClass" => "toast-top-right"]);
              
     }
    
     return Redirect::to('fixedasset');
    }
}
