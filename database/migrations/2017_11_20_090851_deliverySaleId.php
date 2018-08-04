<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class DeliverySaleId extends Migration
{
  
    public function up()
    {
        Schema::table('deliverynotes', function (Blueprint $table) {
                $table->integer('deliverysaleId');
                $table->foreign('deliverysaleId')->references('id')->on('deliverysale')->onDelete('cascade');

           });
    
    }

    
    public function down()
    {

    }
}
