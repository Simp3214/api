<?php

namespace App\Http\Controllers;

use App\Models\Penalizacion;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PenalizacionController extends Controller
{
    // Mostrar todas las penalizaciones
    public function index()
    {
        $penalizaciones = Penalizacion::with('usuario', 'prestamo')->get();
        return response()->json($penalizaciones);
    }

    // Mostrar una penalización específica
    public function show($id)
    {
        $penalizacion = Penalizacion::with('usuario', 'prestamo')->findOrFail($id);
        return response()->json($penalizacion);
    }

    // Crear una nueva penalización
    public function store(Request $request)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'prestamo_id' => 'required|exists:prestamos,id',
            'monto' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,pagado',
        ]);

        $penalizacion = Penalizacion::create($request->all());
        return response()->json($penalizacion, 201);
    }

    // Actualizar una penalización existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'usuario_id' => 'required|exists:usuarios,id',
            'prestamo_id' => 'required|exists:prestamos,id',
            'monto' => 'required|numeric|min:0',
            'estado' => 'required|in:pendiente,pagado',
        ]);

        $penalizacion = Penalizacion::findOrFail($id);
        $penalizacion->update($request->all());

        return response()->json($penalizacion);
    }

    // Eliminar una penalización
    public function destroy($id)
    {
        $penalizacion = Penalizacion::findOrFail($id);
        $penalizacion->delete();

        return response()->json(['message' => 'Penalización eliminada correctamente']);
    }
}
