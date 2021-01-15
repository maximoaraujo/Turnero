<div>
    <?php if((Auth::user()->rol == 'administrador')||(Auth::user()->rol == 'desarrollador')): ?>
    <div class = "row">
        <div class = "col-sm-6 mt-2">
            <label>Motivo de consulta</label>
            <input type = "text" class = "form-control" wire:model='motivo'>
        </div>
    </div>
    <button class = "btn btn-success mt-2" wire:click='guardar'>Guardar</button>
    <button class = "btn btn-danger mt-2" wire:click='default'>Cancelar</button>
    <hr>
    <?php endif; ?>

    <?php if(session()->has('mensaje')): ?>
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <?php echo e(session('mensaje')); ?>

        </div>
    <?php endif; ?>
    <div class = "row">
    <?php $__currentLoopData = $motivos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $motivo): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class = "col-sm-4">
        <div class="form-check">
            <input class="form-check-input" type="checkbox" value="<?php echo e($motivo->id); ?>" wire:click = 'pasoID(<?php echo e($motivo->id); ?>)' id = "check<?php echo e($motivo->id); ?>">
            <label class="form-check-label" for = "check<?php echo e($motivo->id); ?>">
                <?php echo e($motivo->motivo); ?>

            </label>
        </div>
        </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    <?php if(($motivo_sel == 'Otro')||($motivo_sel == 'otro')||($motivo_sel == 'Otra')||($motivo_sel == 'otra')): ?>
    <div class = "col-sm-6 mt-2">
        <div class="form-outline">
            <label class="form-label" for="textAreaExample">Comentarios</label>
            <textarea class="form-control" wire:model='comentarios' rows="2"></textarea>
        </div>
    </div>   
    <?php endif; ?>
    </div>
    <button class = "btn btn-success mt-2" wire:click='guardar_rechazo'>Guardar</button>
</div>
<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/consultas-generales.blade.php ENDPATH**/ ?>