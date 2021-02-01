<div class = "row" style = "margin-top:20px;margin-left:10px;">
    <p>Paciente: <?php echo e($paciente); ?></p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Fecha del turno: <?php echo e(date('d-m-Y', strtotime($fecha_turno))); ?></p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Horario del turno: <?php echo e($horario_turno); ?></p>
</div>
<hr>
<div class = "col-sm-5">
<div class = "table-responsive">
    <table class = "table">
        <thead>
            <tr>
                <th width=25>Cód.</th>
                <th width=350>Práctica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $practicas_asociadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($practica->codigo); ?></td>
                <td><?php echo e($practica->practica); ?></td>
                <td><a href = "#" wire:click='eliminarPractica(<?php echo e($practica->id); ?>)'><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</div>
<button class = "btn btn-danger" wire:click='cancelar_edicion'>Cancelar</button>
<?php /**PATH C:\laragon\www\Turnero\resources\views/pacientes/practicas.blade.php ENDPATH**/ ?>