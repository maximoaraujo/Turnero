<div>

<center>
<div class = "row">
    <div class = "col-sm-3 mt-3">
    <div class="form-check">
        <input class="form-check-input" type="checkbox" wire:model='check_exudado'>
        <label class="form-check-label">
            Horarios exudado
        </label>
    </div>
    </div>
    <div class = "col-sm-2" style = "margin-top:10px;">
    <select class="browser-default custom-select" wire:model='id_horario'>
    <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <option value = "<?php echo e($horario->id_horario); ?>"><?php echo e($horario->horario); ?></option>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </select>
    </div>
    <div class = "col-sm-2">
        <input type = "text" class = "form-control mt-1" style = "width:10px;height:20px;background-color:#bb8fce;" readonly>
        <p>Ingresó por garage</p>
    </div>
    <div class = "col-sm-2">
        <input type = "text" class = "form-control mt-1" style = "width:10px;height:20px;background-color:#5dade2;" readonly>
        <p>Ingresó por admisión</p>
    </div>
</div>    
</center>

<div class="card-body">
<div class="table-responsive">
<table class="table table-bordered">
    <thead>
    <tr>
        <th style = "width:10px;">Orden</th>
        <th nowrap>Turno</th>
        <th nowrap>Paciente</th>
        <th nowrap>Documento</th>
        <th nowrap>Comentarios</th>
        <th nowrap>Usuario</th>
        <th></th>
    </tr>
    </thead>
    <tbody>
    <?php $__currentLoopData = $turnos; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $turno): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <tr>
            <?php if($turno->situacion == 'garage'): ?>
                <td hidden><?php echo e($turno->id_horario); ?></td>
                <td class = "text-white" style = "background-color:#bb8fce;width:10px;text-align:center;"><?php echo e($turno->orden); ?></td>
                <td class = "text-white" style = "background-color:#bb8fce;"><?php echo e($turno->letra); ?><?php echo e($turno->id); ?></td>
                <td class = "text-white" style = "background-color:#bb8fce;"><?php echo e($turno->paciente); ?></td>
                <td class = "text-white" style = "background-color:#bb8fce;"><?php echo e($turno->documento); ?></td>
                <td class = "text-white" style = "background-color:#bb8fce;"><?php echo e($turno->comentarios); ?></td>
                <td class = "text-white" style = "background-color:#bb8fce;"><?php echo e($turno->name); ?></td>
                <?php if($turno->orden == ''): ?>
                <td style = "width:10px;"><button wire:click='ordeno("<?php echo e($turno->letra); ?>", "<?php echo e($turno->id); ?>", "<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
                <?php elseif(($turno->asistio == 'no')&&($turno->orden != '')): ?>
                <td style = 'text-align: center;'><button wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
                <td style = "width:5px;"><button wire:click='cancelar("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;text-align:center;background-color:transparent;border:none;"><img src = "iconos/cerrar.png" /></button></td>
                <?php elseif(($turno->asistio == 'si')&&($turno->orden != '')): ?>
                <td style = 'text-align: center;'><input type='checkbox' wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' checked></td>
                <?php endif; ?>
            <?php elseif($turno->situacion == 'paso'): ?>
                <td hidden><?php echo e($turno->id_horario); ?></td>
                <td class = "text-white" class = "text-white" style = "background-color:#5dade2 ;width:10px;text-align:center;"><?php echo e($turno->orden); ?></td>
                <td class = "text-white" style = "background-color:#5dade2 ;"><?php echo e($turno->letra); ?><?php echo e($turno->id); ?></td>
                <td class = "text-white" style = "background-color:#5dade2 ;"><?php echo e($turno->paciente); ?></td>
                <td class = "text-white" style = "background-color:#5dade2 ;"><?php echo e($turno->documento); ?></td>
                <td class = "text-white" style = "background-color:#5dade2 ;"><?php echo e($turno->comentarios); ?></td>
                <td class = "text-white" style = "background-color:#5dade2 ;"><?php echo e($turno->name); ?></td>
                <?php if($turno->orden == ''): ?>
                <td style = "width:10px;"><button wire:click='ordeno("<?php echo e($turno->letra); ?>", "<?php echo e($turno->id); ?>", "<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
                <?php elseif(($turno->asistio == 'no')&&($turno->orden != '')): ?>
                <td style = 'text-align: center;'><button wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
                <td style = "width:5px;"><button wire:click='cancelar("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;text-align:center;background-color:transparent;border:none;"><img src = "iconos/cerrar.png" /></button></td>
                <?php elseif(($turno->asistio == 'si')&&($turno->orden != '')): ?>
                <td style = 'text-align: center;'><input type='checkbox' wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' checked></td>
                <?php endif; ?>
                <?php if($turno->situacion != 'garage'): ?>
                <td style = "width:5px;"><button wire:click='garage("<?php echo e($turno->letra); ?>", "<?php echo e($turno->id); ?>", "<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;text-align:center;background-color:transparent;border:none;"><img src = "iconos/silla-de-ruedas.png" /></button></td>
                <?php endif; ?>
            <?php else: ?>
                <td hidden><?php echo e($turno->id_horario); ?></td>
                <td class = "text-white" style = "width:10px;text-align:center;"><?php echo e($turno->orden); ?></td>
                <td><?php echo e($turno->letra); ?><?php echo e($turno->id); ?></td>
                <td><?php echo e($turno->paciente); ?></td>
                <td><?php echo e($turno->documento); ?></td>
                <td><?php echo e($turno->comentarios); ?></td>
                <td><?php echo e($turno->name); ?></td>
                <?php if($turno->orden == ''): ?>
                <td style = "width:10px;"><button wire:click='ordeno("<?php echo e($turno->letra); ?>", "<?php echo e($turno->id); ?>", "<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "border:none;background-color:transparent;outline:none;"><i class="fas fa-sort-numeric-down"></i></button></td>
                <?php elseif(($turno->asistio == 'no')&&($turno->orden != '')): ?>
                <td style = 'text-align: center;'><button wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;background-color:transparent;border:none;"><i class="far fa-square"></i></button></td>   
                <?php elseif(($turno->asistio == 'si')&&($turno->orden != '')): ?>
                <td style = 'text-align: center;'><input type='checkbox' wire:click='asistencia("<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' checked></td>
                <?php endif; ?>
                <?php if($turno->situacion != 'garage'): ?>
                <td style = "width:5px;"><button wire:click='garage("<?php echo e($turno->letra); ?>", "<?php echo e($turno->id); ?>", "<?php echo e($turno->id_horario); ?>", "<?php echo e($turno->documento); ?>")' style = "outline:none;text-align:center;background-color:transparent;border:none;"><img src = "iconos/silla-de-ruedas.png" /></button></td>
                <?php endif; ?>
            <?php endif; ?>
        </tr>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
    </tbody>
</table>
</div>
</div>

</div>
<?php /**PATH D:\Proyectos\Turnero\resources\views/livewire/vista-turnos.blade.php ENDPATH**/ ?>