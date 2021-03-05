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
    @foreach($turnos_espermograma as $turno_espermograma)
    <tr>
        <td hidden>{{$turno_espermograma->id_turno}}</td>
        <td hidden>{{$turno_espermograma->id_horario}}</td>
        <td nowrap>{{$turno_espermograma->horario}}</td>
        <td nowrap>{{$turno_espermograma->letra}}{{$turno_espermograma->id}}</td>
        <td nowrap>{{$turno_espermograma->paciente}}</td>
        <td nowrap>{{$turno_espermograma->documento}}</td>
        <td nowrap>{{$turno_espermograma->domicilio}}</td>
        <td nowrap>{{$turno_espermograma->obra_social}}</td>
        <td><button wire:click='editar_datos("{{$turno_espermograma->documento}}")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td><button wire:click='eliminar_turno("{{$turno_espermograma->documento}}", "{{$turno_espermograma->id_horario}}", "{{$fecha}}")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        @endif    
        <td><a href = "/comprobante_turno/{{$turno_espermograma->id_turno}}" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td nowrap>{{$turno_espermograma->name}}-{{ date('d-m-Y H:m:s', strtotime($turno_espermograma->created_at)) }}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
</div>