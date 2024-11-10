<?php

namespace App\Http\Controllers;

use App\Models\Libro;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LibroController extends Controller
{
    // Mostrar todos los libros
    public function index()
    {
        $libros = Libro::with(['autor', 'editorial', 'categoria', 'especialidad'])->get();
        return response()->json($libros);
    }

    // Mostrar un libro específico
    public function show($id)
    {
        $libro = Libro::with(['autor', 'editorial', 'categoria', 'especialidad'])->findOrFail($id);
        return response()->json($libro);
    }

    // Crear un nuevo libro
    public function store(Request $request)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'editorial_id' => 'required|exists:editoriales,id',
            'categoria_id' => 'required|exists:categorias,id',
            'especialidad_id' => 'required|exists:especialidades,id',
            'cantidad' => 'required|integer',
            'cantidad_minima' => 'required|integer',
            'cantidad_maxima' => 'required|integer',
            'descripcion' => 'nullable|string',
            'isbn' => 'required|string|unique:libros,isbn',
        ]);

        $libro = Libro::create($request->all());
        return response()->json($libro, 201);
    }

    // Actualizar un libro existente
    public function update(Request $request, $id)
    {
        $request->validate([
            'titulo' => 'required|string|max:255',
            'autor_id' => 'required|exists:autores,id',
            'editorial_id' => 'required|exists:editoriales,id',
            'categoria_id' => 'required|exists:categorias,id',
            'especialidad_id' => 'required|exists:especialidades,id',
            'cantidad' => 'required|integer',
            'cantidad_minima' => 'required|integer',
            'cantidad_maxima' => 'required|integer',
            'descripcion' => 'nullable|string',
            'isbn' => 'required|string|unique:libros,isbn,' . $id,
        ]);

        $libro = Libro::findOrFail($id);
        $libro->update($request->all());

        return response()->json($libro);
    }

    // Eliminar un libro
    public function destroy($id)
    {
        $libro = Libro::findOrFail($id);
        $libro->delete();

        return response()->json(['message' => 'Libro eliminado correctamente']);
    }
}
