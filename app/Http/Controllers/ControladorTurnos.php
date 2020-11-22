<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ControladorTurnos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function general()
    {
        return view('turnos.general');
    }
}
