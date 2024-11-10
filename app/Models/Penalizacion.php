<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penalizacion extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'usuario_id',
        'prestamo_id',
        'monto',
        'estado',
    ];

    protected $table = 'penalizaciones';

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con el modelo Prestamo
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
