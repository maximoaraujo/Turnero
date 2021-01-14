<div class = "row" style = "margin-top:20px;margin-left:10px;">
    <p>Paciente: {{$paciente}}</p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Fecha del turno: {{date('d-m-Y', strtotime($fecha_turno))}}</p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Horario del turno: {{$horario_turno}}</p>
</div>
<hr>
<center>
<div class = "col-sm-3">
    <input type = "date" class = "form-control" wire:model='fecha_nuevo_turno'>
</div>
</center>
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
        <span class="info-box-number"><?php echo $cantidad; ?> | {{$cantidad_turnos}}</span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo ($cantidad * 10); ?>%"></div>
        </div>
        @if($cantidad < $cantidad_turnos)
        <span class="progress-description">
            <button type="button" class="btn btn-block btn-default btn-sm" wire:click='nuevo_turno("{{$horario->id_horario}}", "{{Auth::user()->id}}", "general")'>Asignar</button>
        </span>
        @endif
        </div>
    </div>
</div>
@endforeach
</div>
<center>
<div class = "col-sm-2">
    <button class = "btn btn-danger" wire:click='cancelar_edicion'>Volver</button>
</div>
</center>
