<div>
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-3">
            <input type = "date" class = "form-control" wire:model='fecha_desde'>
        </div>
        <div class = "col-sm-3">
            <input type = "date" class = "form-control" wire:model='fecha_hasta'>
        </div>
    </div>
    <div class="table-responsive" style = "margin-top:20px;">
		<table class="table">
	    <tr>	
            <th scope="col" nowrap>Fecha</th>		
            <th scope="col" nowrap>Horario</th>	
            <th scope="col" nowrap>Paciente</th>
            <th scope="col" nowrap>N° Doc.</th>
            <th scope="col" nowrap>Fecha nac.</th>
            <th scope="col" >Domicilio</th>
            <th scope="col" nowrap>Teléfono</th>
            <th scope="col" nowrap>O.S.</th>
	  	</tr>
        <tbody>
        <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <td nowrap><?php echo e(date('d-m-Y', strtotime($turno->fecha))); ?></td>
            <td nowrap><?php echo e($turno->horario); ?></td>
            <td nowrap><?php echo e($turno->paciente); ?></td>
            <td nowrap><?php echo e($turno->documento); ?></td>
            <td nowrap><?php echo e(date('d-m-Y', strtotime($turno->fecha_nac))); ?></td>
            <td nowrap><?php echo e($turno->domicilio); ?></td>
            <td nowrap><?php echo e($turno->telefono); ?></td>
            <td nowrap><?php echo e($turno->obra_social); ?></td>
        </tr>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
        </table>
    </div>      
</div>
<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/espermogramas.blade.php ENDPATH**/ ?>