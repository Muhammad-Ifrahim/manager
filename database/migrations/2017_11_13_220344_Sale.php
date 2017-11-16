<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Sale extends Migration
{
    
    public function up()
    {
        Schema::table('sale', function (Blueprint $table) {
                
                $table->string('customer');
                $table->string('Amount');
           });
    }

   
    public function down()
    {
        Schema::table('sale', function (Blueprint $table) {
                
                $table->string('customer');
                $table->string('Amount');
           });
    }
}
