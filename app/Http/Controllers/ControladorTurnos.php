<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horario;
use App\Models\pacientes_turno;
use App\Models\paciente;
use App\Models\turnos_practica;
use App\Models\obras_socials;

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
        return view('turnos.exudado-livewire');
    }

    public function espermograma()
    {        
        return view('turnos.espermograma-livewire');
    }

    public function citogenetica()
    {       
       return view('turnos.citogenetica-livewire');
    }

    public function comprobante_turno($id_turno)
    {
        $documento = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('documento')->first();
        $paciente = paciente::where('documento', $documento)->get()->pluck('paciente')->first();
        $id_horario = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('id_horario')->first();
        $letra = horario::where('id_horario', $id_horario)->get()->pluck('letra')->first();
        $id = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('id')->first();
        $fecha = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('fecha')->first();
        $id_obra_social = turnos_practica::where('id_turno', $id_turno)->get()->pluck('obra_social_id')->first();
        $nomenclador = obras_socials::where('id', $id_obra_social)->get()
        ->pluck('nomenclador')->first();
        $practicas = turnos_practica::join('practicas', 'practicas.id_practica', 'turnos_practicas.id_practica')
        ->select('practicas.codigo', 'practicas.practica')->where('turnos_practicas.id_turno', $id_turno)
        ->where('practicas.nomenclador', $nomenclador)->get();

        return view('impresiones.comprobante_turno', compact('id_turno', 'documento', 'paciente', 'id_horario', 'fecha', 'letra', 'id', 'practicas', 'id_obra_social', 'nomenclador'));
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
