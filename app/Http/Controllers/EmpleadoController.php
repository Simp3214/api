<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use Illuminate\Http\Request;

class EmpleadoController extends Controller
{
    // Mostrar todos los empleados
    public function index()
    {
        $empleados = Empleado::with('usuario')->get();
        return response()->json($empleados);
    }

    // Mostrar un empleado específico
    public function show($id)
    {
        $empleado = Empleado::with('usuario')->findOrFail($id);
        return response()->json($empleado);
    }

    // Crear un nuevo empleado
    public function store(Request $request)
    {
        // Validación de datos, incluyendo los roles permitidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|in:admin,librarian,attendant', // Roles específicos
            'usuario_id' => 'required|exists:usuarios,id', // Asegurarse de que el usuario exista
        ]);

        // Crear el nuevo empleado
        $empleado = Empleado::create([
            'nombre' => $request->nombre,
            'rol' => $request->rol,
            'usuario_id' => $request->usuario_id,
        ]);

        return response()->json($empleado, 201); // Responder con el empleado creado y un código HTTP 201
    }

    // Actualizar un empleado existente
    public function update(Request $request, $id)
    {
        // Validación de datos, asegurando que los roles sean válidos
        $request->validate([
            'nombre' => 'required|string|max:255',
            'rol' => 'required|in:admin,librarian,attendant', // Roles específicos
            'usuario_id' => 'required|exists:usuarios,id',
        ]);

        // Buscar al empleado y actualizar
        $empleado = Empleado::findOrFail($id);
        $empleado->update([
            'nombre' => $request->nombre,
            'rol' => $request->rol,
            'usuario_id' => $request->usuario_id,
        ]);

        return response()->json($empleado); // Responder con el empleado actualizado
    }

    // Eliminar un empleado
    public function destroy($id)
    {
        // Buscar y eliminar el empleado
        $empleado = Empleado::findOrFail($id);
        $empleado->delete();

        return response()->json(['message' => 'Empleado eliminado correctamente'], 200); // Responder con mensaje de éxito
    }
}
