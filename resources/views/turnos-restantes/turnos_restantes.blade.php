@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | Restantes</title>

@section('contenido')
<div class="card mt-2">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Turnos del día <br>
            Esperando atención: <span class = "badge badge-success">{{$esperando}}</span>|
            Atendidos en admisión: <span class = "badge badge-secondary">{{$atendidos}}</span>
        </h3>
        <div class="card-tools mt-2">
            <ul class="pagination pagination-sm">
                @foreach($horarios as $horario)
                <li class="page-item"><a href="/turnos-restantes{{$horario->id_horario}}" class="page-link">{{$horario->horario}}</a></li>
                @endforeach
            </ul>
        </div>
    </div>
    <div class="card-body">
        <ul class="todo-list ui-sortable" data-widget="todo-list">
        @foreach($pacientes as $paciente)
            <li>
                <div class="icheck-primary d-inline ml-2">
                    @if($paciente->asistio == 'si')
                    <input type="checkbox" id="todoCheck{{$paciente->id_turno}}" checked disabled>
                    @else
                    <input type="checkbox" id="todoCheck{{$paciente->id_turno}}" disabled>
                    @endif
                </div>
                <span class="text">{{$paciente->paciente}}</span>
                @if($paciente->asistio == 'si')
                <?php $minutosDiff=$paciente->updated_at->diffInMinutes($fechaHora); ?>
                <small class="badge badge-danger"><i class="far fa-clock"> <?php echo $minutosDiff; ?></i></small>
                @elseif((($paciente->situacion == 'paso')||($paciente->situacion == 'garage'))&&($paciente->asistio == 'no'))
                <?php $minutosDiff=$paciente->updated_at->diffInMinutes($fechaHora); ?>
                <small class="badge badge-success"><i class="far fa-clock"> <?php echo $minutosDiff; ?></i></small>
                @endif
            </li>
        @endforeach    
        </ul>
    </div>
</div>
@endsection
