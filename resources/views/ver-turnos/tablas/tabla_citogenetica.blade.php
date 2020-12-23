<div class="table-responsive">
<table class="table" style = "margin-top:10px;">
    <thead>
    <tr>
        <th scope="col" nowrap>Horario</th>
        <th scope="col" nowrap>Turno</th>
        <th scope="col" nowrap>Paciente</th>
        <th scope="col" nowrap>Documento</th>
        <th scope="col" nowrap>Domicilio</th>
        <th scope="col" nowrap>O.S.</th>
        <th scope="col"></th>
        <th scope="col"></th>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <th scope="col"></th>
        @endif
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <th scope="col"></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($turnos_citogenetica as $turno_citogenetica)
    <tr>
        <td hidden>{{$turno_citogenetica->id_horario}}</td>
        <td nowrap>{{$turno_citogenetica->horario}}</td>
        <td nowrap>{{$turno_citogenetica->letra}}{{$turno_citogenetica->id}}</td>
        <td nowrap>{{$turno_citogenetica->paciente}}</td>
        <td nowrap>{{$turno_citogenetica->documento}}</td>
        <td nowrap>{{$turno_citogenetica->domicilio}}</td>
        <td nowrap>{{$turno_citogenetica->obra_social}}</td>
        <td><button wire:click='editar_datos("{{$turno_citogenetica->documento}}")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td><button wire:click='eliminar_turno("{{$turno_citogenetica->documento}}", "{{$turno_citogenetica->id_horario}}", "{{$fecha}}")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        @endif    
        <td><a href = "/comprobante_turno/{{$fecha}}/{{$turno_citogenetica->id_horario}}/{{$turno_citogenetica->documento}}/{{$turno_citogenetica->paciente}}" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td nowrap>{{$turno_citogenetica->name}}-{{ date('d-m-Y H:m:s', strtotime($turno_citogenetica->fecha_hora)) }}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
</div>