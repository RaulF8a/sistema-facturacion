<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Producto;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    //
    public function index() {

    }

    public function create() {
        $productos = Producto::all();
        $clientes = Cliente::all();

        return view('factura.create', ['productos' => $productos, 'clientes' => $clientes]);
    }

    public function store(Request $request) {
        dd($request->all());
    }
}
