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
        Schema::create('expenses', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('bank_id');
            $table->foreign('bank_id')->references('id')->on('banks')->onDelete('cascade');

            $table->string('unique_key')->unique();
            $table->string('expence_number')->nullable();
            $table->string('date')->nullable();
            $table->string('time')->nullable();
            $table->string('grand_total')->nullable();
            $table->string('add_on_note')->nullable();
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
        Schema::dropIfExists('expenses');
    }
};
