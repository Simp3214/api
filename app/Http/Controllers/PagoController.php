<?php

namespace App\Http\Controllers;

use App\Models\Pago;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PagoController extends Controller
{
    // Mostrar todos los pagos
    public function index()
    {
        $pagos = Pago::with('prestamo')->get();
        return response()->json($pagos);
    }

    // Mostrar un pago específico
    public function show($id)
    {
        $pago = Pago::with('prestamo')->findOrFail($id);
        return response()->json($pago);
    }

    // Crear un nuevo pago
    public function store(Request $request)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'monto' => 'required|numeric|min:0',
            'tipo_pago' => 'required|in:hora,dia,semana',
            'estado' => 'required|in:pendiente,pagado',
        ]);

        $pago = Pago::create($request->all());
        return response()->json($pago, 201);
    }

    // Actualizar un pago existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'prestamo_id' => 'required|exists:prestamos,id',
            'monto' => 'required|numeric|min:0',
            'tipo_pago' => 'required|in:hora,dia,semana',
            'estado' => 'required|in:pendiente,pagado',
        ]);

        $pago = Pago::findOrFail($id);
        $pago->update($request->all());

        return response()->json($pago);
    }

    // Eliminar un pago
    public function destroy($id)
    {
        $pago = Pago::findOrFail($id);
        $pago->delete();

        return response()->json(['message' => 'Pago eliminado correctamente']);
    }
}
