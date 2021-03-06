<div>
    <h3 class = "mt-2">Mi perfil</h3>
    <div class = "row mt-3">

    <div class = "col-sm-3">
        <div class="card card-primary card-outline">
            <div class="card-body box-profile">
                <div class="text-center">
                    <?php if(Auth::user()->img == ''): ?>
                        <?php if(Auth::user()->sexo == 'F'): ?>
                        <img class="profile-user-img img-fluid img-circle" src="dist/img/avatar2.png" width='30' height='30'>   
                        <?php else: ?>
                        <img class="profile-user-img img-fluid img-circle" src="dist/img/avatar.png" width='30' height='30'>   
                        <?php endif; ?>
                    <?php else: ?>
                    <img class="profile-user-img img-fluid img-circle" src="dist/img/<?php echo e(Auth::user()->img); ?>.png" width='30' height='30'>   
                    <?php endif; ?>           
                </div>
                <h3 class="profile-username text-center"><?php echo e(Auth::user()->name); ?></h3>

                <p class="text-muted text-center"><?php echo e(Auth::user()->email); ?></p>
                <hr>
                <p class="text-muted text-center">Primer turno: <?php echo e(date('d-m-Y', strtotime($inicio))); ?></p>
                <hr>
                <p class="text-muted text-center">Turnos asignados: <?php echo e($cantidad_turnos); ?></p>
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
        <?php if($movimiento == 'actividad'): ?>
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
                    <p style = "color:red;">Turnos asignados: <?php echo e($cantidad_x_periodo); ?></p>
                </div>
            </div>
            <hr>
        <?php elseif($movimiento == 'ajustes'): ?>
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
                <?php if(session()->has('contraseña')): ?>
                <center>
                <div class = "col-sm-6">
                    <div class="alert alert-warning">
                        <button type="button" class="close" data-dismiss="alert">×</button>
                        <?php echo e(session('contraseña')); ?>

                    </div>
                </div> 
                </center>   
                <?php endif; ?>
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
        <?php endif; ?>
        </div>
        </div>
    </div>

    </div>
</div>
<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/perfil.blade.php ENDPATH**/ ?>