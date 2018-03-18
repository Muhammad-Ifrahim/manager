<?php

namespace App\Http\Controllers;

use  Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Input;
use App\Models\pos;
use Illuminate\Support\Facades\Session;
use App\Models\SaleInvoice;
use App\Models\SaleItem;

use Mike42\Escpos\PrintConnectors\FilePrintConnector;
use Mike42\Escpos\Printer;

use View;
use Request;
use Validator;
use Toastr;
use Redirect;
use Config;
use PDF;


class POSSaleController extends Controller
{
    
    public function __construct(){

        $this->middleware('auth');
    }
    public function index()
    {
        $bid=Session::get('bId');
        $posSale=pos::where('bId',$bid)->get();
        return view::make('possale.pos-sale-view')->with('posSale',$posSale);
    }

    public function saleCompleted(){
        
       $bid=Session::get('bId');
       $posSale=pos::where('bId',$bid)->get();
        return view::make('possale.pos-sale-view-completed')->with('posSale',$posSale); 
       
    }
    public function create()
    {
        
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        
    }


    public function edit($id)
    {
       
        $posSale=pos::find($id);
       //dd($posSale);
        $pos=pos::with('posItems')->with('posItems.inventory')->where('posSaleId',$id)->get();
        //dd($pos);
      //  $pos=SaleInvoice::with('saleQuote')->with('saleQuote.inventoryItem')->where('saleinId',$id)->get();
        return view::make('possale.possale-edit')->with('pos',$pos)->with('posSale',$posSale);
    }

    public function update(Request $request, $id)
    {

        app('App\Http\Controllers\POSController')->store($request,$id);
    }

     public function destroy($id)
    {
        $posSale=pos::find($id);
        if ($possale!=null) {
            dd("we are here");
        }
    }
    public function print($id){

      try{

        }
        catch(Exception $e){

        }

       // $connector = new FilePrintConnector("php://stdout");
       // $printer = new Printer($connector);
       // $printer -> text("Hello World!\n");
       // $printer -> cut();
       // $printer -> close();
      //  $posSale=pos::with('posItems')->with('posItems.inventory')->where('posSaleId',$id)->get();
      //  dd($posSale);
       // $pdf=new PDF();
       // return  view::make('possale.possale-print');
        //$pdf=PDF::loadView("possale.possale-print",['$posSale'=>$posSale])->setPaper(array(0,0,204,650));
        //return  $pdf->stream('POS-Sale.pdf',array('Attachment'=>0));

    }
}
