<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('travel_time', function (Blueprint $table) {
            $table->unsignedBigInteger('first_city_id');
            $table->unsignedBigInteger('second_city_id');
            $table->integer('time');
            $table->timestamps();

            $table->primary(['first_city_id', 'second_city_id']);
            $table->foreign('first_city_id')
                ->references('id')->on('ubigeo');
            $table->foreign('second_city_id')
                ->references('id')->on('ubigeo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('travel_time');
    }
};
