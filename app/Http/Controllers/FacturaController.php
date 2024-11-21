<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use App\Models\DetalleFactura;
use App\Models\Factura;
use App\Models\Producto;
use Illuminate\Http\Request;

class FacturaController extends Controller
{
    //
    private function generateRandomString() {
        // Generate two random uppercase letters
        $letters = '';
        for ($i = 0; $i < 2; $i++) {
            $letters .= chr(random_int(65, 90)); // ASCII range for A-Z
        }

        // Generate three random digits
        $digits = str_pad(random_int(0, 999), 3, '0', STR_PAD_LEFT);

        // Combine them in the format AB123
        return $letters . $digits;
    }

    public function index() {

    }

    public function create() {
        $productos = Producto::all();
        $clientes = Cliente::all();

        return view('factura.create', ['productos' => $productos, 'clientes' => $clientes]);
    }

    public function store(Request $request) {
        // dd($request->all());

        $data = $request->validate([
            'fecha' => 'required',
            'cliente_id' => 'required',
            'total' => 'required|decimal:0,2',
        ]);

        $data['empresa_id'] = auth()->id();
        $data['folio'] = $this->generateRandomString();
        $data['subtotal'] = 0;
        $data['metodo_pago'] = '';

        $newFactura = Factura::create($data);

        $newId = $newFactura->id;

        $productos = json_decode($request->input('selected_products'));

        foreach($productos as $producto) {
            DetalleFactura::create([
                'factura_id' => $newId,
                'producto_id' => $producto->producto_id,
                'cantidad' => $producto->cantidad,
                'total' => $producto->total,
            ]);
        }

        return redirect(route('dashboard'));
    }
}
