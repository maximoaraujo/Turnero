<style>
ul#lista_practicas{ 
  columns: 2; 
  -webkit-columns: 2; 
  -moz-columns: 2; 
} 
</style>
<div class = "row">
    <div class = "col-sm-4">
        <div class = "row" style = "margin-top:20px;margin-left:10px;">
            <p>Paciente: <?php echo e($paciente); ?></p>
        </div>
        <div class = "row" style = "margin-left:10px;">
            <p>Fecha del turno: <?php echo e(date('d-m-Y', strtotime($fecha_turno))); ?></p>
        </div>
        <div class = "row" style = "margin-left:10px;">
            <p>Horario del turno: <?php echo e($horario_turno); ?></p>
        </div>
    </div>
    <div class = "col-sm-4">
    <ul id = "lista_practicas">
    <?php $__currentLoopData = $practicas_asociadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($practica->practica); ?></li>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    </ul>
    </div>   
</div>
<hr>
<center>
<div class = "col-sm-3">
    <input type = "date" class = "form-control" wire:model='fecha_nuevo_turno'>
</div>
</center>
<?php if($para == 'general'): ?>
    <?php echo $__env->make('pacientes.turnos_para.generales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php elseif($para == 'P75'): ?>
    <?php echo $__env->make('pacientes.turnos_para.P75', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
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
<?php /**PATH D:\Proyectos\Turnero\resources\views/pacientes/editar_turno.blade.php ENDPATH**/ ?>