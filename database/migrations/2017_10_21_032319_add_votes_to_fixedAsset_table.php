<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddVotesToFixedAssetTable extends Migration
{
    
    public function up()
    {
        Schema::table('fixedasset', function (Blueprint $table) {
                $table->string('Name');
                $table->string('Description');
                $table->string('PurchaseCost');
                $table->string('AccumulatedDepreciation');
                $table->string('BookValue');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('fixedasset', function (Blueprint $table) {
                $table->string('Name');
                $table->string('Description');
                $table->string('PurchaseCost');
                $table->string('AccumulatedDepreciation');
                $table->string('BookValue');
        });
    }
}
