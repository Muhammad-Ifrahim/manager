<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PayslipFields extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('payslip', function (Blueprint $table) {
            $table->date('pdate');
            $table->text('earn_Description')->nullable();
            $table->text('ded_Description')->nullable();
            $table->text('econt_Description')->nullable();
            $table->decimal('earn_quantity')->nullable();
            $table->decimal('earn_rate')->nullable();
            $table->decimal('earn_total')->nullable();
            $table->decimal('earn_grossPay')->nullable();
            $table->decimal('deduct_total')->nullable();
            $table->decimal('deduct_netPay')->nullable();
            $table->decimal('ded_amount')->nullable();
            $table->decimal('econt_amount')->nullable();
            $table->decimal('econt_total')->nullable();
            $table->text('notes')->nullable();
            //Foriegn keys
            $table->unsignedInteger('empId');
            $table->foreign('empId')
            ->references('empId')
            ->on('employees')
            ->onDelete('cascade');

            $table->unsignedInteger('eId');
            $table->foreign('eId')
            ->references('eId')
            ->on('pearnitem')
            ->onDelete('cascade');

            $table->unsignedInteger('dId');
            $table->foreign('dId')
            ->references('dId')
            ->on('pdeductitem')
            ->onDelete('cascade');

            $table->unsignedInteger('cId');
            $table->foreign('cId')
            ->references('cId')
            ->on('pcontributeitem')
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
        Schema::table('payslip', function (Blueprint $table) {
            //
        });
    }
}
