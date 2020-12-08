<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\horarios_estudio;
use App\Models\pacientes_turno;

class Estadisticas extends Component
{
    //Rango de fechas
    public $fecha_desde, $fecha_hasta;
    public $select_informe, $informe;
    public $generales_6, $generales_1, $generales_2, $generales_3, $generales_4, $generales_5;

    public function mount()
    {
        $this->fecha_desde = date('Y-m-d');
        $this->fecha_hasta = date('Y-m-d');
        $this->select_informe = "nada";
    }

    public function cantidades()
    {
        $this->generales_6 = pacientes_turno::where('id_horario', 6)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_1 = pacientes_turno::where('id_horario', 1)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_2 = pacientes_turno::where('id_horario', 2)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_3 = pacientes_turno::where('id_horario', 3)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_4 = pacientes_turno::where('id_horario', 4)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_5 = pacientes_turno::where('id_horario', 5)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();
    }

    public function updating($fecha_hasta)
    {
        $this->informe = "";
        $this->select_informe = "nada";
    }

    public function updated($select_informe)
    {
        if ($this->select_informe == 'turnos_asignados') {
            $this->informe = "generados";
            $this->cantidades();
        } elseif ($this->select_informe == 'asistencia_turnos') {
            $this->informe = "asistencia";
        }
        
    }
}
