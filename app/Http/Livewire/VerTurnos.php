<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\pacientes_turno;
use App\Models\paciente;
use App\Models\config;
use App\Models\valores_turno;
use App\Models\obras_socials;
use DB;
use Illuminate\Support\Facades\Auth;

class VerTurnos extends Component
{
    //Fecha para ver los turnos
    public $fecha;
    //
    public $opcion_sel;
    //Edición de turnos
    //Para
    public $para;
    //Fecha del nuevo turno
    public $fecha_nuevo_turno;
    //ID del turno
    public $id_turno;
    //Horario del turno que se esta por editar
    public $horario_turno, $id_horario_viejo;
    //ID del nuevo horario al editar un turno
    public $id_nuevo_horario;
    //Cantidad de turnos por tipo de estudio
    public $cantidad_turnos;
    //Turnos por tipo de estudio
    public $turnos_dengue = [];
    public $turnos_exudado = [];
    public $turnos_generales = [];
    public $turnos_citogenetica = [];
    public $turnos_p75 = [];
    //Horarios por tipo de estudio
    public $horarios = [];
    public $horarios_dengue = [];
    //Horario para buscar en la tabla de turnos
    public $horario_sel;
    //Visibilidad de tabs según lo que se seleccione
    public $tab_dengue, $tab_exudado, $tab_espermograma, $tab_general, $tab_citogenetica, $tab_p75;
    public $tab_dengue_, $tab_exudado_, $tab_espermograma_, $tab_general_, $tab_citogenetica_, $tab_p75_;
    //Tipo de acción (ver, editar datos, editar turno)
    public $accion;
    //Parametros para editar los datos del paciente, también se usa para editar un turno
    public $documento, $paciente, $fecha_nacimiento, $domicilio, $telefono, $obra_social;
    //Parametros para ver quien asigno el turno
    public $usuario, $fecha_hora;

    public function mount()
    {   
        $this->opcion_sel = "General";
        $this->accion = "ver";
        $this->fecha = date('Y-m-d');
        $this->cargo_horarios();
        $this->cargo_dengue();
        $this->cargo_exudado();
        $this->cargo_generales();
        $this->cargo_p75();
        $this->cargo_citogenetica();
    }

    //Cargamos los horarios por estudio
    public function cargo_horarios()
    {
        $this->horarios_dengue = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'dengue')
        ->orderBy('horarios.horario')->get();

        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')
        ->orderBy('horarios.horario')->get();
    }
    
    //Traemos los horarios para DENGUE
    public function cargo_dengue()
    {
        $condicion_den = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'dengue'];
        $this->turnos_dengue = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_den)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para EXUDADO
    public function cargo_exudado()
    {
        $condicion_exu = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'exudado'];
        $this->turnos_exudado = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_exu)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para GENERALES
    public function cargo_generales()
    {
        $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general'];
        $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_gen)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Filtramos los horarios GENERALES por horario seleccionado
    public function generales_x_horario()
    {
        $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general', 'pacientes_turnos.id_horario' => $this->horario_sel];
        $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_gen)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes_turnos.fecha_hora', 'pacientes.domicilio', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 
        'pacientes_turnos.asistio')->orderBy('horarios.horario')
        ->get(); 
    }

    //Traemos los horarios para P75
    public function cargo_p75()
    {
        $condicion_p75 = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'P75'];
        $this->turnos_p75 = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_p75)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes_turnos.fecha_hora', 'pacientes.domicilio', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para GENERALES
    public function cargo_citogenetica()
    {
        $condicion_cit = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'citogenetica'];
        $this->turnos_citogenetica = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->where($condicion_cit)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'pacientes.domicilio', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Después de actualizar la fecha o el horario seleccionado mostramos los turnos
    public function updated($fecha, $horario_sel)
    {
        $this->cargo_horarios();
        $this->cargo_dengue();
        $this->cargo_exudado();
        $this->generales_x_horario();
        $this->cargo_p75();
        $this->cargo_citogenetica();
    }

    //Marcamos la asistencia de los turnos
    public function asistencia($id_horario, $fecha, $documento, $para)
    {
        $asistencia = pacientes_turno::where('fecha', $fecha)->where('id_horario', $id_horario)
        ->where('documento', $documento)->update([
            'asistio' => 'si'
        ]);

        if ($asistencia) {
            $this->cargo_horarios();
            $this->cargo_dengue();
            $this->cargo_exudado();
            $this->cargo_citogenetica();   
            $this->generales_x_horario();  
            $this->cargo_p75();
        }
    }

    //Editamos los datos del paciente
    public function editar_datos($documento)
    {
        $this->accion = "editar datos";
        $this->documento = $documento;
        $this->paciente = paciente::where('documento', $this->documento)->get()->pluck('paciente')->first();
        $this->fecha_nacimiento = paciente::where('documento', $this->documento)->get()->pluck('fecha_nac')->first();
        $this->domicilio = paciente::where('documento', $this->documento)->get()->pluck('domicilio')->first();
        $this->telefono = paciente::where('documento', $this->documento)->get()->pluck('telefono')->first();
        $id_obra_social = paciente::where('documento', $this->documento)->get()->pluck('obra_social_id')->first();
        $this->obra_social = obras_socials::where('id', $id_obra_social)->get()->pluck('obra_social')->first();
    }

    //Guardamos la actualización de datos del paciente
    public function actualizo_datos()
    {
        $actualizo_datos = paciente::where('documento', $this->documento)->update([
            'paciente' => $this->paciente,
            'fecha_nac' => $this->fecha_nacimiento,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'obra_social' => $this->obra_social
        ]);

        if ($actualizo_datos) {
            $this->cancelar_edicion();
        }
    }

    //Cancelamos la edición de los datos del paciente
    public function cancelar_edicion()
    {
        $this->accion = "ver";
        $this->cargo_horarios();
        $this->cargo_dengue();
        $this->cargo_exudado();
        $this->generales_x_horario();
        $this->cargo_p75();
        $this->cargo_citogenetica();
    }

    //Eliminamos el turno seleccionado
    public function eliminar_turno($documento, $id_horario, $fecha)
    {
        $elimino_turno = pacientes_turno::where('documento', $documento)->where('id_horario', $id_horario)
        ->where('fecha', $fecha)->delete();

        if($elimino_turno){
           $this->cargo_horarios();
           $this->cargo_generales();
           $this->generales_x_horario();
           $this->cargo_dengue();
           $this->cargo_exudado();
           $this->cargo_citogenetica();
        }
    }

}
