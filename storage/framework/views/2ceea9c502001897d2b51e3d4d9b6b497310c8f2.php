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
<div class = "row mt-2">
    <div class = "col-sm-1">
        <input type = "number" class = "form-control" wire:model='codigo_practica' wire:keydown.enter='buscar_x_codigo' placeholder = 'Cod.'>
    </div>
    <div class = "col-sm-4">
        <input wire:model.debounce.500ms="practica" 
        wire:keydown="buscarPractica" type="text" class="form-control" placeholder="Práctica" autocomplete="off"> 
        <?php if(count($practicas)>0): ?>
            <?php if(!$picked_): ?>
                <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                    <?php $__currentLoopData = $practicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="cursor: pointer;color:black;">
                        <a wire:click="asignarPractica('<?php echo e($practica->practica); ?>')">
                            <?php echo e($practica->practica); ?>

                        </a>
                    </div>
                    <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            <?php endif; ?>
        <?php endif; ?>  
    </div>
</div>
<div class = "col-sm-5 mt-2">
<div class = "table-responsive">
    <table class = "table">
        <thead>
            <tr>
                <th width=25>Cód.</th>
                <th width=350>Práctica</th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <?php $__currentLoopData = $practicas_asociadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
                <td><?php echo e($practica->codigo); ?></td>
                <td><?php echo e($practica->practica); ?></td>
                <td><a href = "#" wire:click='eliminarPractica(<?php echo e($practica->id); ?>)'><i class="fas fa-trash-alt"></i></a></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        </tbody>
    </table>
</div>
</div>
<button class = "btn btn-danger" wire:click='cancelar_edicion'>Cancelar</button>
<button class = "btn btn-success" wire:click='finalizar_carga'>Finalizar</button>
<?php /**PATH D:\Proyectos\Turnero\resources\views/pacientes/practicas.blade.php ENDPATH**/ ?>