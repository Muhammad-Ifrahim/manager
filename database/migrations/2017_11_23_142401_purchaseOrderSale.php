<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PurchaseOrderSale extends Migration
{
   
    public function up()
    {
          Schema::table('purchaseordersale', function (Blueprint $table) {
              $table->string('IssueDate');
              $table->string('DeliveryDate');
              $table->string('Reference');
              $table->Integer('Supplier');
              $table->Integer('DeliveryAddress');
              $table->Integer('DeliveryInstruction');
              $table->Integer('AuthorizedBy');


           });
    }

    public function down()
    {
        
    }
}
