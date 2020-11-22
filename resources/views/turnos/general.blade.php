@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | General</title>

@section('contenido')
<div class = "row">
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">06:30 - 7 | 15</h3>

        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
            hola
        </div>
    </div>
</div>
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">06:30 - 7 | 15</h3>

        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
            hola
        </div>
    </div>
</div>
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">06:30 - 7 | 15</h3>

        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
            hola
        </div>
    </div>
</div>
</div>
<div class = "row">
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">06:30 - 7 | 15</h3>

        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
            hola
        </div>
    </div>
</div>
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">06:30 - 7 | 15</h3>

        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
            hola
        </div>
    </div>
</div>
<div class = "col-sm-4">
    <div class="card card-primary" style = "margin-top:20px;">
        <div class="card-header">
        <h3 class="card-title">06:30 - 8 | 15</h3>
        @if(Auth::user()->rol != 'usuario'))
        <div class="card-tools" style = "margin-top:10px;">
            <button type="button" class="btn btn-tool" data-card-widget="collapse">
            <i class="fas fa-plus"></i></button>
        </div>
        @endif
        </div>
        <div class="collapsed-box card-body" style = "display:none;">
            hola
        </div>
    </div>
</div>
</div>        
@endsection

@extends('calendario')