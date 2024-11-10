<?php

// app/Models/Role.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // Relación inversa con Empleado
    public function empleados()
    {
        return $this->hasMany(Empleado::class);
    }
}
