<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Libro extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'titulo',
        'autor_id',
        'editorial_id',
        'categoria_id',
        'especialidad_id',
        'cantidad',
        'cantidad_minima',
        'cantidad_maxima',
        'descripcion',
        'isbn',
    ];

    protected $table = 'libros';

    // Definir las relaciones con otros modelos
    public function autor()
    {
        return $this->belongsTo(Autor::class);
    }

    public function editorial()
    {
        return $this->belongsTo(Editorial::class);
    }

    public function categoria()
    {
        return $this->belongsTo(Categoria::class);
    }

    public function especialidad()
    {
        return $this->belongsTo(Especialidad::class);
    }
}
