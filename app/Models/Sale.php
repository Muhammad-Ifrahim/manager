<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class Sale extends Model
{
	public $table ='sale';
    public $primaryKey ='SaleId';

    public $timestamps =false;

     public function user()
    {
       return $this->belongsTo('App\Models\Customer', 'customer');
    }
     public function saleQuote()
    {
       return $this->hasMany('App\Models\Proforma', 'saleId');
    }
    public function TaxName(){

         return $this->belongsTo('App\Models\Tax', 'Tax');
    }
}
