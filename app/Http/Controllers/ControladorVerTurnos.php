<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\pacientes_turno;
use App\Models\horario;

class ControladorVerTurnos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function cargo_turnos()
    {

        $horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')->orderBy('horarios.horario')->get();

        $fecha = date('Y-m-d');

        $condicion_den = ['pacientes_turnos.fecha' => $fecha, 'pacientes_turnos.para' => 'dengue'];
        $turnos_dengue = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_den)
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();

        $condicion_exu = ['pacientes_turnos.fecha' => $fecha, 'pacientes_turnos.para' => 'exudado'];
        $turnos_exudado = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_exu)
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();

        $condicion_gen = ['pacientes_turnos.fecha' => $fecha, 'pacientes_turnos.para' => 'general'];
        $turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_gen)
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();

        $condicion_p75 = ['pacientes_turnos.fecha' => $fecha, 'pacientes_turnos.para' => 'P75'];
        $turnos_p75 = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_p75)
        ->select('horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();

        $condicion_cit = ['pacientes_turnos.fecha' => $fecha, 'pacientes_turnos.para' => 'citogenetica'];
        $turnos_citogenetica = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_cit)
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();

        return view('ver-turnos.ver_turnos', compact('horarios', 'turnos_dengue', 'turnos_exudado', 'turnos_generales', 'turnos_p75', 'turnos_citogenetica'));
    }
}
