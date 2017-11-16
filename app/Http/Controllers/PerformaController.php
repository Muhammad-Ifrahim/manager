<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Input;
use App\Models\Proforma;
use App\Models\Inventory;
use App\Models\Sale;
use Illuminate\Support\Facades\Session;
use Carbon;
//use App\Http\Controllers\Response;
use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Response;
use PDF;

class PerformaController extends Controller
{
     
     
    
    public  function __construct(){
    


    } 
    public function index()
    {
               
     $sale=Sale::all(); 
     return View::make('proforma.proforma-view')->with('sale',$sale); 
        
    }

    public function create()
    {
      
     $inventory = Inventory::all();
     return view('proforma.proforma-create')->with('inventory ',$inventory);

    }
    public function store(Request $request)
    {
        
        $sale = new Sale;
        $input = Input::all();
       // dd(Input::all());
        $sale->Heading=is_null(Input::get('Heading')) ? '' : Input::get('Heading');
        $sale->Date=is_null(Input::get('date')) ? '' : Input::get('date');
        $sale->customer =Input::get('customer'); 
        $sale->Amount = is_null(Input::get('NetAmount')) ? 0 : Input::get('NetAmount');
        $sale->save();
        $j = $sale->SaleId;
        
        if($sale->save()){
            for($id = 0; $id < count($input['inventId']); $id++){
                $proforma = new Proforma;
                $proforma->saleId=$sale->SaleId;
                $proforma->inventId = $input['inventId'][$id];
                $proforma->Quantity = is_null($input['qty'][$id]) ? 0 : $input['qty'][$id] ;
                $proforma->SalePrice = $input['price'][$id];
                $proforma->Discount = is_null($input['dis'][$id]) ? 0 : $input['dis'][$id] ;
                $proforma->Amount = $input['amount'][$id];
                $proforma->save();
            }
            
        }
        return Redirect::to('proforma');

    }

    
    public function show($id)
    {
      $sale=Sale::find($id);
      return view('proforma.proforma-edit')->with('sale',$sale);  
    }

  
    public function edit($id)
    { 



    }

   
    public function update(Request $request, $id)
    {

        
    }

    public function destroy($id)
    {
        $sale=Sale::find($id);
           if($sale!=null)
         {
             $sale->saleQuote()->delete();
             $sale->delete();
             Toastr::success('Proforma Deleted', 'Customer', ["positionClass" => "toast-top-right"]);
                  
         }
        
         return Redirect::to('proforma');
          
    }
    // public function getinventory(Request $request){
    //       $inventId = Input::all();
    //       $inventory=Inventory::where('inventId', $inventId)->get();
    //       return response()->json($inventory);
    // }
    public function storeInventory(Request $request){ 

             
             $proforma=new Proforma();
             $performaId=Input::get('custId');
             $proforma->custId=Input::get('custId');
             $proforma->inventId=Input::get('inventId');
             $proforma->save();   
             $proforma=Proforma::find(1);
             //$renderValue=true;  
        return Response::json(array('data' => $proforma));
      
    }
    public function printReport($id){
         
        // $proforma=Proforma::with('inventoryItem')->where('saleqId',$id)->get();
        // dd($proforma);
       //$sale=Sale::findOrFail($id)->get();
$sale = Sale::with('saleQuote')->with('saleQuote.inventoryItem')->with('user')->where('SaleId',$id)->get();
   //    dd($sale);
       $pdf = new PDF();
       $pdf=PDF::loadView('proforma.proforma-print',['sale'=>$sale]); 
       return $pdf->stream('proforma.proforma-print');
       
    }
}
