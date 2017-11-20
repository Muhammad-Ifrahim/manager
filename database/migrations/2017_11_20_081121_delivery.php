<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Delivery extends Migration
{
   
    public function up()
    {
         Schema::table('deliverysale', function (Blueprint $table) {
             //   $table->integer('customer');
           });
    
    }

   
    public function down()
    {
    
    }
}
