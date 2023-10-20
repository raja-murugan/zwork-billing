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
        Schema::create('expense_note_costs', function (Blueprint $table) {
            $table->id();

            $table->unsignedBigInteger('expenses_id');
            $table->foreign('expenses_id')->references('id')->on('expenses')->onDelete('cascade');

            $table->string('note')->nullable();
            $table->string('price')->nullable();
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
        Schema::dropIfExists('expense_note_costs');
    }
};
