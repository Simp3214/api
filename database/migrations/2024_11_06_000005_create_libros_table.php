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
        Schema::create('libros', function (Blueprint $table) {
            $table->id();
$table->string('titulo');
$table->foreignId('autor_id')->constrained('autores');
$table->foreignId('editorial_id')->constrained('editoriales');
$table->foreignId('categoria_id')->constrained('categorias');
$table->foreignId('especialidad_id')->constrained('especialidades');
$table->integer('cantidad');
$table->integer('cantidad_minima');
$table->integer('cantidad_maxima');
$table->text('descripcion');
$table->string('isbn')->unique();
$table->timestamps();

        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('libros');
    }
};
