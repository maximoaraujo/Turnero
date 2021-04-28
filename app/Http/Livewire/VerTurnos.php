<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\horario;
use App\Models\pacientes_turno;
use App\Models\turnos_eliminado;
use App\Models\turnos_practica;
use App\Models\ordenes_turno;
use App\Models\paciente;
use App\Models\config;
use App\Models\valores_turno;
use App\Models\obras_socials;
use DB;
use Carbon\Carbon;
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
    public $horario_turno, $id_horario_viejo, $fecha_turno, $id_turno_viejo;
    //ID del nuevo horario al editar un turno
    public $id_nuevo_horario;
    //ID de la obra social
    public $obra_social_id;
    //Cantidad de turnos por tipo de estudio
    public $cantidad_turnos;
    //Turnos por tipo de estudio
    public $turnos_dengue = [];
    public $turnos_exudado = [];
    public $turnos_espermograma = [];
    public $turnos_generales = [];
    public $turnos_citogenetica = [];
    public $turnos_p75 = [];
    public $obras_sociales = [];
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
    public $usuario;
    public $picked;
    //Ausentes
    public $ausentes;

    public function mount()
    {   
        $this->opcion_sel = "General";
        $this->accion = "ver";
        $this->fecha = date('Y-m-d');
        $this->cargo_horarios();
        $this->cargo_dengue();
        $this->cargo_espermograma();
        $this->cargo_exudado();
        $this->cargo_generales();
        $this->cargo_p75();
        $this->cargo_citogenetica();
        $this->picked = true;
        $this->para = 'general';
        $this->ausentes = "";
    }

    //Cargamos los horarios por estudio
    public function cargo_horarios()
    {
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
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_den)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio', 'pacientes_turnos.created_at')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para EXUDADO
    public function cargo_exudado()
    {
        $condicion_exu = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'exudado'];
        $this->turnos_exudado = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_exu)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio', 'pacientes_turnos.created_at')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para ESPERMOGRAMA
    public function cargo_espermograma()
    {
        $condicion_esp = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'espermograma'];
        $this->turnos_espermograma = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_esp)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio', 'pacientes_turnos.created_at')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para GENERALES
    public function cargo_generales()
    {   
        if ($this->ausentes == 1) {
            $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general', 'pacientes_turnos.asistio' => 'no'];
            $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
            ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
            ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
            ->where($condicion_gen)
            ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
            'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio',
            'pacientes_turnos.created_at')->orderBy('horarios.horario')->get();
        } else {
            $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general'];
            $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
            ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
            ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
            ->where($condicion_gen)
            ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
            'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio',
            'pacientes_turnos.created_at')->orderBy('horarios.horario')->get();
        } 
    }

    //Filtramos los horarios GENERALES por horario seleccionado
    public function generales_x_horario()
    {
        if ($this->ausentes == 1) {
            $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general', 'pacientes_turnos.id_horario' => $this->horario_sel, 'pacientes_turnos.asistio' => 'no'];
            $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
            ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
            ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
            ->where($condicion_gen)
            ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
            'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 
            'pacientes_turnos.asistio', 'pacientes_turnos.created_at')->orderBy('horarios.horario')
            ->get(); 
        } else {
            $condicion_gen = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'general', 'pacientes_turnos.id_horario' => $this->horario_sel];
            $this->turnos_generales = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
            ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
            ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
            ->where($condicion_gen)
            ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
            'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 
            'pacientes_turnos.asistio', 'pacientes_turnos.created_at')->orderBy('horarios.horario')
            ->get(); 
        }   
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
        'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio', 'pacientes_turnos.created_at')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Traemos los horarios para GENERALES
    public function cargo_citogenetica()
    {
        $condicion_cit = ['pacientes_turnos.fecha' => $this->fecha, 'pacientes_turnos.para' => 'citogenetica'];
        $this->turnos_citogenetica = pacientes_turno::join('horarios', 'pacientes_turnos.id_horario', 'horarios.id_horario')
        ->join('pacientes', 'pacientes_turnos.documento', 'pacientes.documento')
        ->join('users', 'users.id', 'pacientes_turnos.id_usuario')
        ->where($condicion_cit)
        ->select('pacientes_turnos.id_turno', 'pacientes_turnos.id_horario', 'horarios.horario', 'pacientes_turnos.id', 'pacientes_turnos.letra', 'pacientes.paciente', 'pacientes.documento', 
        'users.name', 'pacientes.domicilio', 'pacientes.telefono', DB::raw("(SELECT obra_social FROM obras_socials WHERE obras_socials.id = pacientes.obra_social_id) AS obra_social"), 'pacientes_turnos.asistio', 'pacientes_turnos.created_at')
        ->orderBy('horarios.horario')
        ->get();
    }

    //Después de actualizar la fecha o el horario seleccionado mostramos los turnos
    public function updated($fecha, $horario_sel)
    {
        $this->cargo_horarios();
        $this->cargo_dengue();
        $this->cargo_espermograma();
        $this->cargo_exudado();
        $this->generales_x_horario();
        $this->cargo_p75();
        $this->cargo_citogenetica();

        if ($this->para == 'general') {
            $this->horarios();
        } elseif ($this->para == 'P75') {
            $this->horarios_p75();
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
            $this->cargo_espermograma();
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
        $this->obra_social_id = paciente::where('documento', $this->documento)->get()->pluck('obra_social_id')->first();
        $this->obra_social = obras_socials::where('id', $this->obra_social_id)->get()->pluck('obra_social')->first();
    }

    //Mostramos los resultados 
    public function buscarObrasocial()
    {
        $this->picked = false;
    
        $this->obras_sociales = obras_socials::where("obra_social", 'LIKE', '%' .$this->obra_social. '%')
        ->take(3)
        ->get();      
    }
    
    //Asignamos la obra social a la que se le hizo click
    public function asignarObrasocial($obra_social)
    {        
        $this->obra_social = $obra_social;        
        $this->picked = true;
        $this->asigno_id_obrasocial();
    }

    public function asigno_id_obrasocial()
    {
        $this->obra_social_id = obras_socials::where('obra_social', $this->obra_social)->get()->pluck('id')->first();
    }

    //Guardamos la actualización de datos del paciente
    public function actualizo_datos()
    {
        $actualizo_datos = paciente::where('documento', $this->documento)->update([
            'paciente' => $this->paciente,
            'fecha_nac' => $this->fecha_nacimiento,
            'domicilio' => $this->domicilio,
            'telefono' => $this->telefono,
            'obra_social_id' => $this->obra_social_id
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
        $this->cargo_espermograma();
        $this->cargo_exudado();
        $this->generales_x_horario();
        $this->cargo_p75();
        $this->cargo_citogenetica();
    }

    public function editar_turno($id_turno, $fecha, $horario, $id_horario, $para)
    {
        $this->id_turno_viejo = $id_turno;
        $this->documento = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('documento')->first();
        $this->paciente = paciente::where('documento', $this->documento)->get()->pluck('paciente')->first();
        $this->accion = "editar turno";
        $this->fecha_turno = $fecha;
        $this->horario_turno = $horario;
        $this->id_horario_viejo = $id_horario;
        $this->fecha_nuevo_turno = date('Y-m-d');

        $this->para = $para;
        if ($this->para == 'general') {
            $this->horarios();
        } elseif ($this->para == 'P75') {
            $this->horarios_p75();
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

    public function horarios_p75()
    {
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'P75')
        ->orderBy('horarios.horario')->get();
        $this->cantidad_turnos = config::get()->pluck('cant_turnos_p75')->first(); 
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
            'comentarios' => '',
            'desde_id' => 1
        ]);
 
        if ($guardo_turno) {
            $ids = turnos_practica::where('id_turno', $this->id_turno_viejo)->get();
            foreach($ids as $id){
                $actualizo_id_turno = turnos_practica::where('id', $id->id)->update([
                    'id_turno' => $this->id_turno
                ]);
            }
            $elimino_anterior = pacientes_turno::where('documento', $this->documento)->where('id_horario', $this->id_horario_viejo)
            ->where('fecha', $this->fecha_turno)->delete();
            if ($elimino_anterior) {
                $this->cancelar_edicion();
            }
        }       
    }

    //Eliminamos el turno seleccionado
    public function eliminar_turno($id_turno, $documento)
    {
        $num = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('id')->first();
        $letra = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('letra')->first();
        $fecha = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('fecha')->first();
        $id_horario = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('id_horario')->first();
        $documento = pacientes_turno::where('id_turno', $id_turno)->get()->pluck('documento')->first();

        $inserto_eliminado = turnos_eliminado::create([
            'id_turno' => $id_turno,
            'num' => $num,
            'letra' => $letra,
            'fecha' => $fecha,
            'id_horario' => $id_horario,
            'documento' => $documento,
            'user_id' => Auth::user()->id
        ]);

        if ($inserto_eliminado) {
            $elimino_practicas = turnos_practica::where('id_turno', $id_turno)->delete();
            $elimino_ordenes = ordenes_turno::where('id_turno', $id_turno)->delete();
            $elimino_turno = pacientes_turno::where('id_turno', $id_turno)->delete();
    
            $this->generales_x_horario();
            $this->cargo_dengue();
            $this->cargo_espermograma();
            $this->cargo_exudado();
            $this->cargo_citogenetica();
        }
    }

}
