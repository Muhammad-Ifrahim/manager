<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliverySaleIdAddCOL extends Migration
{
    
    public function up()
    {
        Schema::table('deliverynotes', function (Blueprint $table) {
              $table->integer('inventId');
              $table->integer('Quantity');
              $table->foreign('inventId')->references('inventId')->on('inventoryitem')->onDelete('cascade');
           });
    }
    public function down()
    {
        //
    }
}
