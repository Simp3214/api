<?php

namespace App\Http\Controllers;

use App\Models\Editorial;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class EditorialController extends Controller
{
    // Mostrar todas las editoriales
    public function index()
    {
        $editoriales = Editorial::all();
        return response()->json($editoriales);
    }

    // Mostrar una editorial específica
    public function show($id)
    {
        $editorial = Editorial::findOrFail($id);
        return response()->json($editorial);
    }

    // Crear una nueva editorial
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        $editorial = Editorial::create($request->all());
        return response()->json($editorial, 201);
    }

    // Actualizar una editorial existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'telefono' => 'required|string|max:15',
        ]);

        $editorial = Editorial::findOrFail($id);
        $editorial->update($request->all());

        return response()->json($editorial);
    }

    // Eliminar una editorial
    public function destroy($id)
    {
        $editorial = Editorial::findOrFail($id);
        $editorial->delete();

        return response()->json(['message' => 'Editorial eliminada correctamente']);
    }
}
