<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class voluntariados extends Model
{
    use HasFactory;

    protected $fillable = [
        'titulo',
        'detalles',
        'fecha',
        'imagen',
        'usuario_promotor',

    ];




    public function getImagenUrlAttribute()
    {
        return asset('storage/' . $this->imagen);
    }

}
