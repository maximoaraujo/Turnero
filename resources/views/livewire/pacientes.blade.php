<div>
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-3">
            <p>Paciente</p>
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
    </div>
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
            <h3 class="timeline-header"><a href="#">Turno otorgado por</a> {{$movimiento->name}}</h3>

            <div class="timeline-body" style = "width:100%;">
            Horario asignado: {{$movimiento->horario}} | Turno: {{$movimiento->letra}}{{$movimiento->id}} | Para: {{$movimiento->para}} | Asistió: {{$movimiento->asistio}}<br>
            Comentarios: {{$movimiento->comentarios}}
            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-sm">Re-imprimir</a>
                @if($movimiento->asistio == 'no')
                <a class="btn btn-danger btn-sm">Re-programar</a>
                @endif
            </div>
        </div>
    </div>
    </div>
    @endforeach
    </div>
</div>
