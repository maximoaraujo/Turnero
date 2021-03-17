<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use DB;
use App\Models\horario;
use App\Models\pacientes_turno;
use Carbon\Carbon;

class TurnosRestantesController extends Controller
{
    public function index($id_horario)
    {
        $fecha = date('Y-m-d');

        $fechaHora = Carbon::now();

        $horarios = horario::join('horarios_estudios', 'horarios.id_horario', 'horarios_estudios.id_horario')
        ->select('horarios.id_horario', 'horarios.horario')
        ->where('horarios_estudios.estudio', 'generales')->orderBy('horarios.horario')->get();

        $pacientes = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->select('pacientes_turnos.id_horario', 'pacientes_turnos.id', 'pacientes.paciente', 'pacientes_turnos.situacion', 'pacientes_turnos.asistio', 'pacientes_turnos.updated_at')
        ->where('pacientes_turnos.fecha', $fecha)->where(function ($query) {
            $query->where('pacientes_turnos.para', '=', 'general')
            ->orWhere('pacientes_turnos.para', '=', 'P75')
            ->orWhere('pacientes_turnos.para', '=', 'dengue');
        })
        ->where('pacientes_turnos.id_horario', $id_horario)
        ->orderBy('horarios.horario')->get();

        $esperando = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->select('pacientes_turnos.id_horario', 'pacientes_turnos.id', 'pacientes.paciente', 'pacientes_turnos.situacion', 'pacientes_turnos.asistio', 'pacientes_turnos.updated_at')
        ->where('pacientes_turnos.fecha', $fecha)->where(function ($query) {
            $query->where('pacientes_turnos.para', '=', 'general')
            ->orWhere('pacientes_turnos.para', '=', 'P75')
            ->orWhere('pacientes_turnos.para', '=', 'dengue');
        })
        ->where(function ($query) {
            $query->where('pacientes_turnos.situacion', '=', 'paso')
            ->orWhere('pacientes_turnos.situacion', '=', 'garage');
        })    
        ->where('pacientes_turnos.asistio', 'no')
        ->where('pacientes_turnos.id_horario', $id_horario)
        ->orderBy('horarios.horario')->get()->count();

        $atendidos = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->select('pacientes_turnos.id_horario', 'pacientes_turnos.id', 'pacientes.paciente', 'pacientes_turnos.situacion', 'pacientes_turnos.asistio', 'pacientes_turnos.updated_at')
        ->where('pacientes_turnos.fecha', $fecha)->where(function ($query) {
            $query->where('pacientes_turnos.para', '=', 'general')
            ->orWhere('pacientes_turnos.para', '=', 'P75')
            ->orWhere('pacientes_turnos.para', '=', 'dengue');
        })  
        ->where('pacientes_turnos.asistio', 'si')
        ->where('pacientes_turnos.id_horario', $id_horario)
        ->orderBy('horarios.horario')->get()->count();

        return view('turnos-restantes.turnos_restantes', compact('horarios', 'pacientes', 'fechaHora', 'esperando', 'atendidos'));
    }
}
