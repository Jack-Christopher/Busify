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
        Schema::create('rutas', function (Blueprint $table) {
            $table->id();
            $table->string('nombre', 64);
            $table->unsignedBigInteger('zona_id');
            // position of the route in the zone
            $table->unsignedTinyInteger('origen_id');
            $table->unsignedTinyInteger('destino_id');
            $table->unsignedBigInteger('servicio_id');
            $table->decimal('precio', 8, 2);
            $table->timestamps();

            $table->foreign('zona_id')
                ->references('id')->on('zone');
            $table->foreign('servicio_id')
                ->references('id')->on('servicios');
        
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('rutas');
    }
};
