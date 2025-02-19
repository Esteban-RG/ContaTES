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
        Schema::create('tarifa_isr', function (Blueprint $table) {
            $table->id();
            $table->float('limite_inferior')->nullable();
            $table->float('limite_superior')->nullable();
            $table->float('cuota_fija')->nullable();
            $table->float('porcentaje_aplicable')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('tarifa_isr');
    }
};
