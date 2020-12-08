<div>
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-2">
            <center>
            <p>Desde</p>
            <input type = "date" class = "form-control" wire:model='fecha_desde'>
            </center>
        </div>
        <div class = "col-sm-2">
            <center>
            <p>Hasta</p>
            <input type = "date" class = "form-control" wire:model='fecha_hasta'>
            </center>
        </div>
        <div class = "col-sm-2">
            <center>
            <p>Informe</p>
            <select class="browser-default custom-select" wire:model='select_informe'>
                <option value = "nada" selected disabled>--seleccionar--</option>
                <option value = "turnos_asignados">Turnos asignados</option>
                <option value = "asistencia_turnos">Asistencia a turnos</option>
            </select>
            </center>
        </div>
    </div>
    <hr>
    @if($informe == 'generados')
        @include('estadisticas.grafico_generados')
    @elseif($informe == 'asistencia')
        
    @endif
</div>
