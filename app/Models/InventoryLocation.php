<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class InventoryLocation extends Model
{
	public $table='inventorylocation';
    public $primaryKey ='id';
    protected $fillable =[
    	'Name',
    ];
    public $timestamps = false;
    
}
