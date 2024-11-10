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
        Schema::create('prestamos', function (Blueprint $table) {
            $table->id();
$table->foreignId('libro_id')->constrained('libros');
$table->foreignId('usuario_id')->constrained('usuarios');
$table->date('fecha_prestamo');
$table->date('fecha_devolucion');
$table->enum('tipo', ['interno', 'externo']);
$table->enum('estado', ['activo', 'renovado', 'finalizado']);
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('prestamos');
    }
};
