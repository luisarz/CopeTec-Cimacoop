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
        Schema::create('partida_contables', function (Blueprint $table) {
            $table->id();
            $table->int('codigo');
            $table->string('nombre_cuenta');
            $table->string('tipo_cuenta');
            $table->boolval('movimiento');
            $table->float('saldo');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('partida_contables');
    }
};
