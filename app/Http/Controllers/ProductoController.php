<?php

namespace App\Http\Controllers;

use App\Models\Producto;
use Illuminate\Http\Request;

// Para cada tabla de la base de datos debe haber un modelo y un controlador.
/*

php artisan make:model Producto
php artisan make:controller ProductoController

Todos los metodos del controlador deben ser publicos, para que se pueda acceder desde
el archivo de rutas.
*/

class ProductoController extends Controller
{
    // Retornamos la vista. El nombre debe ser primero el folder que la contiene y luego
    // el nombre del archivo sin las extensiones.
    public function index(){
        // Obtenemos los productos de la base de datos.
        $productos = Producto::all();

        // Se envia un parametro a la vista. Usando el identificador entre '' podemos
        // acceder a los datos en la vista.
        return view('producto.index', ['productos' => $productos]);
    }

    public function create() {
        return view('producto.create');
    }

    public function store(Request $request) {
        // Dentro de request se encuentran los datos posteados por el formulario.

        // Podemos agregar reglas de validacion para cada campo. En la documentacion
        // estan todas las posibles.
        $data = $request->validate([
            'nombre' => 'required',
            'descripcion' => 'required',
            'precio' => 'required|decimal:0,2',
            'impuesto' => 'required',
        ]);

        // Para insertar en la BD lo hacemos mediante el modelo.
        $newProduct = Producto::create($data);

        // Redireccionamos a la ventana principal.
        return redirect(route('producto.index'));
    }

    public function edit(Producto $producto) {
        dd($producto);
    }
}
