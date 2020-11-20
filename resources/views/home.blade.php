@extends('adminlte::page')

<title>Gestión de turnos | Inicio</title>

@section('content')
<button class = "btn btn-primary" data-toggle="modal" data-target="#m_calendario">Calendario <i class="far fa-calendar"></i></button>
@endsection

@extends('modal_calendario')
