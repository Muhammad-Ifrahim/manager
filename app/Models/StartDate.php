<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StartDate extends Model
{
	public $primaryKey ='id';
    protected $fillable =[
   		'date',
        'bId',
    ];
    public $timestamps = true;
}
