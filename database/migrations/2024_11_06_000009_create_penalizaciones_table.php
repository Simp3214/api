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
        Schema::create('penalizaciones', function (Blueprint $table) {
            $table->id();
$table->foreignId('usuario_id')->constrained('usuarios');
$table->foreignId('prestamo_id')->constrained('prestamos');
$table->decimal('monto', 8, 2);
$table->enum('estado', ['pendiente', 'pagado']);
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('penalizaciones');
    }
};
