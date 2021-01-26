<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\config;
use App\Models\Paciente;
use App\Models\obras_socials;
use App\Models\Pacientes_turno;
use App\Models\valores_turno;
use Illuminate\Support\Facades\Auth;

class Pacientes extends Component
{
    public $paciente, $documento, $domicilio, $telefono, $obra_social;
    public $pacientes = [];
    public $picked;
    public $movimientos_paciente = [];
    public $accion;
    //Para editar el turno
    public $id_turno;
    public $fecha_turno, $horario_turno, $fecha_nuevo_turno, $id_nuevo_horario, $id_horario_viejo;
    public $horarios = [];
    public $cantidad_turnos;
    public $para;

    //Inicio del componente
    public function mount()
    {  
        $this->accion = "paciente";
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
        $obra_social_id = Paciente::where('paciente', $this->paciente)->get()->pluck('obra_social_id')->first();
        $this->obra_social = obras_socials::where('id', $obra_social_id)->get()->pluck('obra_social')->first();
            
        //Si encontramos al paciente mostramos sus movimientos
        if ($this->documento != "") {
            $this->movimientos_paciente();
        } 
    }

    public function actualizar_datos()
    {
        $actualizo = Paciente::where('documento', $this->documento)->update([
            'paciente' => $this->paciente,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'obra_social' => $this->obra_social
        ]);
    }

    public function movimientos_paciente()
    {
        $this->movimientos_paciente = Pacientes_turno::join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'pacientes_turnos.fecha', 'pacientes_turnos.fecha_hora', 'users.name', 'horarios.horario', 'pacientes_turnos.letra', 'pacientes_turnos.id', 
        'pacientes_turnos.para', 'pacientes_turnos.asistio', 'pacientes_turnos.comentarios')
        ->where('documento', $this->documento)->orderBy('fecha', 'DESC')->take(10)->get();
    }

    public function editar_turno($fecha, $horario, $id_horario, $para)
    {
        $this->accion = "editar turno";
        $this->fecha_turno = $fecha;
        $this->horario_turno = $horario;
        $this->id_horario_viejo = $id_horario;
        
        $this->para = $para;
        if ($this->para == 'general') {
            $this->horarios();
        } elseif ($this->para == 'dengue') {
            $this->horarios_dengue();
        } elseif ($this->para == 'exudado'){
            $this->horarios_exudado();
        } elseif ($this->para == 'espermograma'){
            $this->horarios_espermograma();
        } elseif ($this->para == 'citogenetica'){
            $this->horarios_citogenetica();
        }
    }

    public function horarios()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')
        ->orderBy('horarios.horario')->get();
        $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
    }

    public function horarios_dengue()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'dengue')
        ->orderBy('horarios.horario')->get();
        $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
    }

    public function horarios_exudado()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'exudado')
        ->orderBy('horarios.horario')->get();
        $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
    }

    public function horarios_espermograma()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'espermograma')
        ->orderBy('horarios.horario')->get();
        $this->cantidad_turnos = config::get()->pluck('cant_turnos_esp')->first();
    }

    public function horarios_citogenetica()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'citogenetica')
        ->orderBy('horarios.horario')->get();
        $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
    }

    //Generamos el ID del turno
    public function genero_id_turno()
    {
        $valor = valores_turno::orderBy('valor', 'DESC')->get()->pluck('valor')->first();

        if (empty($valor)) {
           $valor = 1;
           $inserto = valores_turno::create(['valor' => $valor]);
        } else {
           $valor = $valor + 1;
           $actualizo = valores_turno::where('id', 1)->update(['valor' => $valor]);
        }
 
        $id_usuario = Auth::user()->id;

        if (strlen($valor) == 1) {
           $valor = "00000" .$valor;
        } elseif (strlen($valor) == 2) {
            $valor = "0000" .$valor;
        } elseif (strlen($valor) == 3) {
            $valor = "000" .$valor;
        }   elseif (strlen($valor) == 4) {
            $valor = "00" .$valor;
        } elseif (strlen($valor) == 5) {
            $valor = "0" .$valor;
        } elseif (strlen($valor) >= 6) {
            $valor = $valor;
        }

        $this->id_turno = $id_usuario. '-' .$valor;
    }

     //Guardamos el nuevo turno
     public function nuevo_turno($id_horario, $id_usuario, $para)
     {
        $this->genero_id_turno();

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
            'id_turno' => $this->id_turno,
            'id' => $id_num,
            'letra' => $letra,
            'fecha' => $this->fecha_nuevo_turno,
            'id_horario' => $this->id_nuevo_horario,
            'documento' => $this->documento,
            'id_usuario' => $id_usuario,
            'fecha_hora' => $fecha_hora,
            'para' => $para,
            'asistio' => 'no',
            'comentarios' => ''
        ]);
 
        if ($guardo_turno) {
            $elimino_anterior = pacientes_turno::where('documento', $this->documento)->where('id_horario', $this->id_horario_viejo)
            ->where('fecha', $this->fecha_turno)->delete();
            if ($elimino_anterior) {
                $this->cancelar_edicion();
            }
        }       
     }

    public function cancelar_edicion()
    {
        $this->accion = "paciente";
        $this->movimientos_paciente();
    }
}
