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
        Schema::create('otras_deducciones', function (Blueprint $table) {
            $table->id();
            $table->string('descripcion', 100);
            $table->string('tipo', 10);
            $table->float('valor');

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('otras_deducciones');
    }
};
