<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Business extends Model
{
    public $primaryKey ='bId';
    protected $fillable =[
    	'Name',
    	'Description',
    ];
    public $timestamps = true;
}
