<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Paciente;
use App\Models\Pacientes_turno;

class Pacientes extends Component
{
    public $paciente, $documento, $domicilio, $telefono, $obra_social;
    public $pacientes = [];
    public $picked;
    public $movimientos_paciente = [];

    //Inicio del componente
    public function mount()
    {  
        $this->paciente = "";
        $this->pacientes = [];
        $this->picked = true;
    }

    //Mostramos los resultados 
    public function buscarPaciente()
    {
        $this->picked = false;
    
        $this->pacientes = Paciente::where("paciente", "like", trim($this->paciente) . "%")
        ->take(3)
        ->get();      
    }
    
    //Asignamos el paciente al que se le hizo click en la lista
    public function asignarPaciente($p)
    {        
        $this->paciente = $p;        
        $this->picked = true;
        $this->buscar_paciente();
    }

    //Buscamos al prestador en la BD
    public function buscar_paciente()
    {
        $this->documento = Paciente::where('paciente', $this->paciente)->get()->pluck('documento')->first();
        $this->domicilio = Paciente::where('paciente', $this->paciente)->get()->pluck('domicilio')->first();
        $this->telefono = Paciente::where('paciente', $this->paciente)->get()->pluck('telefono')->first();
        $this->obra_social = Paciente::where('paciente', $this->paciente)->get()->pluck('obra_social')->first();
            
        //Si encontramos al paciente mostramos sus movimientos
        if ($this->documento != "") {
            $this->movimientos_paciente();
        } 
    }

    public function movimientos_paciente()
    {
        $this->movimientos_paciente = Pacientes_turno::join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where('documento', $this->documento)->orderBy('fecha', 'DESC')->take(10)->get();
    }
}
