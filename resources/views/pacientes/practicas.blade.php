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
<div class = "col-sm-5">
<div class = "table-responsive">
    <table class = "table">
        <thead>
            <tr>
                <th width=25>Cód.</th>
                <th width=350>Práctica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            @foreach($practicas_asociadas as $practica)
            <tr>
                <td>{{$practica->codigo}}</td>
                <td>{{$practica->practica}}</td>
                <td><a href = "#" wire:click='eliminarPractica({{$practica->id}})'><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>
</div>
<button class = "btn btn-danger" wire:click='cancelar_edicion'>Cancelar</button>
