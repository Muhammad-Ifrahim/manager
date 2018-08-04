<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class InventoryOnHand extends Model
{
    public $primaryKey ='id';
    public  $table='inventoryonhand';
  
    public $timestamps = false;
}