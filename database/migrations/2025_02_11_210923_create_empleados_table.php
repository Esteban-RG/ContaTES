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
        Schema::create('empleados', function (Blueprint $table) {
            $table->id();
            $table->date('fecha_ingreso');
            $table->unsignedBigInteger('plaza_id');
            $table->string('curp'); 
            $table->string('rfc'); 
            $table->string('nss'); 
            $table->unsignedBigInteger('persona_id'); 
            $table->timestamps(); 

            // Definir las claves foráneas
            $table->foreign('plaza_id')->references('id')->on('plazas')->onDelete('cascade');
            $table->foreign('persona_id')->references('id')->on('personas')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('empleados');
    }
};
