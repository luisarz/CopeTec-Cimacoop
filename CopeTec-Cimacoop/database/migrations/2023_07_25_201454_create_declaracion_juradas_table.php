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
        Schema::create('declaracion_juradas', function (Blueprint $table) {
            $table->id('declaracion_id');
            $table->string('origen_fondos');
            $table->string('comprobante_procedencia_fondo');
            $table->string('lugar');
            $table->date('fecha')
            $table->unsignedBigInteger('id_cliente');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
            $table->unsignedBigInteger('id_cuenta');
            $table->foreign('id_cuenta')->references('id_cuenta')->on('clientes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('declaracion_juradas');
    }
};
