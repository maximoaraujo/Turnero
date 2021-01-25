<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnos_practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_turno',
        'id_obra_social',
        'id_practica',
        'cantidad'
    ];
}
