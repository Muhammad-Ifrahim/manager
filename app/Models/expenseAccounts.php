<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class expenseaccounts extends Model
{
    public $primaryKey ='id';
    protected $fillable =[
    	'title',
        'bId',
    ];
    public $timestamps = true;

    public function pContributeItems()
  	{
    	return $this->hasMany('App\Models\pContributeItems', 'lAccount', 'id');
  	}
}
