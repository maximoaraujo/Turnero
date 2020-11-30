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
        <th scope="col"></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos_p75; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno_p75): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td nowrap><?php echo e($turno_p75->horario); ?></td>
        <td nowrap><?php echo e($turno_p75->letra); ?><?php echo e($turno_p75->id); ?></td>
        <td nowrap><?php echo e($turno_p75->paciente); ?></td>
        <td nowrap><?php echo e($turno_p75->documento); ?></td>
        <td nowrap><?php echo e($turno_p75->domicilio); ?></td>
        <td nowrap><?php echo e($turno_p75->obra_social); ?></td>
        <td nowrap><?php echo e($turno_p75->asistio); ?></td>
    </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </tbody>
</table>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/tablas/tabla_p75.blade.php ENDPATH**/ ?>