@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | Ordenes</title>

@section('contenido')
<div class = "row mt-2">
    <div class = "col-sm-12">
        <p>Paciente: {{$paciente}}</p>
        <p>Obra social: {{$obra_social}}</p>
    </div>
    <div class = "col-sm-5">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Prácticas asociadas</h3>
            </div>
            <div class="card-body">
                @foreach($practicas as $practica)
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="d-flex flex-column text-right">
                        <span class="text-muted">{{$practica->codigo}} - {{$practica->practica}}</span>
                    </p>

                </div>
                @endforeach
            </div>
        </div>    
    </div>
    <div class = "col-sm-7">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Ordenes adjuntas</h3>
            </div>
            <div class="card-body">
                @foreach($ordenes as $orden)
                <img src = "{{$orden->url}}">
                @endforeach  
            </div>
        </div>
    </div>
</div>
@endsection

