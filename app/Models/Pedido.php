<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'libro_id',
        'cantidad',
        'fecha_pedido',
        'proveedor_id',
        'estado',
    ];

    protected $table = 'pedidos';

    // Relación con el modelo Libro
    public function libro()
    {
        return $this->belongsTo(Libro::class);
    }

    // Relación con el modelo Proveedor
    public function proveedor()
    {
        return $this->belongsTo(Proveedor::class);
    }
}
