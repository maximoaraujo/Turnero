<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\pacientes_turno;

class VerTurnos extends Component
{
    public $fecha;
    public $turnos_generales = [];
    public $turnos_p75 = [];
    public $horarios = [];
    public $horario_sel;
    public $tab_dengue, $tab_exudado, $tab_espermograma, $tab_general, $tab_citogenetica, $tab_p75;
    public $tab_dengue_, $tab_exudado_, $tab_espermograma_, $tab_general_, $tab_citogenetica_, $tab_p75_;
    public $chk_general;

    public function mount()
    {
        $this->fecha = date('Y-m-d');
        $this->cargo_horarios();
        $this->cargo_generales();
        $this->cargo_p75();
        $this->tab_dengue = "";
        $this->tab_dengue_ = "";
        $this->tab_exudado = "";
        $this->tab_exudado_ = "";
        $this->tab_espermograma = "";
        $this->tab_espermograma_ = "";
        $this->tab_general = "";
        $this->tab_general_ = "";
        $this->tab_citogenetica = "";
        $this->tab_citogenetica_ = "";
        $this->tab_p75 = "";
        $this->tab_p75_ = "";
    }

    public function cargo_horarios()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')
        ->orderBy('horarios.horario')->get();
    }

    public function cargo_generales()
    {
        $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general'];
        $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_gen)
        ->select('horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();

        $this->tab_general = "active";
        $this->tab_general_ = "show active";
    }

    public function generales_x_horario()
    {
        $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general', 'horarios.id_horario' => $this->horario_sel];
        $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_gen)
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get(); 

        $this->tab_general = "active";
        $this->tab_general_ = "show active";
    }

    public function cargo_p75()
    {
        $condicion_p75 = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'P75'];
        $this->turnos_p75 = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_p75)
        ->select('horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();
    }

    public function updated($fecha, $horario_sel)
    {
        $this->cargo_horarios();
        $this->cargo_generales();
        $this->cargo_p75();
        $this->generales_x_horario();
    }

    public function asistencia_generales($id_horario, $letra, $id, $documento)
    {
        $asistencia = pacientes_turno::where('fecha', $this->fecha)->where('id_horario', $id_horario)
        ->where('letra', $letra)->where('id', $id)->where('documento', $documento)->update([
            'asistio' => 'si'
        ]);

        if ($asistencia) {
            $this->cargo_horarios();
            $this->cargo_generales();
            $this->cargo_p75();
            $this->generales_x_horario();
        }
    }

}
