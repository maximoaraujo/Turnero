<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\pacientes_turno;
use App\Models\User;

class Perfil extends Component
{
    public $movimiento;
    public $inicio, $cantidad_turnos;
    public $nombre, $email;
    public $nueva_contraseña, $contraseña_repetida;
    public $cantidad_x_periodo, $fecha_desde, $fecha_hasta;

    public function mount()
    {
        $this->inicio_cantidad();
        $this->movimiento = "";
        $this->nombre = Auth::user()->name;
        $this->email = Auth::user()->email;
        $this->fecha_desde = date('Y-m-d');
        $this->fecha_hasta = date('Y-m-d');
    }

    public function inicio_cantidad()
    {
        $this->inicio = pacientes_turno::where('id_usuario', Auth::user()->id)->get()->pluck('fecha')->first();
        $this->cantidad_turnos = pacientes_turno::where('id_usuario', Auth::user()->id)->get()->count();
    }

    public function actividad()
    {
        $this->movimiento = 'actividad';
        $this->cuento_turnos();
    }

    public function cuento_turnos()
    {
        $this->cantidad_x_periodo = pacientes_turno::where('id_usuario', Auth::user()->id)
        ->whereBetween('created_at', [$this->fecha_desde, $this->fecha_hasta])->get()->count();
    }

    public function updated($fecha_hasta)
    {
        $this->cuento_turnos();
    }

    public function ajustes()
    {
        $this->movimiento = 'ajustes';
    }

    public function guardar()
    {
        $this->validate([
            'nombre' => 'required', 'email' => 'required'
        ]);

        if ( (empty($this->nueva_contraseña))&&(empty($this->contraseña_repetida)) ) {
            $guardar = User::where('id', Auth::user()->id)->update([
               'name' => $this->nombre,
               'email' => $this->email
            ]);

            if ($guardar) {
                return redirect()->to('/mi-perfil');
            }
        } else {
            
            if ($this->nueva_contraseña != $this->contraseña_repetida) {
                session()->flash('contraseña', 'Las contraseñas no coinciden');
                $this->reset('nueva_contraseña', 'contraseña_repetida');
            } else {
                $guardar = User::where('id', Auth::user()->id)->update([
                    'name' => $this->nombre,
                    'email' => $this->email,
                    'password' => Hash::make($this->nueva_contraseña)
                 ]);
     
                 if ($guardar) {
                     return redirect()->to('/mi-perfil');
                 } 
            }

        }
    }
}
