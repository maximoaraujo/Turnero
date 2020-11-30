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

    public function planilla()
    {
        return view('impresiones.planilla');
    }

    public function ver_turnos()
    {
        return view('ver-turnos.ver_turnos');
    }

    public function pacientes()
    {
        return view('pacientes.pacientes');
    }
}
