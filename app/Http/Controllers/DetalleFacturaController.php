<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;

class DetalleFacturaController extends Controller
{
    //
    public function index(Factura $factura) {
        $detalles = DetalleFactura::where('factura_id', $factura->id)->get();
        $productos = Producto::all();
        $cliente = Cliente::where('id', $factura->cliente_id)->first();

        return view('detalle.index', [
            'factura' => $factura,
            'detalles' => $detalles,
            'cliente' => $cliente,
            'productos' => $productos,
        ]);
    }
}
