@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | General</title>

@section('contenido')
<div class = "row">
<div class = "col-sm-2" style = "margin-top:10px;">
    <input type = "date" class = "form-control" id = "fecha_turno" min = "<?php echo $fecha=date('Y-m-d'); ?>" value = "<?php echo $fecha=$_GET['f']; ?>">
</div>
</div>
<div class = "row">    
@foreach($horarios as $horario)
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <?php
            $fecha_turno = $_GET['f'];
            if (empty($fecha_turno)) {
                $fecha_turno = date('Y-m-d');    
            }
            $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha_turno], ['id_horario', $horario->id_horario]])->get()->count();
        ?>
        <h3 class="card-title">{{$horario->horario}} - <?php echo $cantidad; ?> | {{$cantidad_turnos}}</h3>
        <div class="card-tools" style = "margin-top:10px;">
            @if($cantidad < $cantidad_turnos)
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
            @endif
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
        <!---->
        <form method = "POST" action = "{{ route('guardo_general') }}">
        @csrf
            <div class = "row">
                <input type = "number" name = "id_usuario" value = "{{Auth::user()->id}}" hidden>
                <input type = "number" name = "id_horario" value = "{{$horario->id_horario}}" hidden>
                <input type = "date" class = "form-control" name = "fecha_turno" value = "<?php echo $fecha=$_GET['f']; ?>" hidden>
                <div class = "col-sm-5">
                    <input type = "number" class = "form-control" id = "documento{{$horario->id_horario}}" name = "documento" placeholder="Documento" required>
                </div>
                <div class = "col-sm-7">
                    @if($horario->horario == '06:30')
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name = "p75" id="p75">
                        <label class="custom-control-label" for="p75">P75</label>
                    </div>
                    @endif
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" name = "ley{{$horario->id_horario}}" id="ley{{$horario->id_horario}}">
                        <label class="custom-control-label" for="ley{{$horario->id_horario}}">Ley 26743</label>
                    </div>
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" id = "paciente{{$horario->id_horario}}" name = "paciente" placeholder="Paciente" required>
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" id = "domicilio{{$horario->id_horario}}" name = "domicilio" placeholder="Domicilio" required>
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-5">
                    <input type = "text" class = "form-control" id = "telefono{{$horario->id_horario}}" name = "telefono" placeholder="Teléfono" required>
                </div>
                <div class = "col-sm-7">
                    <input type = "date" class = "form-control" id = "fecha_nacimiento{{$horario->id_horario}}" name = "fecha_nacimiento" placeholder="Fecha">
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" id = "obra_social{{$horario->id_horario}}" name = "obra_social" placeholder="Obra social" required>
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" name = "comentarios" placeholder="Comentarios">
                </div>
            </div>
            <center>
            <button type = "submit" class = "btn btn-success" style = "margin-top:5px;" id = "guardar">Guardar</button>
            </center>
        </form>    
        <!--/-->
        </div>
    </div>
</div>
@endforeach  
</div>   
@endsection

