<?php

namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Accounts extends Model
{
    public $primaryKey ='id';
    public  $table='account';

     protected $fillable = [
     	'AccontType'];
  
    public $timestamps = true;
}
