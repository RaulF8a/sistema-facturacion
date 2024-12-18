<?php

namespace App\Http\Controllers;

use App\Models\Cliente;
use Auth;
use Illuminate\Http\Request;

class ClienteController extends Controller
{
    public function index(){
        $clientes = Cliente::where('empresa_id', auth()->id())->get();

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

    public function edit(Cliente $cliente) {
        return view('cliente.edit', ['cliente' => $cliente]);
    }

    public function update(Cliente $cliente, Request $request) {
        $data = $request->validate([
            'nombre' => 'required',
            'rfc' => 'required',
            'domicilio' => 'required',
            'regimen' => 'required',
            'telefono' => 'required',
            'email' => 'required',
        ]);

        $data['empresa_id'] = auth()->id();

        $cliente->update($data);

        return redirect(route('cliente.index'))
        ->with('success', 'ok');
    }

    public function remove(Cliente $cliente) {
        $cliente->delete();

        return redirect(route('cliente.index'))
        ->with('success', 'ok');
    }
}
