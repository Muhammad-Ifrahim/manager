<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class EmployeeAccount extends Model
{
    public $primaryKey ='id';
    public  $table='employeeaccount';
  
    public $timestamps = false;
}
