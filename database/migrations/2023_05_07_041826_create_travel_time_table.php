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
            $table->string('first_city_id', 6);
            $table->string('second_city_id', 6);
            $table->integer('minutes');
            $table->timestamps();

            $table->foreign('first_city_id')->references('code')->on('ubigeo');
            $table->foreign('second_city_id')->references('code')->on('ubigeo');
            $table->primary(['first_city_id', 'second_city_id']);

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
