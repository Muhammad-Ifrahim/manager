<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class StartingBalance extends Model
{
    public $primaryKey ='id';
    public  $table='startingbalance';
  
    public $timestamps = false;
}