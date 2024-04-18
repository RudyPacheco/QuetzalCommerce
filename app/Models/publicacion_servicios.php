<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class publicacion_servicios extends Model
{
    use HasFactory;

    protected $fillable = [
        'nombre',
        'descripcion',
        'precio',
        'imagen',
        'user_propietario',


    ];





    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }



}
