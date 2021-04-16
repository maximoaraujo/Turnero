<div class="table-responsive">
<table class="table" style = "margin-top:10px;">
    <thead>
    <tr>
        <th scope="col" nowrap>Horario</th>
        <th scope="col" nowrap>Turno</th>
        <th scope="col" nowrap>Paciente</th>
        <th scope="col" nowrap>Documento</th>
        <th scope="col" nowrap>Domicilio</th>
        <th scope="col" nowrap>Teléfono</th>
        <th scope="col" nowrap>O.S.</th>
        <th scope="col"></th>
        <th scope="col"></th>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <th scope="col"></th>
        <?php endif; ?>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <th scope="col"></th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos_citogenetica; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno_citogenetica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td hidden><?php echo e($turno_citogenetica->id_turno); ?></td>
        <td hidden><?php echo e($turno_citogenetica->id_horario); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->horario); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->letra); ?><?php echo e($turno_citogenetica->id); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->paciente); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->documento); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->domicilio); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->telefono); ?></td>
        <td nowrap><?php echo e($turno_citogenetica->obra_social); ?></td>
        <td><button wire:click='editar_datos("<?php echo e($turno_citogenetica->documento); ?>")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        <td><button wire:click='editar_turno("<?php echo e($turno_citogenetica->id_turno); ?>", "<?php echo e($fecha); ?>", "<?php echo e($turno_citogenetica->horario); ?>", "<?php echo e($turno_citogenetica->id_horario); ?>", "citogenetica")' style = "border:none;background-color:transparent;"><i class="far fa-calendar-alt"></i></button></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td><button wire:click='eliminar_turno("<?php echo e($turno_citogenetica->documento); ?>", "<?php echo e($turno_citogenetica->id_horario); ?>", "<?php echo e($fecha); ?>")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        <?php endif; ?>    
        <td><a href = "/comprobante_turno/<?php echo e($turno_citogenetica->id_turno); ?>" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td nowrap><?php echo e($turno_citogenetica->name); ?>-<?php echo e(date('d-m-Y H:m:s', strtotime($turno_citogenetica->created_at))); ?></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div><?php /**PATH D:\Proyectos\Turnero\resources\views/ver-turnos/tablas/tabla_citogenetica.blade.php ENDPATH**/ ?>