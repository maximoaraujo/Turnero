<div>

<center>
<div class = "row">
    <div class = "col-sm-3"></div>
    <div class = "col-sm-2" style = "margin-top:10px;">
    <select class="browser-default custom-select" wire:model='id_horario'>
    @foreach($horarios as $horario)
        <option value = "{{$horario->id_horario}}">{{$horario->horario}}</option>
    @endforeach
    </select>
    </div>
    <div class = "col-sm-2">
        <input type = "text" class = "form-control mt-1" style = "width:10px;height:20px;background-color:#bb8fce;" readonly>
        <p>Ingresó por garage</p>
    </div>
    <div class = "col-sm-2">
        <input type = "text" class = "form-control mt-1" style = "width:10px;height:20px;background-color:#5dade2;" readonly>
        <p>Ingresó por admisión</p>
    </div>
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
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($turnos as $turno)
        <tr>
            @if($turno->situacion == 'garage')
                <td hidden>{{$turno->id_horario}}</td>
                <td class = "text-white" style = "background-color:#bb8fce;width:10px;text-align:center;">{{$turno->orden}}</td>
                <td class = "text-white" style = "background-color:#bb8fce;">{{$turno->letra}}{{$turno->id}}</td>
                <td class = "text-white" style = "background-color:#bb8fce;">{{$turno->paciente}}</td>
                <td class = "text-white" style = "background-color:#bb8fce;">{{$turno->documento}}</td>
                <td class = "text-white" style = "background-color:#bb8fce;">{{$turno->obra_social}}</td>
                @if($turno->orden == '')
                <td style = "width:10px;"><button wire:click='ordeno("{{$turno->letra}}", "{{$turno->id}}", "{{$turno->id_horario}}", "{{$turno->documento}}")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
                @elseif(($turno->asistio == 'no')&&($turno->orden != ''))
                <td style = 'text-align: center;'><button wire:click='asistencia("{{$turno->id_horario}}", "{{$turno->documento}}")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
                @elseif(($turno->asistio == 'si')&&($turno->orden != ''))
                <td style = 'text-align: center;'><input type='checkbox' checked></td>
                @endif
            @elseif($turno->situacion == 'paso')
                <td hidden>{{$turno->id_horario}}</td>
                <td class = "text-white" class = "text-white" style = "background-color:#5dade2 ;width:10px;text-align:center;">{{$turno->orden}}</td>
                <td class = "text-white" style = "background-color:#5dade2 ;">{{$turno->letra}}{{$turno->id}}</td>
                <td class = "text-white" style = "background-color:#5dade2 ;">{{$turno->paciente}}</td>
                <td class = "text-white" style = "background-color:#5dade2 ;">{{$turno->documento}}</td>
                <td class = "text-white" style = "background-color:#5dade2 ;">{{$turno->obra_social}}</td>
                @if($turno->orden == '')
                <td style = "width:10px;"><button wire:click='ordeno("{{$turno->letra}}", "{{$turno->id}}", "{{$turno->id_horario}}", "{{$turno->documento}}")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
                @elseif(($turno->asistio == 'no')&&($turno->orden != ''))
                <td style = 'text-align: center;'><button wire:click='asistencia("{{$turno->id_horario}}", "{{$turno->documento}}")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
                @elseif(($turno->asistio == 'si')&&($turno->orden != ''))
                <td style = 'text-align: center;'><input type='checkbox' checked></td>
                @endif
                @if($turno->situacion != 'garage')
                <td style = "width:5px;"><button wire:click='garage("{{$turno->letra}}", "{{$turno->id}}", "{{$turno->id_horario}}", "{{$turno->documento}}")' style = "outline:none;text-align:center;background-color:transparent;border:none;"><img src = "iconos/silla-de-ruedas.png" /></button></td>
                @endif
            @else
                <td hidden>{{$turno->id_horario}}</td>
                <td class = "text-white" style = "width:10px;text-align:center;">{{$turno->orden}}</td>
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
                @if($turno->situacion != 'garage')
                <td style = "width:5px;"><button wire:click='garage("{{$turno->letra}}", "{{$turno->id}}", "{{$turno->id_horario}}", "{{$turno->documento}}")' style = "outline:none;text-align:center;background-color:transparent;border:none;"><img src = "iconos/silla-de-ruedas.png" /></button></td>
                @endif
            @endif
        </tr>
    @endforeach    
    </tbody>
</table>
</div>
</div>

</div>
