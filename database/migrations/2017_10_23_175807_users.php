<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class Users extends Migration
{
    
    public function up()
    {
         Schema::table('users', function (Blueprint $table) {
                
                $table->string('accounts');
                $table->string('inventory');
                $table->string('customer');
                $table->string('employee');
                

        });
        
    }

   
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
                
                $table->string('accounts');
                $table->string('inventory');
                $table->string('customer');
                $table->string('employee');
                
                
        });
    }
}
