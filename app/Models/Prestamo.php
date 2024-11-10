<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prestamo extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'libro_id',
        'usuario_id',
        'fecha_prestamo',
        'fecha_devolucion',
        'tipo',
        'estado',
    ];

    protected $table = 'prestamos';

    // Relación con el modelo Libro
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }
}
