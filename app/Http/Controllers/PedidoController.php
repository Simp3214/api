<?php

namespace App\Http\Controllers;

use App\Models\Pedido;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PedidoController extends Controller
{
    // Mostrar todos los pedidos
    public function index()
    {
        $pedidos = Pedido::with(['libro', 'proveedor'])->get();
        return response()->json($pedidos);
    }

    // Mostrar un pedido específico
    public function show($id)
    {
        $pedido = Pedido::with(['libro', 'proveedor'])->findOrFail($id);
        return response()->json($pedido);
    }

    // Crear un nuevo pedido
    public function store(Request $request)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'cantidad' => 'required|integer',
            'fecha_pedido' => 'required|date',
            'proveedor_id' => 'required|exists:proveedores,id',
            'estado' => 'required|in:pendiente,enviado,recibido',
        ]);

        $pedido = Pedido::create($request->all());
        return response()->json($pedido, 201);
    }

    // Actualizar un pedido existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'libro_id' => 'required|exists:libros,id',
            'cantidad' => 'required|integer',
            'fecha_pedido' => 'required|date',
            'proveedor_id' => 'required|exists:proveedores,id',
            'estado' => 'required|in:pendiente,enviado,recibido',
        ]);

        $pedido = Pedido::findOrFail($id);
        $pedido->update($request->all());

        return response()->json($pedido);
    }

    // Eliminar un pedido
    public function destroy($id)
    {
        $pedido = Pedido::findOrFail($id);
        $pedido->delete();

        return response()->json(['message' => 'Pedido eliminado correctamente']);
    }
}
