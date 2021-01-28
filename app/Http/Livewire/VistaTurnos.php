<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\pacientes_turno;
use DB;

class VistaTurnos extends Component
{
    public $fecha;
    public $horarios = [];
    public $id_horario;
    public $turnos = [];
    public $orden;
    public $asistio;

    public function mount()
    {
        $this->fecha = date('Y-m-d');
        $this->horarios();
        $this->id_horario = 6;
        $this->cargo_turnos();
    }

    public function horarios()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios.id_horario', 'horarios_estudios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')->orderBy('horarios.horario')->get();
    }

    public function updated($id_horario)
    {
        $this->cargo_turnos();
        $this->horarios();
    }

    public function cargo_turnos()
    {
        $this->turnos = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes.documento', 'pacientes_turnos.documento')
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.letra', 'pacientes_turnos.id', 
        'pacientes.paciente', 'pacientes.documento', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.situacion', 'pacientes_turnos.orden', 'pacientes_turnos.asistio')
        ->where('pacientes_turnos.fecha', $this->fecha)->where(function ($query) {
            $query->where('pacientes_turnos.para', '=', 'general')
            ->orWhere('pacientes_turnos.para', '=', 'P75');
        })
        ->where('pacientes_turnos.id_horario', $this->id_horario)
        ->orderBy('horarios.horario')->get();
    }

    public function ordeno($letra, $id, $id_horario, $documento)
    {
        $orden = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->orderBy('orden', 'DESC')->get()->pluck('orden')->first();

        $this->orden = $orden + 1;

        $actualizo = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->where('letra', $letra)->where('id', $id)->where('documento', $documento)->update([
            'orden' => $this->orden,
            'situacion' => 'paso'
        ]);

        if ($actualizo) {
            $this->horarios();
            $this->cargo_turnos();
        }    
    }

    //Marcamos la asistencia de los turnos
    public function asistencia($id_horario, $documento)
    {
        $this->asistio = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->where('documento', $documento)->get()->pluck('asistio')->first();

        if ($this->asistio == "no") {
            $asistencia = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
            ->where('documento', $documento)->update([
                'asistio' => 'si'           
            ]); 
        } else {
            $asistencia = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
            ->where('documento', $documento)->update([
                'asistio' => 'no'           
            ]); 
        }

        if ($asistencia) {
            $this->horarios();
            $this->cargo_turnos();
        }
    }

    public function garage($letra, $id, $id_horario, $documento)
    {
        $orden = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->orderBy('orden', 'DESC')->get()->pluck('orden')->first();

        $this->orden = $orden + 1;

        $actualizo = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->where('letra', $letra)->where('id', $id)->where('documento', $documento)->update([
            'orden' => $this->orden,
        ]);
          
        $garage = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->where('documento', $documento)->update([
            'situacion' => 'garage'
        ]);

        if ($garage) {
            $this->horarios();
            $this->cargo_turnos();
        }
    }
}
