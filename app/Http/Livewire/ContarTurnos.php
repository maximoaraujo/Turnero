<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pacientes_turno;
use App\Models\paciente;

class ContarTurnos extends Component
{
   public $cant_dengue, $cant_exudado, $cant_espermograma, $cant_general, $cant_p75, $cant_citogenetica;
   public $cant_dengue_ios, $cant_exudado_ios, $cant_espermograma_ios, $cant_general_ios, $cant_p75_ios, $cant_citogenetica_ios;


    public function mount()
    {
        $this->cuento_turnos();
    }

   public function cuento_turnos()
   {
        $fecha = date('Y-m-d');

        $this->cant_dengue = pacientes_turno::where('fecha', $fecha)->where('para', 'dengue')->get()->count();
        $this->cant_dengue_ios = paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where('pacientes_turnos.fecha', $fecha)
        ->where('pacientes_turnos.para', 'dengue')
        ->where('pacientes.obra_social', 'IOSCOR')
        ->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
        $this->cant_exudado = pacientes_turno::where('fecha', $fecha)->where('para', 'exudado')->get()->count();
        $this->cant_exudado_ios =  paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where('pacientes_turnos.fecha', $fecha)
        ->where('pacientes_turnos.para', 'exudado')
        ->where('pacientes.obra_social', 'IOSCOR')
        ->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
        $this->cant_espermograma = pacientes_turno::where('fecha', $fecha)->where('para', 'espermograma')->get()->count();
        $this->cant_espermograma_ios =  paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where('pacientes_turnos.fecha', $fecha)
        ->where('pacientes_turnos.para', 'espermograma')
        ->where('pacientes.obra_social', 'IOSCOR')
        ->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
        $this->cant_general = pacientes_turno::where('fecha', $fecha)->where('para', 'general')->get()->count();
        $this->cant_general_ios =  paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where('pacientes_turnos.fecha', $fecha)
        ->where('pacientes_turnos.para', 'general')
        ->where('pacientes.obra_social', 'IOSCOR')
        ->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
        $this->cant_p75 = pacientes_turno::where('fecha', $fecha)->where('para', 'P75')->get()->count();
        $this->cant_p75_ios =  paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where('pacientes_turnos.fecha', $fecha)
        ->where('pacientes_turnos.para', 'P75')
        ->where('pacientes.obra_social', 'IOSCOR')
        ->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
        $this->cant_citogenetica = pacientes_turno::where('fecha', $fecha)->where('para', 'citogenetica')->get()->count();
        $this->cant_citogenetica_ios =  paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where('pacientes_turnos.fecha', $fecha)
        ->where('pacientes_turnos.para', 'citogenetica')
        ->where('pacientes.obra_social', 'IOSCOR')
        ->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
    }
}
