<div class="table-responsive">
<center>
<div class = "col-sm-2">
    <select class="browser-default custom-select" wire:model='horario_sel'>
    <option selected>--Horarios--</option>
    <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <option value="<?php echo e($horario->id_horario); ?>"><?php echo e($horario->horario); ?></option>
     <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
</div>
</center>
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
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <th scope="col"></th>
        <?php endif; ?>
        <th scope="col"></th>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <th scope="col"></th>
        <?php endif; ?>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos_generales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno_general): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td hidden><?php echo e($turno_general->id_horario); ?></td>
        <td nowrap><?php echo e($turno_general->horario); ?></td>
        <td nowrap><?php echo e($turno_general->letra); ?><?php echo e($turno_general->id); ?></td>
        <td nowrap><?php echo e($turno_general->paciente); ?></td>
        <td nowrap><?php echo e($turno_general->documento); ?></td>
        <td nowrap><?php echo e($turno_general->domicilio); ?></td>
        <td nowrap><?php echo e($turno_general->obra_social); ?></td>
        <?php if($turno_general->asistio == 'si'): ?>
        <td style = 'text-align: center;'><label><input type='checkbox' checked></label></td>
        <?php else: ?>
        <td style = 'text-align: center;'><label><input type='checkbox' wire:click='asistencia("<?php echo e($turno_general->id_horario); ?>", "<?php echo e($fecha); ?>", "<?php echo e($turno_general->documento); ?>")'></label></td>
        <?php endif; ?>
        <td><button wire:click='editar_datos("<?php echo e($turno_general->documento); ?>")' style = "border:none;background-color:transparent;"><i class="fas fa-user-edit"></i></button></td>
        <td><button wire:click='editar_turno_general("<?php echo e($turno_general->documento); ?>", "<?php echo e($turno_general->horario); ?>", "<?php echo e($turno_general->paciente); ?>", "<?php echo e($turno_general->id_horario); ?>")' style = "border:none;background-color:transparent;"><i class="far fa-calendar-alt"></i></button></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td><button wire:click='eliminar_turno("<?php echo e($turno_general->documento); ?>", "<?php echo e($turno_general->id_horario); ?>", "<?php echo e($fecha); ?>")' style = "border:none;background-color:transparent;"><i class="far fa-trash-alt"></i></button></td>
        <?php endif; ?>    
        <td><a href = "/comprobante_turno/<?php echo e($fecha); ?>/<?php echo e($turno_general->id_horario); ?>/<?php echo e($turno_general->documento); ?>/<?php echo e($turno_general->paciente); ?>" target='_blank'><button style = "border:none;background-color:transparent;"><i class="fas fa-file-import"></i></button></a></td>
        <?php if((Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
        <td nowrap><?php echo e($turno_general->name); ?>-<?php echo e($turno_general->fecha_hora); ?></td>
        <?php endif; ?>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/tablas/tabla_generales.blade.php ENDPATH**/ ?>