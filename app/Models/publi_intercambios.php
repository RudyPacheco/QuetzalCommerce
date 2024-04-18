<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publi_intercambios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'detalles',
        'categoria',
        'imagen',
        'usuario_propietario',
        'objeto_busqueda',

    ];




    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }

}
