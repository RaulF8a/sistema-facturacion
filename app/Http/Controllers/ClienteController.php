<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::all();

        return view('cliente.index', ['clientes' => $clientes]);
    }

    public function create() {
        return view('cliente.create');
    }

    public function store(Request $request) {
        $data = $request->validate([
            'nombre' => 'required',
            'rfc' => 'required',
            'domicilio' => 'required',
            'regimen' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        $data['empresa_id'] = auth()->id();

        // Para insertar en la BD lo hacemos mediante el modelo.
        $newClient = Cliente::create($data);

        // Redireccionamos a la ventana principal.
        return redirect(route('cliente.index'));
    }
}
