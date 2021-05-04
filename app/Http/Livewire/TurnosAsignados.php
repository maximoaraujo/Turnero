<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\User;
use App\Models\pacientes_turno;
use Livewire\WithPagination;

class TurnosAsignados extends Component
{
    use WithPagination;

    public $id_usuario;
    public $users = [];
    public $desde, $hasta, $hasta_1;
    public $cantidad;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $movimientos = pacientes_turno::join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->select('pacientes_turnos.fecha', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'horarios.horario', 'pacientes.paciente', 'pacientes_turnos.created_at')
        ->where('pacientes_turnos.id_usuario', $this->id_usuario)
        ->whereBetween('pacientes_turnos.created_at', [$this->desde, $this->hasta_1])
        ->orderBy('pacientes_turnos.created_at')->paginate(15);

        $this->cantidad = pacientes_turno::join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->select('pacientes_turnos.fecha', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'horarios.horario', 'pacientes.paciente', 'pacientes_turnos.created_at')
        ->where('pacientes_turnos.id_usuario', $this->id_usuario)
        ->whereBetween('pacientes_turnos.created_at', [$this->desde, $this->hasta])
        ->orderBy('pacientes_turnos.created_at')->get()->count();

        return view('livewire.turnos-asignados', compact('movimientos'));
    }

    public function mount()
    {
        $this->cargo_usuarios();
        $this->desde = date('Y-m-d');
        $this->hasta = date('Y-m-d');
        $this->cantidad = 0;
    }

    public function cargo_usuarios()
    {   
        $this->users = User::orderBy('name')->get();
    }

    public function updated($desde, $hasta)
    {
        $this->hasta_1 = date("Y-m-d",strtotime($this->hasta."+ 1 days")); 
    }
}
