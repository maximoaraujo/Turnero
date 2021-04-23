<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnos_eliminado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_turno',
        'num',
        'letra',
        'fecha',
        'id_horario',
        'documento',
		'user_id'
    ];
}
