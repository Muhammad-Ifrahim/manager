<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionaltoSales extends Migration
{
   
    public function up()
    {
          Schema::table('salesquotes', function (Blueprint $table) {
                $table->string('sale');
           });
    }

    public function down()
    {
           Schema::table('salesquotes', function (Blueprint $table) {
                $table->string('sale');
           });
    }
}
