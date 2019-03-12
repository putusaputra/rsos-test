<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTransactionsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('id_transactions');
            $table->date('input_date');
            $table->string('customer_name');
            $table->unsignedBigInteger('id_product');
            $table->unsignedBigInteger('id_agent');
            $table->timestamps();

            $table->foreign('id_product')->references('id_product')->on('products');
            $table->foreign('id_agent')->references('id_agent')->on('agents');

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('transactions');
    }
}
