<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class BidAdditionContribute extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pcontributeitems', function (Blueprint $table) {
            $table->unsignedInteger('bId');
            $table->foreign('bId')
            ->references('id')
            ->on('business')
            ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pcontrbiuteitems', function (Blueprint $table) {
            //
        });
    }
}
