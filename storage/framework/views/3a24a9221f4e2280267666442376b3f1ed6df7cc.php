<div class="table-responsive">
<table class="table" style = "margin-top:10px;">
    <thead>
    <tr>
        <th scope="col" nowrap>Horario</th>
        <th scope="col" nowrap>Turno</th>
        <th scope="col" nowrap>Paciente</th>
        <th scope="col" nowrap>Documento</th>
        <th scope="col" nowrap>Domicilio</th>
        <th scope="col" nowrap>O.S.</th>
        <th scope="col" nowrap>Asistió</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <th scope="col"></th>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <th scope="col"></th>
        <?php endif; ?>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos_dengue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno_dengue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td hidden><?php echo e($turno_dengue->id_turno); ?></td>    
        <td hidden><?php echo e($turno_dengue->id_horario); ?></td>
        <td nowrap><?php echo e($turno_dengue->horario); ?></td>
        <td nowrap><?php echo e($turno_dengue->letra); ?><?php echo e($turno_dengue->id); ?></td>
        <td nowrap><?php echo e($turno_dengue->paciente); ?></td>
        <td nowrap><?php echo e($turno_dengue->documento); ?></td>
        <td nowrap><?php echo e($turno_dengue->domicilio); ?></td>
        <td nowrap><?php echo e($turno_dengue->obra_social); ?></td>
        <?php if($turno_dengue->asistio == 'si'): ?>
        <td style = 'text-align: center;'><label><input type='checkbox' checked></label></td>
        <?php else: ?>
        <td style = 'text-align: center;'><button wire:click='asistencia("<?php echo e($turno_dengue->id_horario); ?>", "<?php echo e($fecha); ?>", "<?php echo e($turno_dengue->documento); ?>", "dengue")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>
        <?php endif; ?>
        <td><button wire:click='editar_datos("<?php echo e($turno_dengue->documento); ?>")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        <!--<td><button wire:click='editar_turno_dengue("<?php echo e($turno_dengue->documento); ?>", "<?php echo e($turno_dengue->horario); ?>", "<?php echo e($turno_dengue->paciente); ?>", "<?php echo e($turno_dengue->id_horario); ?>")' style = "border:none;background-color:transparent;"><i class="far fa-calendar-alt"></i></button></td>-->   
        <td><button wire:click='eliminar_turno("<?php echo e($turno_dengue->documento); ?>", "<?php echo e($turno_dengue->id_horario); ?>", "<?php echo e($fecha); ?>")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        <td><a href = "/comprobante_turno/<?php echo e($turno_dengue->id_turno); ?>" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td nowrap><?php echo e($turno_dengue->name); ?>-<?php echo e(date('d-m-Y H:m:s', strtotime($turno_dengue->created_at))); ?></td>
<<<<<<< HEAD
=======
        <?php endif; ?>
        <?php if($turno_dengue->orden_url != ''): ?>
        <td><a href = "<?php echo e($turno_dengue->orden_url); ?>" target="_blank"><button style = "border:none;background-color:transparent;"><i class="fas fa-file-contract"></i></button></a></td>
>>>>>>> cafaf21facad78573bb2639ca5fc164499fc929b
        <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/tablas/tabla_dengue.blade.php ENDPATH**/ ?>