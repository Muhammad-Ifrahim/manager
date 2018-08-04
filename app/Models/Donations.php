<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Donations extends Model
{
    public $primaryKey ='id';
    public  $table='donations';
  
    public $timestamps = false;
}
