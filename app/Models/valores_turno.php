<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class valores_turno extends Model
{
    use HasFactory;

    protected $fillable = [
        'valor'
    ];
}