<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PublicacionVenta extends Model
{
    use HasFactory;



    protected $fillable = [
        'nombre',
        'estado_producto',
        'precio',
        'categoria',
        'cantidad',
        'descripcion',
        'user_propietario',
        'estado_publicacion',
        'imagen',
        'estado_disponibilidad'

    ];


    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }

}
