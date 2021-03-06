<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Proforma; 
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
        'ValueOnHand',
    ];
    public $timestamps=false;
    public function inventory()
    {
        return $this->hasOne('App\Models\Proforma');
    }
   
    public function journal(){
 
        return $this->hasOne('App\Models\Journal', 'inventaccountId');
    }
     public function Account()
    {
        return $this->belongsTo('App\Models\Accounts','accountId');
    }
}