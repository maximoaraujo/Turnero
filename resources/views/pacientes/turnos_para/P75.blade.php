@if((date('l', strtotime($fecha_nuevo_turno)) == 'Tuesday') || (date('l', strtotime($fecha_nuevo_turno)) == 'Wednesday') || (date('l', strtotime($fecha_nuevo_turno)) == 'Thursday') || (date('l', strtotime($fecha_nuevo_turno)) == 'Friday'))
<div class = "row" style = "margin-top:20px;">
@foreach($horarios as $horario)
<div class="col-md-3 col-sm-4 col-12">
<div class="info-box bg-gradient-info">
    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">{{$horario->horario}}</span>
        <?php
            $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha_nuevo_turno],['id_horario', $horario->id],['para', 'p75']])->get()->count();
        ?>
        <span class="info-box-number"><?php echo $cantidad; ?> | {{$cantidad_turnos}}</span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo ($cantidad * 10); ?>%"></div>
        </div>
        @if(($cantidad < $cantidad_turnos)||(Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <span class="progress-description">
            <button type="button" class="btn btn-block btn-default btn-sm" wire:click='nuevo_turno("{{$horario->id_horario}}", "{{Auth::user()->id}}", "P75")'>Asignar</button>
        </span>
        @endif
        </div>
    </div>
</div>
@endforeach
</div>
@endif