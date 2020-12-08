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
    //Cantidades de turnos emitidos
    public $generales_6, $generales_1, $generales_2, $generales_3, $generales_4, $generales_5;
    public $generales_10, $generales_11, $generales_12, $generales_13, $generales_14, $generales_15, $generales_16, $generales_17, $generales_18;
    //Asistencia a turnos generados
    public $asistidos_6, $asistidos_1, $asistidos_2, $asistidos_3, $asistidos_4, $asistidos_5;

    public function mount()
    {
        $this->fecha_desde = date('Y-m-d');
        $this->fecha_hasta = date('Y-m-d');
        $this->select_informe = "nada";
    }

    public function cantidad_generales()
    {
        $this->generales_6 = pacientes_turno::where('id_horario', 6)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_6 = pacientes_turno::where('id_horario', 6)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_1 = pacientes_turno::where('id_horario', 1)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_1 = pacientes_turno::where('id_horario', 1)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_2 = pacientes_turno::where('id_horario', 2)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_2 = pacientes_turno::where('id_horario', 2)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_3 = pacientes_turno::where('id_horario', 3)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_3 = pacientes_turno::where('id_horario', 3)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_4 = pacientes_turno::where('id_horario', 4)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_4 = pacientes_turno::where('id_horario', 4)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_5 = pacientes_turno::where('id_horario', 5)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_5 = pacientes_turno::where('id_horario', 5)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();
    }
    
    public function cantidad_dengue()
    {
        $this->generales_10 = pacientes_turno::where('id_horario', 10)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_11 = pacientes_turno::where('id_horario', 11)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_12 = pacientes_turno::where('id_horario', 12)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_13 = pacientes_turno::where('id_horario', 13)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_14 = pacientes_turno::where('id_horario', 14)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_15 = pacientes_turno::where('id_horario', 15)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_16 = pacientes_turno::where('id_horario', 16)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_17 = pacientes_turno::where('id_horario', 17)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_18 = pacientes_turno::where('id_horario', 18)
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
            $this->cantidad_generales();
            $this->cantidad_dengue();
        } elseif ($this->select_informe == 'asistencia_turnos') {
            $this->informe = "asistencia";
        }
        
    }
}
