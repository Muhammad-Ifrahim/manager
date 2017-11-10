<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddColumnInUser extends Migration
{
   
    public function up()
    {
           Schema::table('users', function (Blueprint $table) {
                
                $table->boolean('SalesQuote')->default(0);
                $table->boolean('SalesOrder')->default(0);
                $table->boolean('SalesInvoice')->default(0);
                $table->boolean('DeliveryNotes')->default(0);
                $table->boolean('Supplier')->default(0);
                $table->boolean('PurchaseOrder')->default(0);
                $table->boolean('PurchaseInvoice')->default(0);
                $table->boolean('InventoryTransfer')->default(0);
                    
                

        });
        
    
    }

    public function down()
    {
           Schema::table('users', function (Blueprint $table) {

                $table->boolean('SalesQuote')->default(0);
                $table->boolean('SalesOrder')->default(0);
                $table->boolean('SalesInvoice')->default(0);
                $table->boolean('DeliveryNotes')->default(0);
                $table->boolean('Supplier')->default(0);
                $table->boolean('PurchaseOrder')->default(0);
                $table->boolean('PurchaseInvoice')->default(0);
                $table->boolean('InventoryTransfer')->default(0);

        });
        
    }
}
