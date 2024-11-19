<?php

use App\Http\Controllers\ProductoController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    // Productos
    Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
    // Creamos un metodo POST para la misma ruta para reaccionar cuando se envia el formulario.
    Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
    // Podemos enviar parametros en las rutas colocandolos entre {}.
    Route::get('/producto/{producto}', [ProductoController::class, 'edit'])->name('producto.edit');
});
