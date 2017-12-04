<?php

namespace App\Models;               //To reference Models
use Illuminate\Database\Eloquent\Model;

class InventoryTransferItem extends Model
{
    public $primaryKey='id';
    public $table ='inventorytransferitem';
    public $timestamps = false; // for false updated_at and created_at

    public function inventoryItem()
    {
   
        return $this->belongsTo('App\Models\Inventory','inventid');
    }

   
}
