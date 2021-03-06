<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class pcontributeitems extends Model
{
    public $primaryKey ='cId';
    protected $fillable =[
    	'name',
    	'eAccount',
    	'lAccount',
        'bId',
    ];
    public $timestamps = true;

    public function expenseAccounts()
	{
	   return $this->belongsTo('App\Models\expenseAccounts', 'lAccout');
	}
}