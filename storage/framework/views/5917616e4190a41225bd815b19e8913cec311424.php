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
<center>
<div class = "col-sm-3">
    <input type = "date" class = "form-control" wire:model='fecha_nuevo_turno'>
</div>
</center>
<?php if($para == 'general'): ?>
    <?php echo $__env->make('pacientes.turnos_para.generales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($para == 'dengue'): ?>  
    <?php echo $__env->make('pacientes.turnos_para.dengue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($para == 'exudado'): ?>
    <?php echo $__env->make('pacientes.turnos_para.exudado', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($para == 'espermograma'): ?>
    <?php echo $__env->make('pacientes.turnos_para.espermograma', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php elseif($para == 'citogenetica'): ?>
    <?php echo $__env->make('pacientes.turnos_para.citogenetica', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>   
<?php endif; ?>
<center>
<div class = "col-sm-2">
    <button class = "btn btn-danger" wire:click='cancelar_edicion'>Volver</button>
</div>
</center>
<?php /**PATH C:\laragon\www\Turnero\resources\views/pacientes/editar_turno.blade.php ENDPATH**/ ?>