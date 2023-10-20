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
        Schema::create('quotations', function (Blueprint $table) {
            $table->id();
            
            $table->string('unique_key')->unique();
            $table->string('quotation_number')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();

            $table->unsignedBigInteger('customer_id');
            $table->foreign('customer_id')->references('id')->on('customers')->onDelete('cascade');


            $table->string('discount_type')->nullable();
            $table->string('discount')->nullable();
            $table->string('tax_percentage')->nullable();
            $table->string('add_on_note')->nullable();



            $table->string('sub_total')->nullable();
            $table->string('discount_price')->nullable();
            $table->string('total_amount')->nullable();
            $table->string('tax_amount')->nullable();
            $table->string('extracost_amount')->nullable();
            $table->string('overall')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('status')->nullable();

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
        Schema::dropIfExists('quotations');
    }
};
