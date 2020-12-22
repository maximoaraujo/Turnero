<div>
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-3">
            <input type = "date" class = "form-control" wire:model='fecha_desde'>
        </div>
        <div class = "col-sm-3">
            <input type = "date" class = "form-control" wire:model='fecha_hasta'>
        </div>
    </div>
    <div class="table-responsive" style = "margin-top:20px;">
		<table class="table">
	    <tr>	
            <th scope="col" nowrap>Fecha</th>		
            <th scope="col" nowrap>Horario</th>	
            <th scope="col" nowrap>Paciente</th>
            <th scope="col" nowrap>N° Doc.</th>
            <th scope="col" nowrap>Fecha nac.</th>
            <th scope="col" >Domicilio</th>
            <th scope="col" nowrap>Teléfono</th>
            <th scope="col" nowrap>O.S.</th>
	  	</tr>
        <tbody>
        @foreach($turnos as $turno)
        <tr>
            <td nowrap>{{ date('d-m-Y', strtotime($turno->fecha)) }}</td>
            <td nowrap>{{$turno->horario}}</td>
            <td nowrap>{{$turno->paciente}}</td>
            <td nowrap>{{$turno->documento}}</td>
            <td nowrap>{{ date('d-m-Y', strtotime($turno->fecha_nac)) }}</td>
            <td nowrap>{{$turno->domicilio}}</td>
            <td nowrap>{{$turno->telefono}}</td>
            <td nowrap>{{$turno->obra_social}}</td>
        </tr>
        @endforeach
        </tbody>
        </table>
    </div>      
</div>
