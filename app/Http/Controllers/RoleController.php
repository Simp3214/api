<?php

// app/Http/Controllers/RoleController.php

namespace App\Http\Controllers;

use App\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    // Mostrar todos los roles
    public function index()
    {
        return response()->json(Role::all());
    }

    // Crear un nuevo rol
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
        ]);

        $role = Role::create([
            'nombre' => $request->nombre,
        ]);

        return response()->json($role, 201);
    }
}
