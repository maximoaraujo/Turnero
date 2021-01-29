<div class="card card-success" style = "margin-top:20px;">
<div class="card-header">
    <h3 class="card-title">Modificar datos de <?php echo e($paciente); ?></h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-3">
            <p>Paciente</p>
            <input type="text" class="form-control" wire:model='paciente'>
        </div>
        <div class="col-2">
            <p>Fecha de nacimiento</p>
            <input type="date" class="form-control" wire:model='fecha_nacimiento'>
        </div>
        <div class="col-3">
            <p>Domicilio</p>
            <input type="text" class="form-control" wire:model='domicilio'>
        </div>
        <div class="col-2">
            <p>Teléfono</p>
            <input type="text" class="form-control" wire:model='telefono'>
        </div>
        <div class="col-2">
            <p>Obra social</p>
            <input wire:model.debounce.500ms="obra_social" 
            wire:keydown="buscarObrasocial" type="text" class="form-control" placeholder="Obra social" autocomplete="off"> 
            <?php if(count($obras_sociales)>0): ?>
                <?php if(!$picked): ?>
                    <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                        <?php $__currentLoopData = $obras_sociales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obra_social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <div style="cursor: pointer;color:black;">
                            <a wire:click="asignarObrasocial('<?php echo e($obra_social->obra_social); ?>')">
                                <?php echo e($obra_social->obra_social); ?>

                            </a>
                        </div>
                        <hr>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    </div>
                <?php endif; ?>
            <?php endif; ?>  
        </div>
    </div>
    <center>
    <div class = "col-sm-3" style = "margin-top:20px;">
        <button class = "btn btn-success" wire:click='actualizo_datos'>Guardar</button>
        <button class = "btn btn-danger" wire:click='cancelar_edicion'>Cancelar</button>
    </div>
    <center>
    </div>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/editar_datos_paciente.blade.php ENDPATH**/ ?>