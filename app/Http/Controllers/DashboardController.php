<?php

namespace App\Http\Controllers;

use App\Models\Factura;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index() {
        $facturas = Factura::all();

        return view('dashboard', ['facturas' => $facturas]);
    }
}
