<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class RemovePaySlip extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
                Schema::table('payslips', function (Blueprint $table) {
            $table->dropColumn('pdate');
            $table->dropColumn('earn_Description')->nullable();
            $table->dropColumn('ded_Description')->nullable();
            $table->dropColumn('econt_Description')->nullable();
            $table->dropColumn('earn_quantity')->nullable();
            $table->dropColumn('earn_rate')->nullable();
            $table->dropColumn('earn_total')->nullable();
            $table->dropColumn('earn_grossPay')->nullable();
            $table->dropColumn('deduct_total')->nullable();
            $table->dropColumn('deduct_netPay')->nullable();
            $table->dropColumn('ded_amount')->nullable();
            $table->dropColumn('econt_amount')->nullable();
            $table->dropColumn('econt_total')->nullable();
            $table->dropColumn('notes')->nullable();
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
        //
    }
}
