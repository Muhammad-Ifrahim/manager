<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CashAccount extends Model
{
    public $primaryKey ='id';
    public  $table='cashaccount';

    public function journal(){
 
        return $this->hasOne('App\Models\Journal', 'cashAccountId');
    }
    public $timestamps = false;
}
