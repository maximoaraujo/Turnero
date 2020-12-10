<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\horarios_estudio;

class Configuracion extends Component
{
    public $select_estudio;
    public $horarios;

    public function mount()
    {
        $this->select_estudio = "nada";
        $this->horarios_x_estudio();
    }

    public function horarios_x_estudio()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', $this->select_estudio)
        ->orderBy('horarios.horario')
        ->get();
    }

    public function updated($select_estudio)
    {
        $this->horarios_x_estudio();
    }

}
