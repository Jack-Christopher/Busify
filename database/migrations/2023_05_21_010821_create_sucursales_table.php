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
        Schema::create('sucursal', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('ubigeo_id');
            $table->string('business_name');
            $table->string('phone')->nullable()->default(null);
            $table->string('address')->nullable()->default(null);
            $table->timestamps();

            $table->foreign('ubigeo_id')
                ->references('code')->on('ubigeo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sucursal');
    }
};
