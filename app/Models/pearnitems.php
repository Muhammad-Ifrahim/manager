<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class pearnitems extends Model
{
	
    public $primaryKey ='eId';
    protected $fillable =[
    	'name',
    	'eAccount',
        'bId',
    ];
    public $timestamps = true;

    public function payslips()
    {
        return $this->belongsTo('App\Models\payslips');
    }
}