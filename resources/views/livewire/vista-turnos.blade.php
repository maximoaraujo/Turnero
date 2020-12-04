<div>

<center>
<div class = "col-sm-2" style = "margin-top:10px;">
<select class="browser-default custom-select" wire:model='id_horario'>
@foreach($horarios as $horario)
    <option value = "{{$horario->id_horario}}">{{$horario->horario}}</option>
@endforeach
</select>
</div>
</center>

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
    <tr>
        <th style = "width:10px;">Orden</th>
        <th nowrap>Turno</th>
        <th nowrap>Paciente</th>
        <th nowrap>Documento</th>
        <th nowrap>Obra social</th>
    </tr>
    </thead>
    <tbody>
    @foreach($turnos as $turno)
        <tr>
            <td hidden>{{$turno->id_horario}}</td>
            <td class = "text-danger" style = "width:10px;text-align:center;">{{$turno->orden}}</td>
            <td>{{$turno->letra}}{{$turno->id}}</td>
            <td>{{$turno->paciente}}</td>
            <td>{{$turno->documento}}</td>
            <td>{{$turno->obra_social}}</td>
            @if($turno->orden == '')
            <td style = "width:10px;"><button wire:click='ordeno("{{$turno->letra}}", "{{$turno->id}}", "{{$turno->id_horario}}", "{{$turno->documento}}")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
            @elseif(($turno->asistio == 'no')&&($turno->orden != ''))
            <td style = 'text-align: center;'><button wire:click='asistencia("{{$turno->id_horario}}", "{{$turno->documento}}")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
            @elseif(($turno->asistio == 'si')&&($turno->orden != ''))
            <td style = 'text-align: center;'><input type='checkbox' checked></td>
            @endif
        </tr>
    @endforeach    
    </tbody>
</table>
</div>
</div>

</div>
