<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\pacientes_turno;
use App\Models\paciente;
use App\Models\config;

class VerTurnos extends Component
{
    //Fecha para ver los turnos
    public $fecha;
    //Edición de turnos
    //Fecha del nuevo turno
    public $fecha_nuevo_turno;
    //Horario del turno que se esta por editar
    public $horario_turno, $id_horario_viejo;
    //ID del nuevo horario al editar un turno
    public $id_nuevo_horario;
    //Cantidad de turnos por tipo de estudio
    public $cantidad_turnos;
    //Turnos por tipo de estudio
    public $turnos_generales = [];
    public $turnos_p75 = [];
    //Horarios por tipo de estudio
    public $horarios = [];
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
        $this->accion = "ver";
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
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_gen)
        ->select('pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes_turnos.fecha_hora', 'pacientes.domicilio', 'pacientes.obra_social', 'pacientes_turnos.asistio')
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
        ->where('documento', $documento)->update([
            'asistio' => 'si'
        ]);

        if ($asistencia) {
            $this->cargo_horarios();
            $this->cargo_generales();
            $this->cargo_p75();
            $this->generales_x_horario();
        }
    }

    public function editar_datos($documento)
    {
        $this->accion = "editar datos";
        $this->documento = $documento;
        $this->paciente = paciente::where('documento', $this->documento)->get()->pluck('paciente')->first();
        $this->fecha_nacimiento = paciente::where('documento', $this->documento)->get()->pluck('fecha_nac')->first();
        $this->domicilio = paciente::where('documento', $this->documento)->get()->pluck('domicilio')->first();
        $this->telefono = paciente::where('documento', $this->documento)->get()->pluck('telefono')->first();
        $this->obra_social = paciente::where('documento', $this->documento)->get()->pluck('obra_social')->first();
    }

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

    public function cancelar_edicion()
    {
        $this->accion = "ver";
        $this->cargo_horarios();
        $this->cargo_generales();
        $this->cargo_p75();
        $this->generales_x_horario();
    }

    public function editar_turno($documento, $horario, $paciente, $id_horario_viejo, $tipo)
    {   
        $this->accion = "editar turno";
        $this->paciente = $paciente;
        $this->horario_turno = $horario;
        $this->id_horario_viejo = $id_horario_viejo;
        $this->documento = $documento;
        if ($tipo == "general") {
            $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
        }    
    }

    public function nuevo_turno($id_horario, $id_usuario)
    {
        $this->id_nuevo_horario = $id_horario;
        //Array con la cantidad de turnos disponibles
        $cons_turnos = config::get()->pluck('cant_turnos_gen')->first();

        for ($i=1; $i < $cons_turnos + 1; $i++) { 
            $array_turnos[] = $i;
        }    
                
        //Letra según el horario seleccionado
        $letra = horario::where('id_horario', $this->id_nuevo_horario)->get()->pluck('letra')->first();
                
        //Array con los turnos ya ocupados
        $cons_ocupados = pacientes_turno::join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->select('pacientes_turnos.id')
        ->where('horarios.id_horario', $this->id_nuevo_horario)
        ->where('pacientes_turnos.fecha', $this->fecha_nuevo_turno)
        ->get();
                
        foreach ($cons_ocupados as $ocupados) {
            $array_ocupados[] = $ocupados['id'];
        }
        
        //Si el array de ocupados esta vacío lo ponemos en 0
        if (empty($array_ocupados)) {
            $array_ocupados = array("0");
        }
                
        //Sacamos la diferencia entre los dos arrays
        $array_libres = array_diff($array_turnos, $array_ocupados);
                
        //Le pasamos el primer valor del array con los turnos libres
        $id_num = reset($array_libres);

        $fecha_hora = date('Y-m-d H:m:s');

        $guardo_turno = pacientes_turno::create([
            'id' => $id_num,
            'letra' => $letra,
            'fecha' => $this->fecha_nuevo_turno,
            'id_horario' => $this->id_nuevo_horario,
            'documento' => $this->documento,
            'id_usuario' => $id_usuario,
            'fecha_hora' => $fecha_hora,
            'para' => 'general',
            'asistio' => 'no',
            'comentarios' => ''
        ]);

        if ($guardo_turno) {
            $elimino_anterior = pacientes_turno::where('documento', $this->documento)->where('id_horario', $this->id_horario_viejo)
            ->where('fecha', $this->fecha)->delete();
            if ($elimino_anterior) {
                return redirect('/comprobante_turno'.'/'.$this->fecha_nuevo_turno.'/'.$this->id_nuevo_horario.'/'.$this->documento.'/'.$this->paciente);               
            }
        }       
    }

    public function eliminar_turno($documento, $id_horario, $fecha)
    {
        $elimino_turno = pacientes_turno::where('documento', $documento)->where('id_horario', $id_horario)
        ->where('fecha', $fecha)->delete();

        if($elimino_turno){
            return redirect('/ver-turnos')->back()->with('mensaje', '');
        }
    }

}
