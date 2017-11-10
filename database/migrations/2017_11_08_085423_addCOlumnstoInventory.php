<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddCOlumnstoInventory extends Migration
{
    
    public function up()
    {
        Schema::table('inventoryitem',function(Blueprint $table){
            $table->string('QtyOnHand');
            $table->string('AverageCost');
            $table->string('ValueOnHand');            

        });
    }


    public function down()
    {
        Schema::table('inventoryitem',function(Blueprint $table){
            $table->string('QtyOnHand');
            $table->string('AverageCost');
            $table->string('ValueOnHand'); 

        });
    }
}
