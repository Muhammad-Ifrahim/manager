<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAdditionalInformationinCustomer extends Migration
{
      public function up()
    {
           Schema::table('customers', function (Blueprint $table) {
                $table->boolean('AdditionalInformation')->default(0);
           });
        
    }

    public function down()
    {
        //
    }
}
