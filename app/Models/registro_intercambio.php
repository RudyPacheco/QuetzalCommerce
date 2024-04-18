<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class registro_intercambio extends Model
{
    use HasFactory;

    protected $fillable = [
        'inercambio_id',
        'usuario_intercambio',
        'usuario_ofertante',
        'producto_ofrecido_id',
        'producto_ofertado_id',
        'fecha',

    ];


}
