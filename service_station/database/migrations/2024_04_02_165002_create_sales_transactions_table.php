<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSalesTransactionsTable extends Migration
{
    public function up()
    {
        Schema::create('sales_transactions', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('customer_id');
            $table->unsignedBigInteger('product_id');
            $table->unsignedBigInteger('employee_id');
            $table->integer('quantity_sold');
            $table->decimal('total_amount', 10, 2);
            $table->dateTime('transaction_datetime');
            $table->timestamps();

            $table->foreign('customer_id')->references('id')->on('clients');
            $table->foreign('product_id')->references('id')->on('products');
            $table->foreign('employee_id')->references('id')->on('employees');
        });
    }

    public function down()
    {
        Schema::dropIfExists('sales_transactions');
    }
}
