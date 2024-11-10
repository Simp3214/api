<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Especialidad extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre',
        'descripcion',
    ];

    protected $table = 'especialidades';
    // Si es necesario, puedes agregar relaciones con otros modelos aquí (por ejemplo, libros)
}
