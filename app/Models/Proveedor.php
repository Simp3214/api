<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Proveedor extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre',
        'contacto',
        'direccion',
        'editorial_id',
    ];

    protected $table = 'proveedores';

    // Relación con el modelo Editorial
    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }
}
