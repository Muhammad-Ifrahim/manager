<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class InventorySales extends Model
{
    public $primaryKey ='id';
    public  $table='inventorysales';
  
    public $timestamps = false;
}