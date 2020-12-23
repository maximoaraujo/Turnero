<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\horarios_estudio;

class Configuracion extends Component
{
    public $horarios_dengue, $horarios_exudado, $horarios_espermograma, $horarios_general, $horario_citogenetica;
   
    public function mount()
    {
       
    }
}
