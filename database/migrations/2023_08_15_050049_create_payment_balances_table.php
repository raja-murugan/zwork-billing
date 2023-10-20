<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_balances', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('vendor_id')->nullable();
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

            $table->unsignedBigInteger('customer_id')->nullable();
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');

            $table->string('customer_amount')->nullable();
            $table->string('customer_paid')->nullable();
            $table->string('customer_balance')->nullable();


            $table->string('vendor_amount')->nullable();
            $table->string('vendor_paid')->nullable();
            $table->string('vendor_balance')->nullable();


            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('payment_balances');
    }
};
