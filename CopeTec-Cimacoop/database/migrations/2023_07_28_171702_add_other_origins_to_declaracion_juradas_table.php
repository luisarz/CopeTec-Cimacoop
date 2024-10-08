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
        Schema::table('declaracion_juradas', function (Blueprint $table) {
            $table->string('otro_origen_fondos')->nullable();
            $table->string('otro_comprobante_fondos')->nullable();
            $table->string('comprobante_procedencia_fondo')->nullable()->change();
            $table->string('depo_tipo');
            $table->string('ret_tipo');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('declaracion_juradas', function (Blueprint $table) {
            $table->dropColumn('otro_origen_fondos');
            $table->dropColumn('otro_comprobante_fondos');
            $table->dropColumn('depo_tipo');
            $table->dropColumn('ret_tipo');
        });
    }
};
