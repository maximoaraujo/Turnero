<div class="table-responsive">
<table class="table">
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
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($turnos_p75 as $turno_p75)
    <tr>
        <td hidden>{{$turno_p75->id_turno}}</td>
        <td hidden>{{$turno_p75->id_horario}}</td>
        <td nowrap>{{$turno_p75->horario}}</td>
        <td nowrap>{{$turno_p75->letra}}{{$turno_p75->id}}</td>
        <td nowrap>{{$turno_p75->paciente}}</td>
        <td nowrap>{{$turno_p75->documento}}</td>
        <td nowrap>{{$turno_p75->domicilio}}</td>
        <td nowrap>{{$turno_p75->obra_social}}</td>
        @if ($turno_p75->asistio == 'si')
        <td style = 'text-align: center;'><input type='checkbox' checked></td>
        @else
        <td style = 'text-align: center;'><button wire:click='asistencia("{{$turno_p75->id_horario}}", "{{$fecha}}", "{{$turno_p75->documento}}", "P75")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>
        @endif
        <td><button wire:click='editar_datos("{{$turno_p75->documento}}")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td><button wire:click='eliminar_turno("{{$turno_p75->documento}}", "{{$turno_p75->id_horario}}", "{{$fecha}}")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        @endif    
        <td><a href = "/comprobante_turno/{{$fecha}}/{{$turno_p75->id_horario}}/{{$turno_p75->documento}}/{{$turno_p75->paciente}}/{{$turno_p75->id_turno}}" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td nowrap>{{$turno_p75->name}}-{{ date('d-m-Y H:m:s', strtotime($turno_p75->fecha_hora)) }}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
</div>