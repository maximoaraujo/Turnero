<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class pacientes_turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_turno',
        'id', 
        'letra',
        'fecha',
        'id_horario',
        'documento',
        'id_usuario',
        'fecha_hora',
        'para',
        'asistio',
        'comentarios',
        'situacion'
    ];
}
