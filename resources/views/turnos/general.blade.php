@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | General</title>

@section('contenido')
<div class = "row">
@foreach($horarios as $horario)
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">{{$horario->horario}} | {{$cantidad_turnos}}</h3>
            {{$cuento_turnos}}
        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
        <!---->
            <div class = "row">
                <div class = "col-sm-5">
                    <input type = "number" class = "form-control" placeholder="Documento">
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
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" placeholder="Teléfono">
                </div>
                <div class = "col-sm-6">
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
            <button class = "btn btn-success" style = "margin-top:5px;">Guardar</button>
            </center>
        <!--/-->
        </div>
    </div>
</div>
@endforeach  
</div>   
@endsection
