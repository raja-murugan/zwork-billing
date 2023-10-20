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
        Schema::create('bills', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('quotation_id')->nullable();

            $table->string('unique_key')->unique();
            $table->string('billno')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');
            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('bill_discount_type')->nullable();
            $table->string('bill_discount')->nullable();
            $table->string('bill_tax_percentage')->nullable();
            $table->string('bill_add_on_note')->nullable();



            $table->string('bill_sub_total')->nullable();
            $table->string('bill_discount_price')->nullable();
            $table->string('bill_total_amount')->nullable();
            $table->string('bill_tax_amount')->nullable();
            $table->string('bill_extracost_amount')->nullable();
            $table->string('overall')->nullable();
            $table->string('bill_grand_total')->nullable();
            $table->string('bill_paid_amount')->nullable();
            $table->string('bill_balance_amount')->nullable();

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
        Schema::dropIfExists('bills');
    }
};
