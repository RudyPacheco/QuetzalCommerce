<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class asistencia_voluntariado extends Model
{
    use HasFactory;


    protected $fillable = [
        'usuario_id',
        'voluntariado_id',
        'fecha',


    ];




}
