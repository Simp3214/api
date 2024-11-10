<?php

// app/Models/Empleado.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Empleado extends Model
{
    use HasFactory;

    // Definir los atributos que son asignables en masa
    protected $fillable = [
        'nombre',
        'role_id', // Cambiar 'rol' por 'role_id'
        'usuario_id',
    ];

    protected $table = 'empleados';

    // Relación con el modelo Usuario
    public function usuario()
    {
        return $this->belongsTo(Usuario::class);
    }

    // Relación con el modelo Role
    public function role()
    {
        return $this->belongsTo(Role::class, 'role_id');
    }
}

