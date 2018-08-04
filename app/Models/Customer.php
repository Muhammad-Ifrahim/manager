<?php

namespace App\Models;   			//To reference Models
use App\Models\Sale;  
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    public $primaryKey ='custId';
    public $fillable =[
    	'Name',
    	'Code',
    	'Email',
    	'Telephone',
    	'Fax',
    	'BusinessIdentifier',
    	'BillingAddress',
    	'AdditionalInformation',
        'bId',
    	'CreditLimit'

    ];

    public $timestamps = false; // for false updated_at and created_at

    public function reviews()
    {
        return $this->hasMany('Sale');
        
    }
}
