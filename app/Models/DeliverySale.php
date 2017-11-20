<?php

namespace App\Models;   			//To reference Models
use App\Models\Sale;  
use Illuminate\Database\Eloquent\Model;

class DeliverySale extends Model
{
    public $primaryKey='id';
    public $table ='deliverysale';
    public $timestamps = false; // for false updated_at and created_at

     public function user()

    {
       return $this->belongsTo('App\Models\Customer', 'customer');
    }
     public function saleDelivery()
    {
       return $this->hasMany('App\Models\DeliveryNote','deliverysaleId');
    }
}
