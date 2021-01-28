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
        <th scope="col" nowrap>Asistió</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <th scope="col"></th>
        @endif
    </tr>
    </thead>
    <tbody>
    @foreach($turnos_dengue as $turno_dengue)
    <tr>
        <td hidden>{{$turno_dengue->id_turno}}</td>    
        <td hidden>{{$turno_dengue->id_horario}}</td>
        <td nowrap>{{$turno_dengue->horario}}</td>
        <td nowrap>{{$turno_dengue->letra}}{{$turno_dengue->id}}</td>
        <td nowrap>{{$turno_dengue->paciente}}</td>
        <td nowrap>{{$turno_dengue->documento}}</td>
        <td nowrap>{{$turno_dengue->domicilio}}</td>
        <td nowrap>{{$turno_dengue->obra_social}}</td>
        @if ($turno_dengue->asistio == 'si')
        <td style = 'text-align: center;'><label><input type='checkbox' checked></label></td>
        @else
        <td style = 'text-align: center;'><button wire:click='asistencia("{{$turno_dengue->id_horario}}", "{{$fecha}}", "{{$turno_dengue->documento}}", "dengue")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>
        @endif
        <td><button wire:click='editar_datos("{{$turno_dengue->documento}}")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        <!--<td><button wire:click='editar_turno_dengue("{{$turno_dengue->documento}}", "{{$turno_dengue->horario}}", "{{$turno_dengue->paciente}}", "{{$turno_dengue->id_horario}}")' style = "border:none;background-color:transparent;"><i class="far fa-calendar-alt"></i></button></td>-->   
        <td><button wire:click='eliminar_turno("{{$turno_dengue->documento}}", "{{$turno_dengue->id_horario}}", "{{$fecha}}")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        <td><a href = "/comprobante_turno/{{$fecha}}/{{$turno_dengue->id_horario}}/{{$turno_dengue->documento}}/{{$turno_dengue->paciente}}/{{$turno_dengue->id_turno}}" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        @if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
        <td nowrap>{{$turno_dengue->name}}-{{ date('d-m-Y H:m:s', strtotime($turno_dengue->fecha_hora)) }}</td>
        @endif
    </tr>
    @endforeach
    </tbody>
</table>
</div>