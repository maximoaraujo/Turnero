<div>
    @if($accion == "editar datos")
        @include('ver-turnos.editar_datos_paciente')
    @endif
    @if($accion == "editar turno general")
        @include('ver-turnos.editar_turno')
    @endif
    @if($accion == "editar turno dengue")
        @include('ver-turnos.editar_turno_dengue')
    @endif
    @if($accion == "ver")
    <div class = "row">
        <div class = "col-sm-2">  
            <input type = "date" class = "form-control" wire:model='fecha' style = "margin-top:10px;">
        </div>
        <div class = "col-sm-2" style = "margin-top:10px;">
            <select class = "form-control" wire:model='opcion_sel'>
                <option>Dengue</option>
                <option>Exudado</option>
                <option>General</option>
                <option>P75</option>
                <option>Citogenetíca</option>
            </select>
        </div> 
        @if (session()->has('mensaje'))
        <div class = "col-sm-4" style = "margin-top:10px;">
        <center>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Correcto!</h5>
            El turno se elimino con éxito!
        </div>   
        </center>  
        </div> 
        @endif
    </div>
    <div class = "row" style = "margin-top:20px;">
        @if($opcion_sel == 'General')
            @include('ver-turnos.tablas.tabla_generales')
        @elseif($opcion_sel == 'Dengue')
            @include('ver-turnos.tablas.tabla_dengue')
        @elseif($opcion_sel == 'Exudado')
            @include('ver-turnos.tablas.tabla_exudado')
        @elseif($opcion_sel == 'P75')
            @include('ver-turnos.tablas.tabla_p75')
        @elseif($opcion_sel == 'Citogenetíca')
            @include('ver-turnos.tablas.tabla_citogenetica')                
        @endif
    </div>
    @endif
</div>



