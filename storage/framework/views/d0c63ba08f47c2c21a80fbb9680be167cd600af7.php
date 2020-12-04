<div>

<center>
<div class = "col-sm-2" style = "margin-top:10px;">
<select class="browser-default custom-select" wire:model='id_horario'>
<?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value = "<?php echo e($horario->id_horario); ?>"><?php echo e($horario->horario); ?></option>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</select>
</div>
</center>

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
    <tr>
        <th style = "width:10px;">Orden</th>
        <th nowrap>Turno</th>
        <th nowrap>Paciente</th>
        <th nowrap>Documento</th>
        <th nowrap>Obra social</th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td hidden><?php echo e($turno->id_horario); ?></td>
            <td class = "text-danger" style = "width:10px;text-align:center;"><?php echo e($turno->orden); ?></td>
            <td><?php echo e($turno->letra); ?><?php echo e($turno->id); ?></td>
            <td><?php echo e($turno->paciente); ?></td>
            <td><?php echo e($turno->documento); ?></td>
            <td><?php echo e($turno->obra_social); ?></td>
            <?php if($turno->orden == ''): ?>
            <td style = "width:10px;"><button wire:click='ordeno("<?php echo e($turno->letra); ?>", "<?php echo e($turno->id); ?>", "<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
            <?php elseif(($turno->asistio == 'no')&&($turno->orden != '')): ?>
            <td style = 'text-align: center;'><button wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
            <?php elseif(($turno->asistio == 'si')&&($turno->orden != '')): ?>
            <td style = 'text-align: center;'><input type='checkbox' checked></td>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    </tbody>
</table>
</div>
</div>

</div>
<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/vista-turnos.blade.php ENDPATH**/ ?>