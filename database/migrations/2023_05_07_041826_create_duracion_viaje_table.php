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
        Schema::create('duracion_viaje', function (Blueprint $table) {
            $table->string('ciudad_a', 6);
            $table->string('ciudad_b', 6);
            $table->integer('minutos');
            $table->timestamps();

            $table->foreign('ciudad_a')
                ->references('code')->on('ubigeo');
            $table->foreign('ciudad_b')
                ->references('code')->on('ubigeo');
            $table->primary(['ciudad_a', 'ciudad_b']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('duracion_viaje');
    }
};
