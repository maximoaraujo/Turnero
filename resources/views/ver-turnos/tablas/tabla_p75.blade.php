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
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    @foreach($turnos_p75 as $turno_p75)
    <tr>
        <td nowrap>{{$turno_p75->horario}}</td>
        <td nowrap>{{$turno_p75->letra}}{{$turno_p75->id}}</td>
        <td nowrap>{{$turno_p75->paciente}}</td>
        <td nowrap>{{$turno_p75->documento}}</td>
        <td nowrap>{{$turno_p75->domicilio}}</td>
        <td nowrap>{{$turno_p75->obra_social}}</td>
        <td nowrap>{{$turno_p75->asistio}}</td>
    </tr>
    @endforeach
    </tbody>
</table>
</div>