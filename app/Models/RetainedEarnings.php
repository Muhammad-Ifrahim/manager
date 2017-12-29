<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class RetainedEarnings extends Model
{
    public $primaryKey ='id';
    public  $table='retainedearnings';
  
    public $timestamps = false;
}