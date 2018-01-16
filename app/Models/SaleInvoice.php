<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class SaleInvoice extends Model
{
	public $table ='saleinvoice';
    public $primaryKey ='saleinId';

    public $timestamps =false;

    public function journal(){
 
        return $this->hasOne('App\Models\Journal', 'saleInvoiceId');
    }

     public function user()
    {
       return $this->belongsTo('App\Models\Customer', 'customer');
    }
     public function saleQuote()
    {
       return $this->hasMany('App\Models\SaleItem', 'saleId');
    }
    public function TaxName(){

         return $this->belongsTo('App\Models\Tax', 'Tax');
    }
}
