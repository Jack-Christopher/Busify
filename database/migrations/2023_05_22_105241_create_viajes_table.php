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
        Schema::create('viajes', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('ruta_id');
            // $table->unsignedBigInteger('sucursal_id');
            // $table->dateTime('fecha_hora');
            $table->date('fecha');
            $table->time('hora');
            $table->decimal('precio', 8, 2)->nullable();
            $table->string('placa', 8)->nullable();

            // TODO:
            // add fields for food 
            // add fields for tripulation            

            $table->timestamps();

            $table->foreign('ruta_id')
                ->references('id')->on('rutas');
            // $table->foreign('sucursal_id')
                // ->references('id')->on('sucursal');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('viajes');
    }
};
