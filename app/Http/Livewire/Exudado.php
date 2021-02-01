<?php

namespace App\Http\Livewire;

use App\Models\horarios_estudio;
use App\Models\horario;
use App\Models\config;
use App\Models\pacientes_turno;
use App\Models\valores_turno;
use App\Models\paciente;
use App\Models\obras_socials;
use App\Models\no_laborale;
use App\Models\practica;
use App\Models\turnos_practica;
use App\Models\usuario_fechs;
use Illuminate\Support\Facades\Auth;

use Livewire\Component;

class Exudado extends Component
{
    public $fecha;
    public $vista;
    public $id_usuario;
    public $para, $ley;
    public $nomenclador;
    public $horario;
    public $no_laboral;
    public $id_turno, $id_practica, $codigo_practica;
    public $encontrado;
    //Parametros para la busqueda
    public $picked, $picked_;
    public $obras_sociales = [];
    public $practicas = [];
    public $horarios = [];
    public $practicas_agregadas = [];
    //Buscadores
    public $obrasocial, $practica;
    public $cantidad_turnos, $cantidad_ioscor;
    //Horarios
    public $id_horario;
    //Datos del paciente
    public $documento, $paciente, $domicilio, $telefono, $fecha_nacimiento, $comentarios, $obra_social_id;

    public function mount()
    {
        $this->id_usuario = Auth::user()->id;
        $this->usuario_fecha();
        $this->vista = 'turnos';
        $this->picked = true;
        $this->picked_1 = true;
        $this->horarios();
        $this->para = 'exudado'; 
        $this->encontrado = "";
    }

    public function usuario_fecha()
    {
        $contar = usuario_fechs::where('id_usuario', $this->id_usuario)->get()->count();

        if (empty($contar)) {
            $inserto = usuario_fechs::create([
                'id_usuario' => $this->id_usuario,
                'fecha' => date('Y-m-d')
            ]);
        }

        $this->fecha = usuario_fechs::where('id_usuario', $this->id_usuario)->get()->pluck('fecha')->first();
    }

    public function no_laborales()
    {
        $this->no_laboral = no_laborale::where('fecha', $this->fecha)->get()->count();
    }

    public function updated($fecha)
    {   
        $fecha = date('Y-m-d');
        if ($this->fecha >= $fecha) {
            $actualizo = usuario_fechs::where('id_usuario', $this->id_usuario)->update([
                'fecha' => $this->fecha
            ]);
        }
        
        $this->fecha = usuario_fechs::where('id_usuario', $this->id_usuario)->get()->pluck('fecha')->first();
        $this->no_laborales();    
    }

    public function horarios()
    {     
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'exudado')
        ->orderBy('horarios.horario')
        ->get();

