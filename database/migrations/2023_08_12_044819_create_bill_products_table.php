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
        Schema::create('bill_products', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');

            $table->unsignedBigInteger('bill_product_id');
            $table->foreign('bill_product_id')->references('id')->on('products')->onDelete('cascade');
            $table->string('bill_width')->nullable();
            $table->string('bill_height')->nullable();
            $table->string('bill_qty')->nullable();
            $table->string('bill_areapersqft')->nullable();
            $table->string('bill_rate')->nullable();
            $table->string('bill_product_total')->nullable();
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
        Schema::dropIfExists('bill_products');
    }
};
