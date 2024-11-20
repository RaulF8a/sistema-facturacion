<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Factura extends Model
{
    //
    protected $table = 'facturas';
    protected $fillable = [
        'folio',
        'fecha',
        'metodo_pago',
        'subtotal',
        'total',
        'empresa_id',
        'cliente_id',
    ];
}
