<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\pacientes_turno;
use App\Models\paciente;
use App\Models\obras_socials;
use DB;

class Espermogramas extends Component
{
    public $fecha_desde, $fecha_hasta;
    public $turnos = [];

    public function mount()
    {
        $this->fecha_desde = date('Y-m-d');
        $this->fecha_hasta = date('Y-m-d');
        $this->cargo_turnos();
    }

    public function cargo_turnos()
    {
        $this->turnos = pacientes_turno::join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->join('obras_socials', 'obras_socials.id', 'pacientes.obra_social_id')
        ->select('pacientes_turnos.fecha', 'horarios.horario', 'pacientes.paciente', 'pacientes.documento', 'pacientes.fecha_nac',
        'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"))
        ->where('para', 'espermograma')
        ->whereBetween('fecha', [$this->fecha_desde, $this->fecha_hasta])
        ->get();
    }

    public function updated($fecha_desde)
    {
        $this->cargo_turnos();
    }
}
