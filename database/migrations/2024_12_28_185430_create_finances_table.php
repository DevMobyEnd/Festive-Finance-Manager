<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
    {
        Schema::create('finances', function (Blueprint $table) {
            $table->id();
            $table->date('date'); // Fecha de la transacción
            $table->string('type'); // 'Ingreso' o 'Egreso'
            $table->string('reason'); // Motivo
            $table->decimal('amount', 10, 2); // Monto
            $table->timestamps(); // Fechas de creación y actualización
        });
    }


    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('finances');
    }
};
