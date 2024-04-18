<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class venta_realizada extends Model
{
    use HasFactory;


    protected $fillable = [
        'fecha',
        'usuario_vendedor',
        'usuario_comprador',
        'cantidad',
        'producto_id',
        'precio_total',


    ];




}
