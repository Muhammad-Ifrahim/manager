<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class BankCharges extends Model
{
    public $primaryKey ='id';
    public  $table='bankcharges';
  
    public $timestamps = false;
}
