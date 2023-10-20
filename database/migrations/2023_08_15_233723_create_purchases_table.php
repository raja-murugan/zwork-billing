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
        Schema::create('purchases', function (Blueprint $table) {
            $table->id();

            $table->string('unique_key')->unique();
            $table->string('purchase_number')->nullable();
            $table->string('vocher_number')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();

            $table->unsignedBigInteger('vendor_id');
            $table->foreign('vendor_id')->references('id')->on('vendors')->onDelete('cascade');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('purchase_discounttype')->nullable();
            $table->string('purchase_discount')->nullable();
            $table->string('purchase_taxpercentage')->nullable();
            $table->string('purchase_addon_note')->nullable();



            $table->string('purchase_subtotal')->nullable();
            $table->string('purchase_discountprice')->nullable();
            $table->string('purchase_totalamount')->nullable();
            $table->string('purchase_taxamount')->nullable();
            $table->string('purchase_extracostamount')->nullable();
            $table->string('overall')->nullable();
            $table->string('purchase_grandtotal')->nullable();
            $table->string('purchase_paidamount')->nullable();
            $table->string('purchase_balanceamount')->nullable();

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
        Schema::dropIfExists('purchases');
    }
};
