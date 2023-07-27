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
            $table->string('lugar');
            $table->date('fecha');
            $table->integer('n_depositos');
            $table->integer('n_retiros');
            $table->float('val_prom_depositos');
            $table->float('val_prom_retiros');
            $table->string('origen_fondos');
            $table->string('comprobante_procedencia_fondo');
            $table->integer('id_cliente');
            $table->integer('id_cuenta');
            $table->foreign('id_cuenta')->references('id_cuenta')->on('cuentas');
            $table->foreign('id_cliente')->references('id_cliente')->on('clientes');
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
