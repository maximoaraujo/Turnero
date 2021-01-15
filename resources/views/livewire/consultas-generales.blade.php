<div>
    @if((Auth::user()->rol == 'administrador')||(Auth::user()->rol == 'desarrollador'))
    <div class = "row">
        <div class = "col-sm-6 mt-2">
            <label>Motivo de consulta</label>
            <input type = "text" class = "form-control" wire:model='motivo'>
        </div>
    </div>
    <button class = "btn btn-success mt-2" wire:click='guardar'>Guardar</button>
    <button class = "btn btn-danger mt-2" wire:click='default'>Cancelar</button>
    <hr>
    @endif

    @if (session()->has('mensaje'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            {{ session('mensaje') }}
        </div>
    @endif
    <div class = "row">
    @foreach($motivos as $motivo)
        <div class = "col-sm-4 mt-3">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="{{$motivo->id}}" wire:click = 'pasoID({{$motivo->id}})' id = "check{{$motivo->id}}">
            <label class="form-check-label" for = "check{{$motivo->id}}">
                {{$motivo->motivo}}
            </label>
        </div>
        </div>
    @endforeach
    @if(($motivo_sel == 'Otro')||($motivo_sel == 'otro')||($motivo_sel == 'Otra')||($motivo_sel == 'otra'))
    <div class = "col-sm-6 mt-2">
        <div class="form-outline">
            <label class="form-label" for="textAreaExample">Comentarios</label>
            <textarea class="form-control" wire:model='comentarios' rows="2"></textarea>
        </div>
    </div>   
    @endif
    </div>
    <button class = "btn btn-success mt-2" wire:click='guardar_rechazo'>Guardar</button>
</div>
