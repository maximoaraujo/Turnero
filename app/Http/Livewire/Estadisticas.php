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
    public $exudado_12, $exudado_13, $exudado_14, $exudado_15, $exudado_16, $exudado_17;
    public $expermograma_22, $expermograma_23, $expermograma_24, $expermograma_25;
    //Asistencia a turnos generados
    public $asistidos_6, $asistidos_1, $asistidos_2, $asistidos_3, $asistidos_4, $asistidos_5;

    //Asistencia
    public $total, $asistidos, $no_asistidos;

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
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_11 = pacientes_turno::where('id_horario', 11)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_12 = pacientes_turno::where('id_horario', 12)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_13 = pacientes_turno::where('id_horario', 13)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_14 = pacientes_turno::where('id_horario', 14)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_15 = pacientes_turno::where('id_horario', 15)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_16 = pacientes_turno::where('id_horario', 16)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_17 = pacientes_turno::where('id_horario', 17)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_18 = pacientes_turno::where('id_horario', 18)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();
    }

    public function cantidad_exudado()
    {
        $this->exudado_12 = pacientes_turno::where('id_horario', 12)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_13 = pacientes_turno::where('id_horario', 13)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_14 = pacientes_turno::where('id_horario', 14)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_15 = pacientes_turno::where('id_horario', 15)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_16 = pacientes_turno::where('id_horario', 16)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_17 = pacientes_turno::where('id_horario', 17)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();
    }

    public function cantidad_espermograma()
    {
        $this->espermograma_22 = pacientes_turno::where('id_horario', 22)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_23 = pacientes_turno::where('id_horario', 23)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_24 = pacientes_turno::where('id_horario', 24)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_25 = pacientes_turno::where('id_horario', 25)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();
    }

    public function asistencia_turnos()
    {
        $this->total = pacientes_turno::whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos = pacientes_turno::where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->no_asistidos = pacientes_turno::where('asistio', 'no')
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
            $this->cantidad_exudado();
            $this->cantidad_espermograma();
        } elseif ($this->select_informe == 'asistencia_turnos') {
            $this->informe = "asistencia";
            $this->asistencia_turnos();
        }
        
    }
}
