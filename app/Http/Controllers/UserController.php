<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;


class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index()
    {
        
    }
    
    public function create()
    {
      
    }

    public function store(Request $request)
    {
        //      $user=User::find(6);
        //      $user->fill(Input::all());
        //      $user->save();
        //      Toastr::success('Successfully Created', 'Customer', ["positionClass" => "toast-top-right"]);
        
        // $response = array(
        //     'status' => 'success',
        //     'msg' => 'Article has been posted.',
        // );
        // return \Response::json($response);
        
    }

   
    public function show($id)
    {
       
    }
   
    public function edit($id)
    {
        
    }
   
    public function update(Request $request, $id)
    {
        
    }
    public function destroy($id)
    {
        
    }
}