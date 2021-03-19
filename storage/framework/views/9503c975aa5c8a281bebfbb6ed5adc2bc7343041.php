


<title>Gestión de turnos | Restantes</title>

<?php $__env->startSection('contenido'); ?>
<div class="card mt-2">
    <div class="card-header ui-sortable-handle" style="cursor: move;">
        <h3 class="card-title">
            <i class="ion ion-clipboard mr-1"></i>
            Turnos del día <br>
            Esperando atención: <span class = "badge badge-success"><?php echo e($esperando); ?></span>|
            Atendidos en admisión: <span class = "badge badge-secondary"><?php echo e($atendidos); ?></span>
        </h3>
        <div class="card-tools mt-2">
            <ul class="pagination pagination-sm">
                <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li class="page-item"><a href="/turnos-restantes<?php echo e($horario->id_horario); ?>" class="page-link"><?php echo e($horario->horario); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
        </div>
    </div>
    <div class="card-body">
        <ul class="todo-list ui-sortable" data-widget="todo-list">
        <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $paciente): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <li>
                <div class="icheck-primary d-inline ml-2">
                    <?php if($paciente->asistio == 'si'): ?>
                    <input type="checkbox" id="todoCheck<?php echo e($paciente->id_turno); ?>" checked disabled>
                    <?php else: ?>
                    <input type="checkbox" id="todoCheck<?php echo e($paciente->id_turno); ?>" disabled>
                    <?php endif; ?>
                </div>
                <span class="text"><?php echo e($paciente->paciente); ?></span>
                <?php if($paciente->asistio == 'si'): ?>
                <?php $minutosDiff=$paciente->updated_at->diffInMinutes($fechaHora); ?>
                <small class="badge badge-danger"><i class="far fa-clock"></i></small>
                <?php elseif((($paciente->situacion == 'paso')||($paciente->situacion == 'garage'))&&($paciente->asistio == 'no')): ?>
                <?php $minutosDiff=$paciente->updated_at->diffInMinutes($fechaHora); ?>
                <small class="badge badge-success"><i class="far fa-clock"></i></small>
                <?php endif; ?>
            </li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
        </ul>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos-restantes/turnos_restantes.blade.php ENDPATH**/ ?>