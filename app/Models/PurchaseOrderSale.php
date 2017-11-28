<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;


class PurchaseOrderSale extends Model
{
	public $table ='purchaseordersale';
    public $primaryKey ='id';

    public $timestamps =false;

   public function supplierName()
    {
       return $this->belongsTo('App\Models\Supplier', 'Supplier');
    }
   public function purchaseSale()
    {
       return $this->hasMany('App\Models\PurchaseOrder', 'supId');
    }
      public function inventoryItem()
    {
   
        return $this->belongsTo('App\Models\Inventory','inventId');
    }
 
}
