<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Rent extends Model
{
    public $primaryKey ='id';
    public  $table='rent';
  
    public $timestamps = false;
}
