<div>
    <div class = "row">
        <div class = "col-sm-2">
            <label>Usuario</label>
            <select class="browser-default custom-select" wire:model='id_usuario'>
            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <option value = "<?php echo e($user->id); ?>"><?php echo e($user->name); ?></option>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
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
    <p class = "text-red mt-3">Cantidad: <?php echo e($cantidad); ?></p>
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
                <?php $__currentLoopData = $movimientos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                    <td><?php echo e(date('d-m-Y', strtotime($movimiento->fecha))); ?></td>
                    <td><?php echo e($movimiento->id); ?><?php echo e($movimiento->letra); ?></td>
                    <td><?php echo e($movimiento->horario); ?></td>
                    <td><?php echo e($movimiento->paciente); ?></td>
                    <td><?php echo e(date('d-m-Y H:m:s', strtotime($movimiento->created_at))); ?></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </tbody>
        </table>
        <?php echo e($movimientos->links()); ?>

    </div>
</div>
<?php /**PATH D:\Proyectos\Turnero\resources\views/livewire/turnos-asignados.blade.php ENDPATH**/ ?>