        $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
        $this->cantidad_ioscor = config::get()->pluck('cant_turnos_ioscor')->first();
    }

    public function Asignarturno($id_horario)
    {
        $this->id_horario = $id_horario;
        $this->horario = horario::where('id_horario', $this->id_horario)->get()->pluck('horario')->first();
        $this->vista = 'asignar';
    }

    public function buscoPaciente()
    {
        $this->paciente = paciente::where('documento', $this->documento)->get()->pluck('paciente')->first();
        $this->domicilio = paciente::where('documento', $this->documento)->get()->pluck('domicilio')->first();
        $this->telefono = paciente::where('documento', $this->documento)->get()->pluck('telefono')->first();
        $this->fecha_nacimiento = paciente::where('documento', $this->documento)->get()->pluck('fecha_nac')->first();
        $this->obra_social_id = paciente::where('documento', $this->documento)->get()->pluck('obra_social_id')->first();
        $this->obrasocial = obras_socials::where('id', $this->obra_social_id)->get()->pluck('obra_social')->first();
        $this->nomenclador = obras_socials::where('id', $this->obra_social_id)->get()->pluck('nomenclador')->first();
        $this->genero_id_turno();

        if (empty($this->paciente)) {
            $this->encontrado = "No";
        } else {
            $this->encontrado = "Si";
        }
    }

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

        $this->id_turno = $this->id_usuario. '-' .$valor;
    }

    //Mostramos los resultados 
    public function buscarObrasocial()
    {
        $this->picked = false;
    
        $this->obras_sociales = obras_socials::where("obra_social", 'LIKE', '%' .$this->obrasocial. '%')
        ->take(3)
        ->get();      
    }
    
    //Asignamos la obra social a la que se le hizo click
    public function asignarObrasocial($obra_social)
    {        
        $this->obrasocial = $obra_social;        
        $this->picked = true;
        $this->asigno_id_obrasocial();
    }

    public function asigno_id_obrasocial()
    {
        $this->obra_social_id = obras_socials::where('obra_social', $this->obrasocial)->get()->pluck('id')->first();
        $this->nomenclador = obras_socials::where('id', $this->obra_social_id)->get()->pluck('nomenclador')->first();
    }

    public function cancelar()
    {
        $this->vista = 'turnos';
    }
    
    public function buscar_x_codigo()
    {
        $this->muestro_practicas();

        $this->id_practica = practica::where('codigo', $this->codigo_practica)->where('nomenclador', $this->nomenclador)
        ->get()->pluck('id_practica')->first();
        $this->practica = practica::where('codigo', $this->codigo_practica)->where('nomenclador', $this->nomenclador)
        ->get()->pluck('practica')->first();

        if (($this->id_practica != '')&&($this->practica != '')) {
            $this->guardoPractica();
            $this->reset('id_practica', 'codigo_practica', 'practica');
        }
    }

    //Mostramos los resultados al tipear la práctica
    public function buscarPractica()
    {
        $this->picked_ = false;
    
        $this->muestro_practicas();  

        $this->practicas = practica::where("practica", 'LIKE', '%' .$this->practica. '%')
        ->where('nomenclador', $this->nomenclador)
        ->take(3)
        ->get();    
    }
    
    //Asignamos la práctica a la que se le hizo click
    public function asignarPractica($practica)
    {        
        $this->practica = $practica;        
        $this->picked_ = true;
        $this->asignoCodigo();
    }

    public function asignoCodigo()
    {
        $this->id_practica = practica::where('practica', $this->practica)->get()->pluck('id_practica')->first();
        $this->codigo_practica = practica::where('practica', $this->practica)->get()->pluck('codigo')->first();
        
        if (($this->id_practica != '')&&($this->practica != '')) {
            $this->guardoPractica();
            $this->reset('id_practica', 'codigo_practica', 'practica');
        }
    }

    //Guardamos las prácticas
    public function guardoPractica()
    {
        $this->validate([
            'codigo_practica'=>'required', 'practica'=>'required'
        ]);

        $guardoPractica = turnos_practica::create([
            'id_turno' => $this->id_turno,
            'obra_social_id' => $this->obra_social_id,
            'id_practica' => $this->id_practica,
            'cantidad' => 1
        ]);

        if ($guardoPractica) {
            $this->muestro_practicas();
        }
    }

    public function muestro_practicas()
    {
        $this->practicas_agregadas = turnos_practica::join('practicas', 'practicas.id_practica', 'turnos_practicas.id_practica')
        ->select('turnos_practicas.id', 'practicas.codigo', 'practicas.practica')
        ->where('turnos_practicas.id_turno', $this->id_turno)
        ->where('practicas.nomenclador', $this->nomenclador)->orderBy('practicas.codigo')
        ->get();
    }

    public function eliminarPractica($id_practica)
    {
        $eliminar = turnos_practica::where('id', $id_practica)->where('id_turno', $this->id_turno)->delete();
        $this->muestro_practicas();
    }

    public function guardo_turno()
    {
		//Validamos los campos obligatorios
		$this->validate(['documento'=>'required', 'paciente'=>'required', 'obrasocial'=>'required']);
        //Array con la cantidad de turnos disponibles
        $cons_turnos = config::get()->pluck('cant_turnos_gen')->first();

        for ($i=1; $i < $cons_turnos + 1; $i++) { 
            $array_turnos[] = $i;
        }    
        
        //Letra según el horario seleccionado
        $letra = horario::where('id_horario', $this->id_horario)->get()->pluck('letra')->first();
        
        //Array con los turnos ya ocupados
        $cons_ocupados = pacientes_turno::join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->select('pacientes_turnos.id')
        ->where('horarios.id_horario', $this->id_horario)
        ->where('pacientes_turnos.fecha', $this->fecha)
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
        if (reset($array_libres) == 0) {
            $id_num = pacientes_turno::where('fecha', $this->fecha)
            ->where('id_horario', $this->id_horario)->orderBy('id', 'DESC')->get()->pluck('id')->first() + 1 ;
        } else {
            $id_num = reset($array_libres);
        }
        
        //Verificamos valores vacios
        //Domicilio
        if (empty($this->domicilio)) {
            $domicilio = "CTES";
        } else {
            $domicilio = $this->domicilio;
        }
        //Teléfono
        if (empty($this->telefono)) {
            $telefono = 0;
        } else {
            $telefono = $this->telefono;
        }
        //Fecha de nacimiento
        if (empty($this->fecha_nacimiento)) {
            $fecha_de_nacimiento = date('Y-m-d');    
        } else {
            $fecha_de_nacimiento = $this->fecha_nacimiento;
        }

        //Verificamos si es para ley
        if (empty($this->ley)) {
            $this->comentarios = $this->comentarios;
        } else {
            $this->comentarios = $this->comentarios. '- Ley 26743';
        }

        $fecha_hora = date('Y-m-d H:m:s');

        $cantidad = paciente::where('documento', $this->documento)->get()->count();

        if (empty($cantidad)) {
            $guardo_paciente = paciente::create([
                'documento' => $this->documento,
                'paciente' => $this->paciente,
                'fecha_nac' => $fecha_de_nacimiento,
                'domicilio' => $domicilio,
                'telefono' => $telefono,
                'correo' => '-',
                'obra_social_id' => $this->obra_social_id
            ]);

            $guardo_turno = pacientes_turno::create([
                'id_turno' => $this->id_turno,
                'id' => $id_num,
                'letra' => $letra,
                'fecha' => $this->fecha,
                'id_horario' => $this->id_horario,
                'documento' => $this->documento,
                'id_usuario' => $this->id_usuario,
                'fecha_hora' => $fecha_hora,
                'para' => $this->para,
                'asistio' => 'no',
                'comentarios' => $this->comentarios
            ]);

            if (($guardo_paciente)&&($guardo_turno)) {
                $this->comprobante_turno($this->id_turno);
            }

        } else {
            $actualizo_paciente = paciente::where('documento', $this->documento)->update([
                'documento' => $this->documento,
                'paciente' => $this->paciente,
                'fecha_nac' => $fecha_de_nacimiento,
                'domicilio' => $this->domicilio,
                'telefono' => $this->telefono,
                'correo' => '-',
                'obra_social_id' => $this->obra_social_id
            ]);

            $guardo_turno = pacientes_turno::create([
                'id_turno' => $this->id_turno,
                'id' => $id_num,
                'letra' => $letra,
                'fecha' => $this->fecha,
                'id_horario' => $this->id_horario,
                'documento' => $this->documento,
                'id_usuario' => $this->id_usuario,
                'fecha_hora' => $fecha_hora,
                'para' => $this->para,
                'asistio' => 'no',
                'comentarios' => $this->comentarios
            ]);

            if (($actualizo_paciente)&&($guardo_turno)) {
                $this->comprobante_turno($this->id_turno);
            }
        }
    }

    public function comprobante_turno($id_turno)
    {
        $id_turno = $id_turno;
        session()->flash('message', $id_turno);
        return redirect()->to('/exudado');
    }
}
