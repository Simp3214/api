<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pago extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'prestamo_id',
        'monto',
        'tipo_pago',
        'estado',
    ];

    protected $table = 'pagos';

    // Relación con el modelo Prestamo
    public function prestamo()
    {
        return $this->belongsTo(Prestamo::class);
    }
}
