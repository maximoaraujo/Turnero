<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\ordenes_turno;
use App\Models\paciente;
use App\Models\obras_socials;
use App\Models\turnos_practica;
use App\Models\pacientes_turno;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home');
    }

    public function mi_perfil()
    {
        return view('usuarios.mi-perfil');
    }

    public function planilla()
    {
        return view('impresiones.planilla');
    }

    public function ver_turnos()
    {
        return view('ver-turnos.ver_turnos');
    }

    public function orden_turno($id_turno)
    {
        $ordenes = ordenes_turno::where('id_turno', $id_turno)->get();
        $documento = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('documento')->first();
        $paciente = paciente::where('documento', $documento)->get()->pluck('paciente')->first();
        $obra_social_id = paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')->where('id_turno', $id_turno)->get()->pluck('obra_social_id')->first();
        $obra_social = obras_socials::where('id', $obra_social_id)->get()->pluck('obra_social')->first();
        $nomenclador = obras_socials::where('id', $obra_social_id)->get()->pluck('nomenclador')->first();
        $practicas =  turnos_practica::join('practicas', 'practicas.id_practica', 'turnos_practicas.id_practica')
        ->select('practicas.codigo', 'practicas.practica')
        ->where('turnos_practicas.id_turno', $id_turno)
        ->where('practicas.nomenclador', $nomenclador)->orderBy('practicas.codigo')
        ->get();

        return view('ver-turnos.orden_turno', compact('ordenes', 'practicas', 'paciente', 'obra_social'));
    }

    public function vista_turnos()
    {
        return view('ver-turnos.vista_turnos');
    }

    public function pacientes()
    {
        return view('pacientes.pacientes');
    }

    public function emails()
    {
        return view('emails.email');
    }

    public function estadisticas()
    {
        return view('estadisticas.estadisticas');
    }

    public function configuraciones()
    {
        return view('configuraciones.configuraciones');
    }
}
