<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UsuarioController extends Controller
{
    // Mostrar todos los usuarios
    public function index()
    {
        $usuarios = Usuario::all();
        return response()->json($usuarios);
    }

    // Mostrar un usuario específico
    public function show($id)
    {
        $usuario = Usuario::findOrFail($id);
        return response()->json($usuario);
    }

    // Crear un nuevo usuario
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email',
            'carrera' => 'required|string|max:255',
            'estado' => 'required|in:solvente,insolvente',
        ]);

        $usuario = Usuario::create($request->all());
        return response()->json($usuario, 201);
    }

    // Actualizar un usuario existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'email' => 'required|email|unique:usuarios,email,' . $id,
            'carrera' => 'required|string|max:255',
            'estado' => 'required|in:solvente,insolvente',
        ]);

        $usuario = Usuario::findOrFail($id);
        $usuario->update($request->all());

        return response()->json($usuario);
    }

    // Eliminar un usuario
    public function destroy($id)
    {
        $usuario = Usuario::findOrFail($id);
        $usuario->delete();

        return response()->json(['message' => 'Usuario eliminado correctamente']);
    }
}
