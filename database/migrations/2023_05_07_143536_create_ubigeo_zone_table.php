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
        Schema::create('ubigeo_zone', function (Blueprint $table) {
            $table->unsignedBigInteger('ubigeo_id');
            $table->unsignedBigInteger('zone_id');
            $table->unsignedInteger('position');
            $table->timestamps();

            $table->primary(['zone_id', 'ubigeo_id']);
            $table->foreign('ubigeo_id')
                ->references('id')->on('ubigeo');
            $table->foreign('zone_id')
                ->references('id')->on('zone');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('ubigeo_zone');
    }
};
