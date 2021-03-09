<div class="table-responsive">
<center>
<div class = "col-sm-2">
    <select class="browser-default custom-select" wire:model='horario_sel'>
    <option selected>--Horarios--</option>
    @foreach($horarios as $horario)
    <option value="{{$horario->id_horario}}">{{$horario->horario}}</option>
     @endforeach
    </select>
</div>
</center>
<table class="table" style = "margin-top:10px;">
    <thead>
    <tr>
        <th scope="col" nowrap>Horario</th>
        <th scope="col" nowrap>Turno</th>
        <th scope="col" nowrap>Paciente</th>
        <th scope="col" nowrap>Documento</th>
        <th scope="col" nowrap>Domicilio</th>
        <th scope="col" nowrap>O.S.</th>
        <th scope="col" nowrap>Asistió</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <th scope="col"></th>
        @endif
        <th></th>
    </tr>
    </thead>
    <tbody>
    @foreach($turnos_generales as $turno_general)
    <tr>
        <td hidden>{{$turno_general->id_turno}}</td>
        <td hidden>{{$turno_general->id_horario}}</td>
        <td nowrap>{{$turno_general->horario}}</td>
        <td nowrap>{{$turno_general->letra}}{{$turno_general->id}}</td>
        <td nowrap>{{$turno_general->paciente}}</td>
        <td nowrap>{{$turno_general->documento}}</td>
        <td nowrap>{{$turno_general->domicilio}}</td>
        <td nowrap>{{$turno_general->obra_social}}</td>
        @if ($turno_general->asistio == 'si')
        <td style = 'text-align: center;'><input type='checkbox' checked></td>
        @else
        <td style = 'text-align: center;'><button wire:click='asistencia("{{$turno_general->id_horario}}", "{{$fecha}}", "{{$turno_general->documento}}", "general")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>
        @endif
        <td><button wire:click='editar_datos("{{$turno_general->documento}}")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        <!--<td><button wire:click='editar_turno_general("{{$turno_general->documento}}", "{{$turno_general->horario}}", "{{$turno_general->paciente}}", "{{$turno_general->id_horario}}")' style = "border:none;background-color:transparent;"><i class="far fa-calendar-alt"></i></button></td>-->
        <td><button wire:click='eliminar_turno("{{$turno_general->id_turno}}", "{{$turno_general->documento}}", "{{$turno_general->id_horario}}", "{{$fecha}}")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>  
        <td><a href = "/comprobante_turno/{{$turno_general->id_turno}}" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td nowrap>{{$turno_general->name}}-{{ date('d-m-Y H:m:s', strtotime($turno_general->created_at)) }}</td>
        <td><a href = "/orden_turno{{$turno_general->id_turno}}" target="_blank"><button style = "border:none;background-color:transparent;"><i class="fas fa-file-contract"></i></button></a></td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
</div>
