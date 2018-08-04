<?php

namespace App\Models;   			
use Illuminate\Database\Eloquent\Model;

class FixedAsset extends Model
{
    public $table="fixedasset";
    protected $primaryKey ="fixId";

    public $fillable=[
    	'Name',
    	'Description',
    	'PurchaseCost',
    	'AccumulatedDepreciation',
    	'BookValue'
    ];
    public $timestamps = false;
}
