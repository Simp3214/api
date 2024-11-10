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
        Schema::table('empleados', function (Blueprint $table) {
            $table->dropColumn('rol'); // Eliminar el campo rol
            $table->foreignId('role_id')->constrained('roles'); // Agregar la relación con la tabla roles
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('empleados', function (Blueprint $table) {
            $table->string('rol'); // Si deseas revertir, vuelve a agregar el campo rol
            $table->dropForeign(['role_id']); // Eliminar la relación con roles
        });
    }
};
