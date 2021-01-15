<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\consultas_motivo;
use App\Models\turnos_consulta;
use Illuminate\Support\Facades\Auth;

class ConsultasGenerales extends Component
{
    public $id_motivo, $motivo, $motivo_sel, $comentarios;
    public $motivos = [];

    public function mount()
    {   
        $this->cargo_motivos();
    }

    public function cargo_motivos()
    {
        $this->motivos = consultas_motivo::orderBy('motivo')->get();
    }

    public function guardar()
    {
        $guardar = consultas_motivo::create([
            'motivo' => $this->motivo
        ]);

        if ($guardar) {
            $this->reset('motivo');
            $this->cargo_motivos();
        }
    }

    public function default()
    {
        $this->reset('motivo');
    }

    public function pasoID($id_motivo)
    {
        $this->id_motivo = $id_motivo;
        $this->motivo_sel = consultas_motivo::where('id', $this->id_motivo)->get()->pluck('motivo')->first();
    }

    public function guardar_rechazo()
    {
        $guardar = turnos_consulta::create([
            'id_motivo' => $this->id_motivo,
            'id_usuario' => Auth::user()->id,
            'comentarios' => $this->comentarios
        ]);

        if ($guardar) {
            //session()->flash('mensaje', 'El rechazo se asento con éxito!');
            $this->id_motivo = '';
            return redirect()->to('/consultas');
        }
    }
}
