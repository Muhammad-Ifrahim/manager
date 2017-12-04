<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\Inventory;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;


class InventoryController extends Controller
{

  public function __construct()
  {
    $this->middleware('auth');
  }
    public function index()
    {
        $inventory =Inventory::all();
        return view('inventory.inventory-view')->with('inventory',$inventory);
    }
    public function create()
    {
        return view('inventory.inventory-create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make(Request::all(), [

        'ItemCode'  => 'integer',
        'ItemName'  => 'string|required',
        'UnitName' => 'string|nullable',
        'PurchasePrice' => 'integer|nullable',
        'SalePrice' => 'integer|nullable',
        'Description'=>'string|nullable',
        'QtyOnHand'=>'integer|nullable',
        'AverageCost' =>'integer|nullable',
        
    ]);

      if ($validator->fails()) {

        return redirect('Inventory/create')->withInput()->withErrors($validator);
      }
      else{
             $inventory = new Inventory;
             $inventory->fill(Request::all());
             if($inventory->save()){
               Toastr::success('Successfully Added', 'Inventory', ["positionClass" => "toast-top-right"]);
              }
           return Redirect::to('Inventory');
        }
    }

    public function show($id)
    {

    }

    public function edit($id)
    {
        $inventory=Inventory::find($id);
        return view('inventory.inventory-edit')->with('inventory',$inventory);
    }

    public function update(Request $request, $id)
    {
          $validator = Validator::make(Request::all(), [

        'ItemCode'  => 'integer',
        'ItemName'  => 'string|required',
        'UnitName' => 'string|nullable',
        'PurchasePrice' => 'integer|nullable',
        'SalePrice' => 'integer|nullable',
        'Discription'=>'string|nullable',
        'QtyOnHand'=>'integer|nullable',
        'AverageCost' =>'integer|nullable',
        
    ]);

    // $validator=Validator::make(Request::all(),$validationRules);
      if ($validator->fails()) {

         return redirect('Inventory/' . $id . '/edit')->withInput()->withErrors($validator);
      }
      else{
          $inventory=Inventory::find($id);
          if ($inventory) {
             $inventory->fill(Request::all());
             if($inventory->save()){
               Toastr::success('Successfully Added', 'Inventory', ["positionClass" => "toast-top-right"]);
          
            }

          }
           return Redirect::to('Inventory');
        }
        
    }

    public function destroy($id)
    {
      $inventoryDelete =Inventory::find($id);
      if($inventoryDelete!=null){
        $inventoryDelete->delete();
           Toastr::success('Successfully Deleted', 'Inventory Item', ["positionClass" => "toast-top-right"]);
      }
      return Redirect('Inventory');

    }
}
