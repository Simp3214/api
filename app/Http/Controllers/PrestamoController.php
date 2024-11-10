<?php

namespace App\Http\Controllers;

use App\Models\Prestamo;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PrestamoController extends Controller
{
    // Mostrar todos los prestamos
    public function index()
    {
        $prestamos = Prestamo::with('libro', 'usuario')->get();
        return response()->json($prestamos);
    }

    // Mostrar un prestamo específico
    public function show($id)
    {
        $prestamo = Prestamo::with('libro', 'usuario')->findOrFail($id);
        return response()->json($prestamo);
    }

    // Crear un nuevo prestamo
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'tipo' => 'required|in:interno,externo',
            'estado' => 'required|in:activo,renovado,finalizado',
        ]);

        $prestamo = Prestamo::create($request->all());
        return response()->json($prestamo, 201);
    }

    // Actualizar un prestamo existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'usuario_id' => 'required|exists:usuarios,id',
            'fecha_prestamo' => 'required|date',
            'fecha_devolucion' => 'required|date',
            'tipo' => 'required|in:interno,externo',
            'estado' => 'required|in:activo,renovado,finalizado',
        ]);

        $prestamo = Prestamo::findOrFail($id);
        $prestamo->update($request->all());

        return response()->json($prestamo);
    }

    // Eliminar un prestamo
    public function destroy($id)
    {
        $prestamo = Prestamo::findOrFail($id);
        $prestamo->delete();

        return response()->json(['message' => 'Prestamo eliminado correctamente']);
    }
}
