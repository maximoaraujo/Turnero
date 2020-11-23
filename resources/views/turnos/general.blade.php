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
            <div class = "row">
                <div class = "col-sm-5">
                    <input type = "number" class = "form-control" placeholder="Documento">
                </div>
                <div class = "col-sm-7">
                    @if($horario->horario == '06:30')
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="p75">
                        <label class="custom-control-label" for="p75">P75</label>
                    </div>
                    @endif
                    <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="ley">
                        <label class="custom-control-label" for="ley">Ley 26743</label>
                    </div>
                </div>
                <div class = "col-sm-3">
                    
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" placeholder="Paciente">
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" placeholder="Domicilio">
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-5">
                    <input type = "text" class = "form-control" placeholder="Teléfono">
                </div>
                <div class = "col-sm-7">
                    <input type = "date" class = "form-control" placeholder="Fecha">
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" placeholder="Obra social">
                </div>
            </div>
            <div class = "row" style = "margin-top:5px;">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" placeholder="Comentarios">
                </div>
            </div>
            <center>
            <button class = "btn btn-success" style = "margin-top:5px;" id = "guardar">Guardar</button>
            </center>
        <!--/-->
        </div>
    </div>
</div>
@endforeach  
</div>   
@endsection
