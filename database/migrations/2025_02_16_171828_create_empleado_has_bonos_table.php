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
        Schema::create('empleado_has_bonos', function (Blueprint $table) {
            $table->unsignedBigInteger('bono_id');
            $table->unsignedBigInteger('persona_id');
            $table->timestamps();

            $table->foreign('bono_id')->references('id')->on('bonos')->onDelete('cascade');
            $table->foreign('persona_id')->references('persona_id')->on('empleados')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleado_has_bonos');
    }
};
