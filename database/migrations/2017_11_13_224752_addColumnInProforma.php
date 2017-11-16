<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInProforma extends Migration
{
    public function up()
    {
          Schema::table('salesquotes', function (Blueprint $table) {
                $table->string('Quantity');
                $table->string('SalePrice');
                $table->string('Discount');
                $table->string('Amount');
           });
    }

    public function down()
    {
           Schema::table('salesquotes', function (Blueprint $table) {
                $table->string('Quantity');
                $table->string('SalePrice');
                $table->string('Discount');
                $table->string('Amount');
           });
    }
}
