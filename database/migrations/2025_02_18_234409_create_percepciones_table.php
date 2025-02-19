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
        Schema::create('percepciones', function (Blueprint $table) {
            $table->id();
            $table->string('nombre');
            $table->float('valor');
            $table->unsignedBigInteger('nomina_id');
            $table->timestamps();


            $table->foreign('nomina_id')->references('id')->on('nominas')->onDelete('cascade');

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('percepciones');
    }
};
