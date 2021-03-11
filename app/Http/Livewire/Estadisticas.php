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
    public $generales_6, $generales_1, $generales_2, $generales_3, $generales_4, $generales_5, $generales_7, $generales_8, $generales_9, $generales_11, $generales_37;
    public $generales_12, $generales_13, $generales_14, $generales_15, $generales_16, $generales_17, $generales_18, $generales_23, $generales_24, $generales_25;
    public $exudado_12, $exudado_13, $exudado_14, $exudado_15, $exudado_16, $exudado_17;
    public $espermograma_38, $espermograma_22, $espermograma_23, $espermograma_24, $espermograma_25;
    //Asistencia a turnos generados
    public $asistidos_6, $asistidos_1, $asistidos_2, $asistidos_3, $asistidos_4, $asistidos_5, $asistidos_7, $asistidos_8, $asistidos_9, $asistidos_11, $asistidos_37;
    //Totales
    public $total_general, $total_dengue, $total_exudado, $total_espermograma;

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

        $this->generales_7 = pacientes_turno::where('id_horario', 7)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_7 = pacientes_turno::where('id_horario', 7)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_8 = pacientes_turno::where('id_horario', 8)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_8 = pacientes_turno::where('id_horario', 8)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_9 = pacientes_turno::where('id_horario', 9)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_9 = pacientes_turno::where('id_horario', 9)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_11 = pacientes_turno::where('id_horario', 11)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();
 
        $this->asistidos_11 = pacientes_turno::where('id_horario', 11)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_37 = pacientes_turno::where('id_horario', 37)
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->asistidos_37 = pacientes_turno::where('id_horario', 37)
        ->where('asistio', 'si')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->total_general = $this->generales_6 + $this->generales_1 + $this->generales_2 + $this->generales_3 + $this->generales_4 + $this->generales_5 + $this->generales_7 + $this->generales_8 + $this->generales_9 + $this->generales_11 + $this->generales_37;

    }
    
    public function cantidad_dengue()
    {
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

        $this->generales_23 = pacientes_turno::where('id_horario', 23)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_24 = pacientes_turno::where('id_horario', 24)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->generales_25 = pacientes_turno::where('id_horario', 25)
        ->where('para', 'dengue')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->total_dengue = $this->generales_12 + $this->generales_13 + $this->generales_14 + $this->generales_15 + $this->generales_16 + $this->generales_17 + $this->generales_18 + $this->generales_23 + $this->generales_24 + $this->generales_25;
    }

    public function cantidad_exudado()
    {
        $this->exudado_12 = pacientes_turno::where('id_horario', 30)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_13 = pacientes_turno::where('id_horario', 31)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_14 = pacientes_turno::where('id_horario', 32)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_15 = pacientes_turno::where('id_horario', 33)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_16 = pacientes_turno::where('id_horario', 34)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->exudado_17 = pacientes_turno::where('id_horario', 35)
        ->where('para', 'exudado')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->total_exudado = $this->exudado_12 + $this->exudado_13 + $this->exudado_14 + $this->exudado_15 + $this->exudado_16 + $this->exudado_17;
    }

    public function cantidad_espermograma()
    {
        $this->espermograma_38 = pacientes_turno::where('id_horario', 38)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_22 = pacientes_turno::where('id_horario', 26)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_23 = pacientes_turno::where('id_horario', 27)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_24 = pacientes_turno::where('id_horario', 28)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->espermograma_25 = pacientes_turno::where('id_horario', 29)
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get()->count();

        $this->total_espermograma = $this->espermograma_38 + $this->espermograma_22 + $this->espermograma_23 + $this->espermograma_24 + $this->espermograma_25;
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
