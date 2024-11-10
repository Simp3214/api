<?php

namespace App\Http\Controllers;

use App\Models\Proveedor;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class ProveedorController extends Controller
{
    // Mostrar todos los proveedores
    public function index()
    {
        $proveedores = Proveedor::with('editorial')->get();
        return response()->json($proveedores);
    }

    // Mostrar un proveedor específico
    public function show($id)
    {
        $proveedor = Proveedor::with('editorial')->findOrFail($id);
        return response()->json($proveedor);
    }

    // Crear un nuevo proveedor
    public function store(Request $request)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'editorial_id' => 'required|exists:editoriales,id',
        ]);

        $proveedor = Proveedor::create($request->all());
        return response()->json($proveedor, 201);
    }

    // Actualizar un proveedor existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'nombre' => 'required|string|max:255',
            'contacto' => 'required|string|max:255',
            'direccion' => 'required|string|max:255',
            'editorial_id' => 'required|exists:editoriales,id',
        ]);

        $proveedor = Proveedor::findOrFail($id);
        $proveedor->update($request->all());

        return response()->json($proveedor);
    }

    // Eliminar un proveedor
    public function destroy($id)
    {
        $proveedor = Proveedor::findOrFail($id);
        $proveedor->delete();

        return response()->json(['message' => 'Proveedor eliminado correctamente']);
    }
}
