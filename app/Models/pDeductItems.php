<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class pdeductitems extends Model
{
    public $primaryKey ='dId';
    protected $fillable =[
    	'name',
    	'lAccount',
        'bId',
    ];
    public $timestamps = true;
}