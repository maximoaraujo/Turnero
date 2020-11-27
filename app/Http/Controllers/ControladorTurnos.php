<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\horarios_estudio;
use App\Models\horario;
use App\Models\config;
use App\Models\pacientes_turno;
use App\Models\paciente;

class ControladorTurnos extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function general()
    {        
        $horarios = horario::join('horarios_estudios', 'horarios_estudios.id_horario', 'horarios.id_horario')
        ->where('horarios_estudios.estudio', 'generales')
        ->orderBy('horarios.horario')
        ->get();

        $cantidad_turnos = config::get()->pluck('cant_turnos_gen')->first();
        $cantidad_ioscor = config::get()->pluck('cant_turnos_ioscor')->first();

        return view('turnos.general', compact('horarios', 'cantidad_turnos', 'cantidad_ioscor'));
    }

    public function busco_paciente(Request $request)
    {
        $paciente = paciente::where('documento', $request->documento)->get()->pluck('paciente')->first();
        $fecha_nac = paciente::where('documento', $request->documento)->get()->pluck('fecha_nac')->first();
        $domicilio = paciente::where('documento', $request->documento)->get()->pluck('domicilio')->first();
        $telefono = paciente::where('documento', $request->documento)->get()->pluck('telefono')->first();
        $obra_social = paciente::where('documento', $request->documento)->get()->pluck('obra_social')->first();

        return $paciente. ';' .$fecha_nac. ';' .$domicilio. ';' .$telefono. ';' .$obra_social;
    }

    public function guardo_general(Request $request)
    {
        //Array con la cantidad de turnos disponibles
        $cons_turnos = config::get()->pluck('cant_turnos_gen')->first();

        for ($i=1; $i < $cons_turnos + 1; $i++) { 
            $array_turnos[] = $i;
        }    
        
        //Letra según el horario seleccionado
        $letra = horario::where('id_horario', $request->id_horario)->get()->pluck('letra')->first();
        
        //Array con los turnos ya ocupados
        $cons_ocupados = pacientes_turno::join('horarios', 'horarios.id_horario', 'pacientes_turnos.id_horario')
        ->select('pacientes_turnos.id')
        ->where('horarios.id_horario', $request->id_horario)
        ->where('pacientes_turnos.fecha', $request->fecha_turno)
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

        //Verificamos la fecha de nacimiento
        if (empty($request->fecha_nacimiento)) {
            $fecha_de_nacimiento = date('Y-m-d');    
        } else {
            $fecha_de_nacimiento = $request->fecha_nacimiento;
        }

        //Verificamos si es para p75
        if (empty($request->p75)) {
            $para = 'general';
        } else{
            $para = 'P75';
        }

        $fecha_hora = date('Y-m-d H:m:s');

        $cantidad = paciente::where('documento', $request->documento)->get()->count();

        if (empty($cantidad)) {
            $guardo_paciente = paciente::create([
                'documento' => $request->documento,
                'paciente' => $request->paciente,
                'fecha_nac' => $fecha_de_nacimiento,
                'domicilio' => $request->domicilio,
                'telefono' => $request->telefono,
                'correo' => '-',
                'obra_social' => $request->obra_social
            ]);

            $guardo_turno = pacientes_turno::create([
                'id' => $id_num,
                'letra' => $letra,
                'fecha' => $request->fecha_turno,
                'id_horario' => $request->id_horario,
                'documento' => $request->documento,
                'id_usuario' => $request->id_usuario,
                'fecha_hora' => $fecha_hora,
                'para' => $para,
                'asistio' => 'no',
                'comentarios' => $request->comentarios
            ]);

            if (($actualizo_paciente)&&($guardo_turno)) {
                echo "Correcto";
            }

        } else {
            $actualizo_paciente = paciente::where('documento', $request->documento)->update([
                'documento' => $request->documento,
                'paciente' => $request->paciente,
                'fecha_nac' => $fecha_de_nacimiento,
                'domicilio' => $request->domicilio,
                'telefono' => $request->telefono,
                'correo' => '-',
                'obra_social' => $request->obra_social
            ]);

            $guardo_turno = pacientes_turno::create([
                'id' => $id_num,
                'letra' => $letra,
                'fecha' => $request->fecha_turno,
                'id_horario' => $request->id_horario,
                'documento' => $request->documento,
                'id_usuario' => $request->id_usuario,
                'fecha_hora' => $fecha_hora,
                'para' => $para,
                'asistio' => 'no',
                'comentarios' => $request->comentarios
            ]);

            if (($actualizo_paciente)&&($guardo_turno)) {
                echo "Correcto";
            }   
        }
    }

    public function comprobante_turno($fecha, $id, $documento, $paciente)
    {
        $fecha = $fecha;
        $id_horario = $id;
        $documento = $documento;
        $paciente = $paciente;

        return view('impresiones.comprobante_turno', compact('fecha', 'id_horario', 'documento', 'paciente'));
    }
}
