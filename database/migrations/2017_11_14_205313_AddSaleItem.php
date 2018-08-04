<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddSaleItem extends Migration
{
    
    public function up()
    {
         Schema::table('sales', function (Blueprint $table) {
                $table->string('Heading');
                $table->string('Date');
                $table->string('Quote');
                $table->string('Notes');
           });
    }

   
    public function down()
    {
         Schema::table('sales', function (Blueprint $table) {
                
           });
    }
}
