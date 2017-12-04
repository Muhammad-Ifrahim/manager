<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    public $pKey ='id';
    protected $fillable =[
        'role',
    ];
    public $timestamps = true;

    public function getUser()
    {
        return $this->belongsTo('App\Model\User');
    }
}
