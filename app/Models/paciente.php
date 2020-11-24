<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class paciente extends Model
{
    use HasFactory;

    protected $fillable = [
        'documento',
        'paciente',
        'fecha_nac',
        'domicilio',
        'telefono',
        'correo',
        'obra_social'
    ];
}
