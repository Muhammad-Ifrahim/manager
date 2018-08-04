<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Inventory extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('inventoryitem', function (Blueprint $table) {

            $table->string('ItemCode');
            $table->string('ItemName');
            $table->string('UnitName');
            $table->Integer('PurchasePrice');
            $table->Integer('SalePrice');
            $table->string('Description');

            
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('inventoryitem', function (Blueprint $table) {

            $table->string('ItemCode');
            $table->string('ItemName');
            $table->string('UnitName');
            $table->Integer('PurchasePrice');
            $table->Integer('SalePrice');
            $table->string('Description');
            
        });
    }
}
