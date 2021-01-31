<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnos_practica extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_turno',
        'obra_social_id',
        'id_practica',
        'cantidad'
    ];
}
