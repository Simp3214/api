<?php

namespace App\Http\Controllers;

use App\Models\Autor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class AutorController extends Controller
{
    // Mostrar todos los autores
    public function index()
    {
        $autores = Autor::all();
        return response()->json($autores);
    }

    // Mostrar un autor específico
    public function show($id)
    {
        $autor = Autor::findOrFail($id);
        return response()->json($autor);
    }

    // Crear un nuevo autor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'biografia' => 'nullable|string',
        ]);

        $autor = Autor::create($request->all());
        return response()->json($autor, 201);
    }

    // Actualizar un autor existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'apellido' => 'required|string|max:255',
            'biografia' => 'nullable|string',
        ]);

        $autor = Autor::findOrFail($id);
        $autor->update($request->all());

        return response()->json($autor);
    }

    // Eliminar un autor
    public function destroy($id)
    {
        $autor = Autor::findOrFail($id);
        $autor->delete();

        return response()->json(['message' => 'Autor eliminado correctamente']);
    }
}
