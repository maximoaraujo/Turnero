<div>
    <h3 class = "mt-2">Mi perfil</h3>
    <div class = "row mt-3">

    <div class = "col-sm-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    @if(Auth::user()->img == '')
                        @if(Auth::user()->sexo == 'F')
                        <img class="profile-user-img img-fluid img-circle" src="dist/img/avatar2.png" width='30' height='30'>   
                        @else
                        <img class="profile-user-img img-fluid img-circle" src="dist/img/avatar.png" width='30' height='30'>   
                        @endif
                    @else
                    <img class="profile-user-img img-fluid img-circle" src="dist/img/{{Auth::user()->img}}.png" width='30' height='30'>   
                    @endif           
                </div>
                <h3 class="profile-username text-center">{{Auth::user()->name}}</h3>

                <p class="text-muted text-center">{{Auth::user()->email}}</p>
                <hr>
                <p class="text-muted text-center">Primer turno: {{ date('d-m-Y', strtotime($inicio)) }}</p>
                <hr>
                <p class="text-muted text-center">Turnos asignados: {{$cantidad_turnos}}</p>
                <hr>
                <div class = "row">
                    <div class = "col-sm-7">
                        <button class = "btn btn-info" wire:click='actividad'><i class="fas fa-chart-bar"></i> Actividad</button>
                    </div>
                    <div class = "col-sm-5">
                        <button class = "btn btn-info" wire:click='ajustes'><i class="fas fa-cog"></i> Info</button>
                    </div>
                </div>                
            </div>
        </div>
    </div>
    <div class = "col-sm-9">
        <div class="card card-primary card-outline">
        <div class = "card-body">
        @if($movimiento == 'actividad')
            <div class = "row">
                <div class = "col-sm-3">
                    <p>Desde</p>
                    <input type = "date" class = "form-control" wire:model='fecha_desde'>
                </div>
                <div class = "col-sm-3">
                    <p>Hasta</p>
                    <input type = "date" class = "form-control" wire:model='fecha_hasta'>
                </div>
                <div class = "col-sm-5 mt-5">
                    <p style = "color:red;">Turnos asignados: {{$cantidad_x_periodo}}</p>
                </div>
            </div>
            <hr>
        @elseif($movimiento == 'ajustes')
            <div class = "row">
                <div class = "col-sm-4">
                    <p>Nombre</p>
                    <input type = "text" class = "form-control" wire:model='nombre'>
                </div>
                <div class = "col-sm-6">
                    <p>E-mail</p>
                    <input type = "text" class = "form-control" wire:model='email'>
                </div>
                </div>  
                <hr> 
                @if (session()->has('contraseña'))
                <center>
                <div class = "col-sm-6">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        {{ session('contraseña') }}
                    </div>
                </div> 
                </center>   
                @endif
                <div class = "row mt-2">
                    <div class = "col-sm-3">
                        <p>Nueva contraseña</p>
                        <input type = "password" class = "form-control" wire:model='nueva_contraseña'>
                    </div>
                    <div class = "col-sm-3">
                        <p>Repetir contraseña</p>
                        <input type = "password" class = "form-control" wire:model='contraseña_repetida'>
                    </div>
                </div> 
                <button class = "btn btn-success mt-2" wire:click='guardar'>Guardar</button> 
            </div>    
        @endif
        </div>
        </div>
    </div>

    </div>
</div>
