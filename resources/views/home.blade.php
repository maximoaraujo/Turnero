@extends('adminlte::page')
@extends('plantilla')

<title>Gestión de turnos | Inicio</title>

@section('content')
<button class = "btn btn-primary" data-toggle="modal" data-target="#m_calendario">Calendario <i class="far fa-calendar"></i></button>
<div class = "row" style = "margin-top:20px;">
<!--Horarios-->
<div class = "col-sm-6" style = "border-right:1px solid #E3E1E1;">
    <div class = "row">
        <div class = "col-sm-6">

            <div class="info-box">
            <span class="info-box-icon bg-info"><i class="far fa-envelope"></i></span>

            <div class="info-box-content">
                <span class="info-box-text">Messages</span>
                <span class="info-box-number">1,410</span>
            </div>
            </div>

        </div>
    </div>    
</div>
<!--Agregar turno-->
<div class = "col-sm-6">
<div class = "row">
    <div class = "col-sm-4">
        <p>Fecha: 09/12/2020</p>
    </div>
    <div class = "col-sm-3">
        <p>Horario: 06:30</p>
    </div>
    <div class = "col-sm-2">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="p75">
            <label class="custom-control-label" for="p75">P75</label>
        </div>
    </div>
    <div class = "col-sm-3">
        <div class="custom-control custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="ley">
            <label class="custom-control-label" for="ley">Ley 23715</label>
        </div>
    </div>
</div>
<div class = "row">
    <div class = "col-sm-4">
        <p>Documento</p>
        <input type = "number" class = "form-control">
    </div>
</div>
<div class = "row" style = "margin-top:7px;">
    <div class = "col-sm-6">
        <p>Paciente</p>
        <input type = "text" class = "form-control">
    </div>
    <div class = "col-sm-4">
        <p>Fecha nacimiento</p>
        <input type = "date" class = "form-control">
    </div>
</div>
<div class = "row" style = "margin-top:7px;">
    <div class = "col-sm-6">
        <p>Domicilio</p>
        <input type = "text" class = "form-control">
    </div>
    <div class = "col-sm-4">
        <p>Telefono</p>
        <input type = "text" class = "form-control">
    </div>
</div>
<div class = "row" style = "margin-top:7px;">
    <div class = "col-sm-6">
        <p>Correo</p>
        <input type = "text" class = "form-control">
    </div>
    <div class = "col-sm-4">
        <p>Obra social</p>
        <input type = "text" class = "form-control">
    </div>
</div>
<div class = "row" style = "margin-top:7px;">
<div class = "col-sm-10">
    <textarea id="comentarios" name = "comentarios" class="md-textarea form-control" rows="2"></textarea>
</div>
</div>
<center>
<button class = "btn btn-success">Guardar</button>
</center>
</div>
@endsection

@extends('calendario')
