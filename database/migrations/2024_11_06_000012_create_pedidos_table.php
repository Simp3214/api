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
        Schema::create('pedidos', function (Blueprint $table) {
            $table->id();
$table->foreignId('libro_id')->constrained('libros');
$table->integer('cantidad');
$table->date('fecha_pedido');
$table->foreignId('proveedor_id')->constrained('proveedores');
$table->enum('estado', ['pendiente', 'enviado', 'recibido']);
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('pedidos');
    }
};