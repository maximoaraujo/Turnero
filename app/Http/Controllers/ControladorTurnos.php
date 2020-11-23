<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horarios_estudio;
use App\Models\horario;
use App\Models\config;
use App\Models\pacientes_turno;

class ControladorTurnos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function general()
    {        
        $horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')
        ->orderBy('horarios.horario')
        ->get();

        $cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();

        return view('turnos.general', compact('horarios', 'cantidad_turnos'));
    }
}
