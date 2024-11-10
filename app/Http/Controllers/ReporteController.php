<?php

namespace App\Http\Controllers;

use App\Models\Reporte;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ReporteController extends Controller
{
    // Mostrar todos los reportes
    public function index()
    {
        $reportes = Reporte::all();
        return response()->json($reportes);
    }

    // Mostrar un reporte específico
    public function show($id)
    {
        $reporte = Reporte::findOrFail($id);
        return response()->json($reporte);
    }

    // Crear un nuevo reporte
    public function store(Request $request)
    {
        $request->validate([
            'tipo_reporte' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_generacion' => 'required|date',
        ]);

        $reporte = Reporte::create($request->all());
        return response()->json($reporte, 201);
    }

    // Actualizar un reporte existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'tipo_reporte' => 'required|string|max:255',
            'contenido' => 'required|string',
            'fecha_generacion' => 'required|date',
        ]);

        $reporte = Reporte::findOrFail($id);
        $reporte->update($request->all());

        return response()->json($reporte);
    }

    // Eliminar un reporte
    public function destroy($id)
    {
        $reporte = Reporte::findOrFail($id);
        $reporte->delete();

        return response()->json(['message' => 'Reporte eliminado correctamente']);
    }
}
