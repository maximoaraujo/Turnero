<div>
    <div class = "row">
        <div class = "col-sm-2">
            <label>Usuario</label>
            <select class="browser-default custom-select" wire:model='id_usuario'>
            @foreach($users as $user)
                <option value = "{{$user->id}}">{{$user->name}}</option>
            @endforeach
            </select>
        </div>
        <div class = "col-sm-3">
            <label>Desde:</label>
            <input type = "date" wire:model='desde' class = "form-control">
        </div>
        <div class = "col-sm-3">
            <label>Hasta:</label>
            <input type = "date" wire:model='hasta' class = "form-control">
        </div>
    </div>
    <!---->
    <p class = "text-red mt-3">Cantidad: {{$cantidad}}</p>
    <div class = "table-responsive mt-2">
        <table class = "table">
            <thead>
                <tr>
                    <th>Fecha turno</th>
                    <th>Turno</th>
                    <th>Horario</th>
                    <th>Paciente</th>
                    <th>Otorgado</th>
                </tr>
            </thead>
            <tbody>
                @foreach($movimientos as $movimiento)
                <tr>
                    <td>{{date('d-m-Y', strtotime($movimiento->fecha))}}</td>
                    <td>{{$movimiento->id}}{{$movimiento->letra}}</td>
                    <td>{{$movimiento->horario}}</td>
                    <td>{{$movimiento->paciente}}</td>
                    <td>{{date('d-m-Y H:m:s', strtotime($movimiento->created_at))}}</td>
                </tr>
                @endforeach
            </tbody>
        </table>
        {{$movimientos->links()}}
    </div>
</div>
