<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class JournalEntry extends Model
{
    public $primaryKey ='jouId';
    public  $table='journalentry';

    public  function Accounts(){

    	return  $this->belongsTo('App\Models\Accounts', 'Account');
    }
  
    public $timestamps = false;
}
