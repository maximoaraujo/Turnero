<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horario;
use App\Models\pacientes_turno;
use App\Models\paciente;
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
