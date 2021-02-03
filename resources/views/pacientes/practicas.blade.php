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
<div class = "row mt-2">
    <div class = "col-sm-1">
        <input type = "number" class = "form-control" wire:model='codigo_practica' wire:keydown.enter='buscar_x_codigo' placeholder = 'Cod.'>
    </div>
    <div class = "col-sm-4">
        <input wire:model.debounce.500ms="practica" 
        wire:keydown="buscarPractica" type="text" class="form-control" placeholder="Práctica" autocomplete="off"> 
        @if(count($practicas)>0)
            @if(!$picked_)
                <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                    @foreach($practicas as $practica)
                    <div style="cursor: pointer;color:black;">
                        <a wire:click="asignarPractica('{{ $practica->practica }}')">
                            {{ $practica->practica }}
                        </a>
                    </div>
                    <hr>
                    @endforeach
                </div>
            @endif
        @endif  
    </div>
</div>
<div class = "col-sm-5 mt-2">
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
<button class = "btn btn-success" wire:click='finalizar_carga'>Finalizar</button>
