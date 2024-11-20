<?php

use App\Http\Controllers\ClienteController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\FacturaController;
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
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    // Productos
    Route::get('/producto', [ProductoController::class, 'index'])->name('producto.index');
    Route::get('/producto/create', [ProductoController::class, 'create'])->name('producto.create');
    // Creamos un metodo POST para la misma ruta para reaccionar cuando se envia el formulario.
    Route::post('/producto', [ProductoController::class, 'store'])->name('producto.store');
    // Podemos enviar parametros en las rutas colocandolos entre {}.
    Route::get('/producto/{producto}/edit', [ProductoController::class, 'edit'])->name('producto.edit');
    Route::put('/producto/{producto}/update', [ProductoController::class, 'update'])->name('producto.update');
    Route::delete('/producto/{producto}/remove', [ProductoController::class, 'remove'])->name('producto.remove');

    // Clientes
    Route::get('/cliente', [ClienteController::class, 'index'])->name('cliente.index');
    Route::get('/cliente/create', [ClienteController::class, 'create'])->name('cliente.create');
    Route::post('/cliente', [ClienteController::class, 'store'])->name('cliente.store');
    Route::get('/cliente/{cliente}/edit', [ClienteController::class, 'edit'])->name('cliente.edit');
    Route::put('/cliente/{cliente}/update', [ClienteController::class, 'update'])->name('cliente.update');
    Route::delete('/cliente/{cliente}/remove', [ClienteController::class, 'remove'])->name('cliente.remove');

    // Factura
    Route::get('/factura/create', [FacturaController::class, 'create'])->name('factura.create');
    Route::post('/factura', [FacturaController::class, 'store'])->name('factura.store');
});
