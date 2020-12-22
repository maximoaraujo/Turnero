@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | Inicio</title>

@if(Auth::user()->rol != 'espermograma')
@section('contenido')
<livewire:contar-turnos>
@endsection
@elseif(Auth::user()->rol == 'espermograma')
@section('contenido')
<livewire:espermogramas>
@endsection
@endif

