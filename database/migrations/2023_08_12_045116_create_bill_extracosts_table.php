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
        Schema::create('bill_extracosts', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('bill_id');
            $table->foreign('bill_id')->references('id')->on('bills')->onDelete('cascade');

            $table->string('bill_extracost_note')->nullable();
            $table->string('bill_extracost')->nullable();
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
        Schema::dropIfExists('bill_extracosts');
    }
};
