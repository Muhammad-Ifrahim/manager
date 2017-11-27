<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class DeliveryNote extends Model
{
    public $table ='deliverynotes';
    public $timestamps = false; // for false updated_at and created_at

     public function deliverynotes()
    {
   
        return $this->belongsTo('App\Models\DeliverySale');
    }
     public function inventoryItem()
    {
   
        return $this->belongsTo('App\Models\Inventory','inventId');
    }
}
