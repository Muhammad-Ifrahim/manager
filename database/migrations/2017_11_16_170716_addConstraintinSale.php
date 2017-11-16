<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddConstraintinSale extends Migration
{
  
    public function up()
    {
         Schema::table('salesquotes', function (Blueprint $table) {
                $table->integer('saleId');
                $table->foreign('saleId')->references('SaleId')->on('sales')->onDelete('cascade');

           });
        
        
    }

    
    public function down()
    {
    
    }
}
