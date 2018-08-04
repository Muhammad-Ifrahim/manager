<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayslipSummaryReportTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        /*Schema::create('payslipReports', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description', 200);
            $table->string('payType', 15);
            $table->Date('from');
            $table->Date('to');            
            $table->timestamps();
            $table->unsignedInteger('bId');
            $table->foreign('bId')
            ->references('bId')
            ->on('business')
            ->onDelete('cascade');        
        });*/
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
       /* Schema::drop('payslipReports', function(Blueprint $table)
        {
            $table->increments('id');
            $table->string('description', 200);
            $table->Date('from');
            $table->Date('to');            
            $table->timestamps();
            $table->unsignedInteger('bId');
            $table->foreign('bId')
            ->references('bId')
            ->on('business')
            ->onDelete('cascade');  
        });*/
    }
}