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
<center>
<div class = "col-sm-3">
    <input type = "date" class = "form-control" wire:model='fecha_nuevo_turno'>
</div>
</center>
@if($para == 'general')
    @include('pacientes.turnos_para.generales')
@elseif($para == 'P75')
    @include('pacientes.turnos_para.P75')
@elseif($para == 'dengue')  
    @include('pacientes.turnos_para.dengue')
@elseif($para == 'exudado')
    @include('pacientes.turnos_para.exudado')
@elseif($para == 'espermograma')
    @include('pacientes.turnos_para.espermograma')   
@elseif($para == 'citogenetica')
    @include('pacientes.turnos_para.citogenetica')   
@endif
<center>
<div class = "col-sm-2">
    <button class = "btn btn-danger" wire:click='cancelar_edicion'>Volver</button>
</div>
</center>
