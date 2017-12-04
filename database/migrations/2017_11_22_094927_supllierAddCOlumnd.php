<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class SupllierAddCOlumnd extends Migration
{
   
    public function up()
    {
         Schema::table('supplier', function (Blueprint $table) {
              $table->string('Name');
              $table->string('Code');
              $table->string('BusinessIdentifer');
              $table->string('Email');
              $table->Integer('Telephone');
              $table->string('BillingAddress');
              $table->string('Fax');
              $table->Integer('Mobile');
              $table->string('AdditionalInformation');
              $table->Integer('CreditLimit'); 

           });
    }

    public function down()
    {
        
    }
}
