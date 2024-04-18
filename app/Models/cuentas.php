<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class cuentas extends Model
{
    use HasFactory;


    protected $fillable = [
        'usuario_id',
        'monto_ventas',
        'monto_otros',
        'categoria',
        'cantidad',
        'descripcion',
        'user_propietario',
        'estado_publicacion',
        'imagen'

    ];




}
