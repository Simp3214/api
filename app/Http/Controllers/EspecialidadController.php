<?php

namespace App\Http\Controllers;

use App\Models\Especialidad;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EspecialidadController extends Controller
{
    // Mostrar todas las especialidades
    public function index()
    {
        $especialidades = Especialidad::all();
        return response()->json($especialidades);
    }

    // Mostrar una especialidad específica
    public function show($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        return response()->json($especialidad);
    }

    // Crear una nueva especialidad
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $especialidad = Especialidad::create($request->all());
        return response()->json($especialidad, 201);
    }

    // Actualizar una especialidad existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'descripcion' => 'nullable|string',
        ]);

        $especialidad = Especialidad::findOrFail($id);
        $especialidad->update($request->all());

        return response()->json($especialidad);
    }

    // Eliminar una especialidad
    public function destroy($id)
    {
        $especialidad = Especialidad::findOrFail($id);
        $especialidad->delete();

        return response()->json(['message' => 'Especialidad eliminada correctamente']);
    }
}
