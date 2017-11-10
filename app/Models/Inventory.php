<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
class Inventory extends Model
{
	protected $primaryKey='inventId';
    protected $table ='inventoryitem';
    public $fillable =[
    	'ItemCode' , 
        'ItemName' , 
        'UnitName',
        'PurchasePrice', 
        'SalePrice' ,
        'Description',
        'QtyOnHand',
        'AverageCost',
        'ValueOnHand'
    ];
    public $timestamps=false;
}