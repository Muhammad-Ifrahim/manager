<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use App\Models\Customer;

class SaleInvoiceSummary extends Model
{
	public $table ='SaleInvoiceSummary';
    public $primaryKey ='id';

    public $timestamps =false; 
}
