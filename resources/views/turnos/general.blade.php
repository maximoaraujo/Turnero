@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | General</title>

@section('contenido')
<div class = "row">
<?php 
    if (empty($fecha = $_GET['f'])) {
        $fecha = date('Y-m-d');
    }
?>    
<div class = "col-sm-2" style = "margin-top:10px;">
    <input type = "date" class = "form-control" name = "fecha_turno" id = "fecha_turno" min = "<?php echo $fecha=date('Y-m-d'); ?>" value = "<?php echo $fecha=$_GET['f']; ?>">
</div>
<div class = "col-sm-9" style = "margin-top:10px;">
<?php
$ioscor = App\Models\paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
->join('obras_socials', 'obras_socials.id', 'pacientes.obra_social_id')
->where('pacientes_turnos.fecha', $fecha)
->where('pacientes_turnos.para', 'general')
->where('obras_socials.obra_social', 'IOSCOR')->get()->count();
?>
@if($cantidad_ioscor <= $ioscor)
<center>
<div class="callout callout-danger">
    <h5>¡No asignar más turnos a pacientes con IOSCOR!</h5>
    <p>¡El límite de turnos permitidos fue alcanzado, intente con una fecha distinta!</p>
</div>
</center>
@endif
<center>
<div class="callout callout-info" id = "no_laboral" style = "display:none;">
    <h5>¡Día no laborable!</h5>
    <p>El laboratorio permanecerá cerrado el <?php echo $fecha_sel = date('d-m-Y', strtotime($fecha)); ?>, seleccione otra fecha para asignar un turno</p>
</div>
</center>
</div>
</div>
<div class = "row" id = "row_general">
@foreach($horarios as $horario)
<div class = "col-sm-4" style = "margin-top:10px;">
    <div class="card card-navy collapsed-card">
        <div class="card-header">
            <?php
                $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha],['id_horario', $horario->id_horario]])->get()->count();
            ?>
            @if(($horario->horario == '08:50')||($horario->horario == '09:10'))
            <?php $cantidad_turnos = 10; ?>
            <h3 class="card-title"><span style = "font-size:22px;">{{$horario->horario}}</span> <br> <?php echo $cantidad; ?> | {{$cantidad_turnos}}</h3>
            @else
            <h3 class="card-title"><span style = "font-size:22px;">{{$horario->horario}}</span> <br> <?php echo $cantidad; ?> | {{$cantidad_turnos}}</h3>
            @endif
            @if(($cantidad < $cantidad_turnos)||(Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style = "display:'.$estado.'">
                <i class="fas fa-plus" style = "margin-top:20px;"></i></button>
            </div>
            @endif
        </div>
        <div class="card-body" style="display: none;">
            <div class = "row">
                <input type = "number" id = "id_usuario" name = "id_usuario" value = "{{Auth::user()->id}}" hidden>
                <input type = "number" id = "id_horario" name = "id_horario" value = "{{$horario->id_horario}}" hidden>
                <input type = "text" class = "form-control" id = "id_turno{{$horario->id_horario}}" hidden>   
            <div class = "col-sm-5">
                <input type = "number" class = "form-control" id = "documento{{$horario->id_horario}}" placeholder="Documento" required>
            </div>
            <div class = "col-sm-7">
            <?php
                $p75 = App\Models\pacientes_turno::where([['fecha', $fecha],['para', 'P75']])->get()->count();
            ?>
                @if($horario->horario == '06:30')
                    @if((date('l', strtotime($fecha)) == 'Wednesday') || (date('l', strtotime($fecha)) == 'Friday'))
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="p75">
                        <label class="custom-control-label" for="p75">P75 - <span style = "color:red;"><?php echo $p75; ?></span></label>
                        <input type = "text" id = "p75_" hidden>
                    </div>
                    @endif
                @endif
                @if(date('l', strtotime($fecha)) == 'Tuesday')
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input ley{{$horario->id_horario}}" id="ley{{$horario->id_horario}}">
                    <label class="custom-control-label" for="ley{{$horario->id_horario}}">Ley 26743</label>
                </div>
                @endif
            </div>
        </div>
        <center>
            <span class="loader" id = "loader{{$horario->id_horario}}" style = "display:none;"></span>
        </center>
        <div id = "cuerpo_turno{{$horario->id_horario}}">
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "paciente{{$horario->id_horario}}"  placeholder="Paciente" required>
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "domicilio{{$horario->id_horario}}" placeholder="Domicilio" required>
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-5">
                <input type = "text" class = "form-control" id = "telefono{{$horario->id_horario}}" placeholder="Teléfono" required>
            </div>
            <div class = "col-sm-7">
                <input type = "date" class = "form-control" id = "fecha_nacimiento{{$horario->id_horario}}" placeholder="Fecha">
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <input type = "number" id = "nomenclador_general" hidden>
            <div class = "col-sm-12">
            <select class="browser-default custom-select" id = "obra_social{{$horario->id_horario}}">
                <option selected="selected">--</option>
                @foreach($obras_sociales as $obra_social)
                <option value = "{{$obra_social->id}}">{{$obra_social->obra_social}}</option>
                @endforeach    
            </select>
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "comentarios{{$horario->id_horario}}" placeholder="Comentarios">
            </div>
        </div>
        <center>
            <button class = "btn btn-primary mt-2" id = "practicas{{$horario->id_horario}}" disabled>Prácticas</button>
            <button class = "btn btn-success mt-2" id = "guardar{{$horario->id_horario}}">Guardar</button>
        </center>
        </div>
        </div> 
        </div>
    </div>
@endforeach
</div>
@endsection

@extends('turnos.modales.modal_practicas')
