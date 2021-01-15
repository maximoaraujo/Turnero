<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rechazo_motivo extends Model
{
    use HasFactory;

    protected $fillable = [
        'motivo'
    ];
}
