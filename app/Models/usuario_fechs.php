<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class usuario_fechs extends Model
{
    use HasFactory;

    protected $fillable = [
        'id_usuario',
        'fecha'
    ];
}
