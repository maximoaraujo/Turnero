<div class = "row" style = "margin-top:20px;">
@foreach($horarios as $horario)
<div class="col-md-3 col-sm-4 col-12">
<div class="info-box bg-gradient-info">
    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

    <div class="info-box-content">
        <span class="info-box-text">{{$horario->horario}}</span>
        <?php
            $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha_nuevo_turno],['id_horario', $horario->id]])->get()->count();
        ?>
        @if(($horario->id_horario == 6)||($horario->id_horario == 2)||($horario->id_horario == 4)||($horario->id_horario == 7))
        <span class="info-box-number"><?php echo $cantidad; ?> | {{$cantidad_turnos_esp}}</span>
        @else
        <span class="info-box-number"><?php echo $cantidad; ?> | {{$cantidad_turnos}}</span>
        @endif
        
        <div class="progress">
            <div class="progress-bar" style="width: <?php echo ($cantidad * 10); ?>%"></div>
        </div>
        @if(($cantidad < $cantidad_turnos)||($cantidad < $cantidad_turnos_esp)||(Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <span class="progress-description">
            <button type="button" class="btn btn-block btn-default btn-sm" wire:click='nuevo_turno("{{$horario->id_horario}}", "{{Auth::user()->id}}", "general")'>Asignar</button>
        </span>
        @endif
        </div>
    </div>
</div>
@endforeach
</div>