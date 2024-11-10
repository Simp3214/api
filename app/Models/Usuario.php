<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Usuario extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre',
        'apellido',
        'email',
        'carrera',
        'estado',
    ];

    protected $table = 'usuarios';
    // Si es necesario, puedes agregar relaciones con otros modelos aquí
}
