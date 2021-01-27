<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horarios_estudio;
use App\Models\horario;
use App\Models\config;
use App\Models\pacientes_turno;
use App\Models\valores_turno;
use App\Models\paciente;
use App\Models\obras_socials;
use App\Models\no_laborale;
use App\Models\practica;
use App\Models\turnos_practica;
use Illuminate\Support\Facades\Auth;

class ControladorTurnos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function general()
    {
        return view('turnos.generales-livewire');
    }

    public function dengue()
    {        
        return view('turnos.dengue-livewire');
    }

    public function exudado()
    {        
        $picked = true;
        $practicas = [];
        $obras_sociales = obras_socials::where('estado', 'H')->orderBy('obra_social')->get();
        $horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'exudado')
        ->orderBy('horarios.horario')
        ->get();

        $cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
        $cantidad_ioscor = config::get()->pluck('cant_turnos_ioscor')->first();

        return view('turnos.exudado', compact('horarios', 'cantidad_turnos', 'cantidad_ioscor', 'obras_sociales', 'practicas', 'picked'));
    }

    public function espermograma()
    {        
        $picked = true;
        $practicas = [];
        $obras_sociales = obras_socials::where('estado', 'H')->orderBy('obra_social')->get();
        $horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'espermograma')
        ->orderBy('horarios.horario')
        ->get();

        $cantidad_turnos = config::get()->pluck('cant_turnos_esp')->first();
        $cantidad_ioscor = config::get()->pluck('cant_turnos_ioscor')->first();

        return view('turnos.espermograma', compact('horarios', 'cantidad_turnos', 'cantidad_ioscor', 'obras_sociales', 'practicas', 'picked'));
    }

    public function citogenetica()
    {       
        $picked = true; 
        $practicas = [];
        $obras_sociales = obras_socials::where('estado', 'H')->orderBy('obra_social')->get();
        $horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'citogenetica')
        ->orderBy('horarios.horario')
        ->get();

        $cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
        $cantidad_ioscor = config::get()->pluck('cant_turnos_ioscor')->first();

        return view('turnos.citogenetica', compact('horarios', 'cantidad_turnos', 'cantidad_ioscor', 'obras_sociales', 'practicas', 'picked'));
    }

    public function comprobante_turno($id_turno)
    {
        $id_turno = $id_turno;
        $documento = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('documento')->first();
        $paciente = paciente::where('documento', $documento)->get()->pluck('paciente')->first();
        $id_horario = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('id_horario')->first();
        $letra = horario::where('id_horario', $id_horario)->get()->pluck('letra')->first();
        $id = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('id')->first();
        $fecha = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('fecha')->first();

        return view('impresiones.comprobante_turno', compact('id_turno', 'documento', 'paciente', 'id_horario', 'fecha', 'letra', 'id'));
    }

    public function rechazo_turno()
    {
        return view('turnos.rechazo');
    }

    public function consultas()
    {
        return view('demanda.consultas');
    }
}
