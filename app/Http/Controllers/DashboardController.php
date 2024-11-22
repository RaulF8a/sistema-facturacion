<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\Factura;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $facturas = Factura::where('empresa_id', auth()->id())->get();
        $clientes = Cliente::where('empresa_id', auth()->id())->get();

        return view('dashboard', ['facturas' => $facturas, 'clientes' => $clientes]);
    }
}
