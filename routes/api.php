<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\EditorialController;
use App\Http\Controllers\CategoriaController;
use App\Http\Controllers\EspecialidadController;
use App\Http\Controllers\LibroController;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\PrestamoController;
use App\Http\Controllers\PagoController;
use App\Http\Controllers\PenalizacionController;
use App\Http\Controllers\EmpleadoController;
use App\Http\Controllers\ProveedorController;
use App\Http\Controllers\PedidoController;
use App\Http\Controllers\ReporteController;
use App\Http\Controllers\AuthController;


// Autores
Route::get('autores', [AutorController::class, 'index']);
Route::get('autores/{id}', [AutorController::class, 'show']);
Route::post('autores/store', [AutorController::class, 'store']);  // Cambié a 'store'
Route::put('autores/update/{id}', [AutorController::class, 'update']);  // Cambié a 'update'
Route::delete('autores/delete/{id}', [AutorController::class, 'destroy']);  // Cambié a 'delete'

// Editoriales
Route::get('editoriales', [EditorialController::class, 'index']);
Route::get('editoriales/{id}', [EditorialController::class, 'show']);
Route::post('editoriales/store', [EditorialController::class, 'store']);  // Cambié a 'store'
Route::put('editoriales/update/{id}', [EditorialController::class, 'update']);  // Cambié a 'update'
Route::delete('editoriales/delete/{id}', [EditorialController::class, 'destroy']);  // Cambié a 'delete'

// Categorías
Route::get('categorias', [CategoriaController::class, 'index']);
Route::get('categorias/{id}', [CategoriaController::class, 'show']);
Route::post('categorias/store', [CategoriaController::class, 'store']);  // Cambié a 'store'
Route::put('categorias/update/{id}', [CategoriaController::class, 'update']);  // Cambié a 'update'
Route::delete('categorias/delete/{id}', [CategoriaController::class, 'destroy']);  // Cambié a 'delete'

// Especialidades
Route::get('especialidades', [EspecialidadController::class, 'index']);
Route::get('especialidades/{id}', [EspecialidadController::class, 'show']);
Route::post('especialidades/store', [EspecialidadController::class, 'store']);  // Cambié a 'store'
Route::put('especialidades/update/{id}', [EspecialidadController::class, 'update']);  // Cambié a 'update'
Route::delete('especialidades/delete/{id}', [EspecialidadController::class, 'destroy']);  // Cambié a 'delete'

// Libros
Route::get('libros', [LibroController::class, 'index']);
Route::get('libros/{id}', [LibroController::class, 'show']);
Route::post('libros/store', [LibroController::class, 'store']);  // Cambié a 'store'
Route::put('libros/update/{id}', [LibroController::class, 'update']);  // Cambié a 'update'
Route::delete('libros/delete/{id}', [LibroController::class, 'destroy']);  // Cambié a 'delete'

// Usuarios
Route::get('usuarios', [UsuarioController::class, 'index']);
Route::get('usuarios/{id}', [UsuarioController::class, 'show']);
Route::post('usuarios/store', [UsuarioController::class, 'store']);  // Cambié a 'store'
Route::put('usuarios/update/{id}', [UsuarioController::class, 'update']);  // Cambié a 'update'
Route::delete('usuarios/delete/{id}', [UsuarioController::class, 'destroy']);  // Cambié a 'delete'
Route::get('usuarios/insolventes', [UsuarioController::class, 'insolventes']);  // Para usuarios insolventes

// Préstamos
Route::post('prestamos/store', [PrestamoController::class, 'store']);  // Cambié a 'store'
Route::put('prestamos/renovar/{id}', [PrestamoController::class, 'renovar']);  // Cambié a 'renovar'
Route::get('prestamos', [PrestamoController::class, 'index']);
Route::get('prestamos/comprobante/{id}', [PrestamoController::class, 'comprobante']);  // Cambié a 'comprobante'

// Pagos
Route::post('pagos/store', [PagoController::class, 'store']);  // Cambié a 'store'


// Penalizaciones
Route::get('penalizaciones', [PenalizacionController::class, 'index']);  // Consultar penalizaciones

// Gestión de inventario
Route::get('inventario', [PedidoController::class, 'inventario']);  // Consultar inventario
Route::post('inventario/pedidos/store', [PedidoController::class, 'store']);  // Cambié a 'store'

// Proveedores
Route::get('proveedores', [ProveedorController::class, 'index']);  // Consultar proveedores

// Reportes
Route::get('reportes/libros', [ReporteController::class, 'libros']);  // Reporte de libros
Route::get('reportes/proveedores', [ReporteController::class, 'proveedores']);  // Reporte de proveedores
Route::get('reportes/compras', [ReporteController::class, 'compras']);  // Reporte de compras de los últimos meses
Route::get('reportes/mas-prestados', [ReporteController::class, 'masPrestados']);  // Reporte de libros más prestados
Route::get('reportes/libro-mes', [ReporteController::class, 'libroMes']);  // Reporte del libro del mes

// 
Route::get('empleados', [EmpleadoController::class, 'index']); // Obtener todos los empleados
    Route::get('empleados/{id}', [EmpleadoController::class, 'show']); // Obtener un empleado específico
    Route::post('empleados/store', [EmpleadoController::class, 'store']); // Crear un nuevo empleado
    Route::put('empleados/update/{id}', [EmpleadoController::class, 'update']); // Actualizar un empleado
    Route::delete('empleados/delete/{id}', [EmpleadoController::class, 'destroy']); // Eliminar un empleado


