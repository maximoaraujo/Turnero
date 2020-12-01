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
    <div class="col-12 col-sm-12" style = "margin-top:20px;">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{$tab_dengue}}" data-toggle="pill" href="#custom-tabs-four-dengue">Dengue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_exudado}}" data-toggle="pill" href="#custom-tabs-four-exudado">Exudado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_espermograma}}" data-toggle="pill" href="#custom-tabs-four-espermograma">Espermograma</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_general}}" data-toggle="pill" href="#custom-tabs-four-general">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_citogenetica}}" data-toggle="pill" href="#custom-tabs-four-citogenetica">Citogenética</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_p75}}" data-toggle="pill" href="#custom-tabs-four-p75">P75</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade {{$tab_dengue_}}" id="custom-tabs-four-dengue" role="tabpanel">
                @include('ver-turnos.tablas.tabla_dengue')
            </div>
            <div class="tab-pane fade {{$tab_exudado_}}" id="custom-tabs-four-exudado" role="tabpanel">
                @include('ver-turnos.tablas.tabla_exudado')
            </div>
            <div class="tab-pane fade {{$tab_espermograma_}}" id="custom-tabs-four-espermograma" role="tabpanel">
                Espermograma
            </div>
            <div class="tab-pane fade {{$tab_general_}}" id="custom-tabs-four-general" role="tabpanel">
                @include('ver-turnos.tablas.tabla_generales')
            </div>
            <div class="tab-pane fa de {{$tab_citogenetica_}}" id="custom-tabs-four-citogenetica" role="tabpanel">
               Citogenetica
            </div>
            <div class="tab-pane fade {{$tab_p75_}}" id="custom-tabs-four-p75" role="tabpanel">
                @include('ver-turnos.tablas.tabla_p75')
            </div>
        </div>
        </div>
    </div>
    </div>
    @endif
</div>



