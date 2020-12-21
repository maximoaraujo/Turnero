<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\pacientes_turno;

class ContarTurnos extends Component
{
   public $cant_dengue, $cant_exudado, $cant_espermograma, $cant_general, $cant_p75, $cant_citogenetica;

    public function mount()
    {
        $this->cuento_turnos();
    }

   public function cuento_turnos()
   {
       $fecha = date('Y-m-d');

       $this->cant_dengue = pacientes_turno::where('fecha', $fecha)->where('para', 'dengue')->get()->count();
       $this->cant_exudado = pacientes_turno::where('fecha', $fecha)->where('para', 'exudado')->get()->count();
       $this->cant_espermograma = pacientes_turno::where('fecha', $fecha)->where('para', 'espermograma')->get()->count();
       $this->cant_general = pacientes_turno::where('fecha', $fecha)->where('para', 'general')->get()->count();
       $this->cant_p75 = pacientes_turno::where('fecha', $fecha)->where('para', 'P75')->get()->count();
       $this->cant_citogenetica = pacientes_turno::where('fecha', $fecha)->where('para', 'citogenetica')->get()->count();
   }
}
