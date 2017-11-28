<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class Supplier extends Model
{
	public $primaryKey='supId';
    public $table = 'supplier'; 
      public $fillable =[
        'Name',
        'Code',
        'Email',
        'Telephone',
        'Fax',
        'BusinessIdentifier',
        'BillingAddress',
        'AdditionalInformation',
        'CreditLimit'
    ]; 
    public $timestamps=false;
}
