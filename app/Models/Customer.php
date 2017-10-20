<?php

namespace App\Models;   			//To reference Models
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $fillable =[
    	'Name'//,
    	// 'Code',
    	// 'Email',
    	// 'Telephone',
    	// 'Fax',
    	// 'BusinessIdentifier',
    	// 'BillingAddress',
    	// 'AdditionalInformation',
    	// 'CreditLimit'
    ];

    public $timestamps = false; // for false updated_at and created_at
}
