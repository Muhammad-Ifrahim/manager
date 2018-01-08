<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class AccountsPayable extends Model
{
    public $primaryKey ='id';
    public  $table='accountspayable';
  
    public $timestamps = false;
}