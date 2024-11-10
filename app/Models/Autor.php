<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Autor extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre', 
        'apellido', 
        'biografia',
    ];

    // Especifica el nombre correcto de la tabla
    protected $table = 'autores';  // Agrega esta línea

    // Si deseas, puedes agregar relaciones con otros modelos aquí (por ejemplo, libros)
}
