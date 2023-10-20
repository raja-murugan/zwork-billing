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
        Schema::create('vendor_payments', function (Blueprint $table) {
            $table->id();
            $table->string('unique_key')->unique();
            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');

            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('date');
            $table->string('time');
            $table->string('oldblance')->nullable();
            
            $table->string('discount')->nullable();
            $table->string('totalamount')->nullable();
            $table->string('paid_amount');
            $table->string('payment_pending');
            $table->string('note')->nullable(); 

            $table->boolean('soft_delete')->default(0);
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
        Schema::dropIfExists('vendor_payments');
    }
};
