<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ofertas_intercambio extends Model
{
    use HasFactory;


    protected $fillable = [
        'inercambio_id',
        'usuario_ofreciendo',
        'producto_ofrecido',
        'estado',
        'fecha',

    ];





}
