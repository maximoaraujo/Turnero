<div class="table-responsive">
<table class="table">
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
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos_p75; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno_p75): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td hidden><?php echo e($turno_p75->id_turno); ?></td>
        <td hidden><?php echo e($turno_p75->id_horario); ?></td>
        <td nowrap><?php echo e($turno_p75->horario); ?></td>
        <td nowrap><?php echo e($turno_p75->letra); ?><?php echo e($turno_p75->id); ?></td>
        <td nowrap><?php echo e($turno_p75->paciente); ?></td>
        <td nowrap><?php echo e($turno_p75->documento); ?></td>
        <td nowrap><?php echo e($turno_p75->domicilio); ?></td>
        <td nowrap><?php echo e($turno_p75->obra_social); ?></td>
        <?php if($turno_p75->asistio == 'si'): ?>
        <td style = 'text-align: center;'><input type='checkbox' checked></td>
        <?php else: ?>
        <td style = 'text-align: center;'><button wire:click='asistencia("<?php echo e($turno_p75->id_horario); ?>", "<?php echo e($fecha); ?>", "<?php echo e($turno_p75->documento); ?>", "P75")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>
        <?php endif; ?>
        <td><button wire:click='editar_datos("<?php echo e($turno_p75->documento); ?>")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td><button wire:click='eliminar_turno("<?php echo e($turno_p75->documento); ?>", "<?php echo e($turno_p75->id_horario); ?>", "<?php echo e($fecha); ?>")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        <?php endif; ?>    
        <td><a href = "/comprobante_turno/<?php echo e($turno_p75->id_turno); ?>" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td nowrap><?php echo e($turno_p75->name); ?>-<?php echo e(date('d-m-Y H:m:s', strtotime($turno_p75->created_at))); ?></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/tablas/tabla_p75.blade.php ENDPATH**/ ?>