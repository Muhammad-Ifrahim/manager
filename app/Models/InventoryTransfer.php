<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class InventoryTransfer extends Model
{
    public $primaryKey='itransId';
    public $table ='inventorytransfer';
    public $timestamps = false; // for false updated_at and created_at

     public function inventoryLocation(){
        return $this->belongsTo('App\Models\InventoryLocation','InventoryLocationFrom');
    }

    public function inventoryLocationTo(){
   
        return $this->belongsTo('App\Models\InventoryLocation','InventoryLocationTo');
    }
       public function items()
    {
       return $this->hasMany('App\Models\InventoryTransferItem', 'InventTransferId');
    }
}
