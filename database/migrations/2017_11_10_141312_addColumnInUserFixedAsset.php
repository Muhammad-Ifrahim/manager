<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInUserFixedAsset extends Migration
{

    public function up()
    {
           Schema::table('users', function (Blueprint $table) {
                $table->boolean('FixedAsset')->default(0);
           });
        
    }

    public function down()
    {
        //
    }
}
