<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumninDeliveryNote extends Migration
{
   public function up()
    {
        Schema::table('deliverysale', function (Blueprint $table) {
            $table->unsignedInteger('bId');
            $table->foreign('bId')
            ->references('id')
            ->on('business')
            ->onDelete('cascade');
        });
    }

   
    public function down()
    {
        Schema::table('deliverysale', function (Blueprint $table) {
            //
        });
  }
}
