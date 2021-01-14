<div>
    @if($accion == 'editar turno')
        @include('pacientes.editar_turno')
    @endif
    @if($accion == 'paciente')
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Buscar paciente</h3>
            </div>
            <div class="card-body">
            <div class="row">
            <div class = "col-sm-3">
                <input wire:model="paciente" 
                wire:keydown.enter="buscarPaciente" type="text" class="form-control" placeholder="Paciente" autocomplete="off"> 
                @if(count($pacientes)>0)
                    @if(!$picked)
                    <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                        @foreach($pacientes as $p)
                        <div style="cursor: pointer;color:black;">
                            <a wire:click="asignarPaciente('{{ $p->paciente }}')">
                                {{ $p->paciente }}
                            </a>
                        </div>
                        <hr>
                        @endforeach
                    </div>
                    @endif
                @endif
            </div>
            <div class="col-2">
                <input type="text" class="form-control" wire:model='documento' readonly>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" wire:model='domicilio'>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" wire:model='telefono'>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" wire:model='obra_social'>
            </div>
            </div>
            @if($documento != '')
            <button class = "btn btn-success mt-1" wire:click='actualizar_datos'>Guardar</button>
            @endif
            </div>
        </div>   
        </div>
    </div>
    <hr>
    @if(count($pacientes)>0)
    <center>
    <p>Historial de turnos asignados</p>
    </center>
    @endif
    <div class = "row" style = "margin-top:20px;margin-left:3%;">
    @foreach($movimientos_paciente as $movimiento)
    <div class="timeline">
    <!---->
    <div class="time-label">
        <span class="bg-red">{{date('d-m-Y', strtotime($movimiento->fecha))}}</span>
    </div>
    <!-- timeline item -->
    <div>
        <i class="fas fa-info bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="far fa-calendar"></i> {{date('d-m-Y H:m:s', strtotime($movimiento->fecha_hora))}}</span>
            <h3 class="timeline-header">Turno otorgado por {{$movimiento->name}}</h3>

            <div class="timeline-body" style = "width:100%;">
            Horario asignado para turno: <span class = "text-danger">{{$movimiento->horario}}</span> | Turno: <span class = "text-danger">{{$movimiento->letra}}{{$movimiento->id}}</span> | Turno para: <span class = "text-danger">{{$movimiento->para}}</span> | Asistió: <span class = "text-danger">{{$movimiento->asistio}}</span><br>
            Comentarios: {{$movimiento->comentarios}}
            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-sm" href = "/comprobante_turno/{{$movimiento->fecha}}/{{$movimiento->id_horario}}/{{$documento}}/{{$paciente}}" target = "_blank">Re-imprimir</a>
                @if(($movimiento->asistio == 'no')&&($movimiento->para == 'general'))
                <a class="btn btn-danger btn-sm" wire:click='editar_turno("{{$movimiento->fecha}}", "{{$movimiento->horario}}", "{{$movimiento->id_horario}}")'>Re-programar</a>
                @endif
            </div>
        </div>
    </div>
    </div>
    @endforeach
    </div>
    @endif
</div>
