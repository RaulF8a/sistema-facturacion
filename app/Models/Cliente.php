<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cliente extends Model
{
    //
    use HasFactory;

    protected $table = 'clientes';
    protected $fillable = [
        'nombre',
        'rfc',
        'domicilio',
        'regimen',
        'telefono',
        'email',
        'empresa_id',
    ];
}
