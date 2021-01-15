<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class turnos_rechazado extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_motivo',
        'id_usuario',
        'comentarios'
    ];
}
