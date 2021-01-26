<?php

namespace App\Http\Livewire;

use Livewire\Component;
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
use Illuminate\Support\Facades\Auth;

class Generales extends Component
{
    public $fecha;
    public $vista;
    public $nomenclador;
    public $id_turno, $id_practica, $codigo_practica;
    //Parametros para la busqueda
    public $picked, $picked_;
    public $obras_sociales = [];
    public $practicas = [];
    public $horarios = [];
    //Buscadores
    public $obrasocial, $practica;
    public $cantidad_turnos, $cantidad_ioscor;
    //Datos del paciente
    public $documento, $paciente, $domicilio, $telefono, $fecha_nacimiento, $obra_social_id;

    public function mount()
    {
        $this->fecha = date('Y-m-d');
        $this->vista = 'asignar';
        $this->picked = true;
        $this->picked_1 = true;
        $this->general();
    }

    public function general()
    {     
        $this->horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')
        ->orderBy('horarios.horario')
        ->get();

        $this->cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
        $this->cantidad_ioscor = config::get()->pluck('cant_turnos_ioscor')->first();
    }

    public function Asignarturno()
    {
        $this->vista = 'asignar';
    }

    public function buscoPaciente()
    {
        $this->paciente = paciente::where('documento', $this->documento)->get()->pluck('paciente')->first();
        $this->domicilio = paciente::where('documento', $this->documento)->get()->pluck('domicilio')->first();
        $this->telefono = paciente::where('documento', $this->documento)->get()->pluck('telefono')->first();
        $this->fecha_nacimiento = paciente::where('documento', $this->documento)->get()->pluck('fecha_nac')->first();
        $this->genero_id_turno();
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
        $this->vista = 'general';
    }
    
    public function buscar_x_codigo()
    {
        $this->id_practica = practica::where('codigo', $this->codigo_practica)->where('nomenclador', $this->nomenclador)
        ->get()->pluck('id_practica')->first();
        $this->practica = practica::where('codigo', $this->codigo_practica)->where('nomenclador', $this->nomenclador)
        ->get()->pluck('practica')->first();

        if (($this->id_practica != '')&&($this->practica != '')) {
            $this->guardoPractica();
        }
    }

    //Mostramos los resultados al tipear la práctica
    public function buscarPractica()
    {
        $this->picked_ = false;
    
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
    }

    //Guardamos las prácticas
    public function guardoPractica()
    {
        $this->validate([
            'codigo_practica'=>'required', 'practica'=>'required'
        ]);

        $guardoPractica = turnos_practica::create([
            'id_turno' => $this->id_turno,
            'id_obra_social' => $this->obra_social_id,
            'id_practica' => $this->id_practica,
            'cantidad' => 1
        ]);
    }

}
