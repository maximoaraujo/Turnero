<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

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
