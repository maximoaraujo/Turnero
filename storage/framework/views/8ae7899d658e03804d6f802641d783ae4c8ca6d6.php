<div>
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-3">
            <p>Paciente</p>
            <input wire:model="paciente" 
            wire:keydown.enter="buscarPaciente" type="text" class="form-control" placeholder="Paciente" autocomplete="off"> 
            <?php if(count($pacientes)>0): ?>
                <?php if(!$picked): ?>
                <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                    <?php $__currentLoopData = $pacientes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $p): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <div style="cursor: pointer;color:black;">
                        <a wire:click="asignarPaciente('<?php echo e($p->paciente); ?>')">
                            <?php echo e($p->paciente); ?>

                        </a>
                    </div>
                    <hr>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
                <?php endif; ?>
            <?php endif; ?>
        </div>
    </div>
    <div class = "row" style = "margin-top:20px;margin-left:3%;">
    <?php $__currentLoopData = $movimientos_paciente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="timeline">
    <!---->
    <div class="time-label">
        <span class="bg-red"><?php echo e(date('d-m-Y', strtotime($movimiento->fecha))); ?></span>
    </div>
    <!-- timeline item -->
    <div>
        <i class="fas fa-info bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="far fa-calendar"></i> <?php echo e(date('d-m-Y H:m:s', strtotime($movimiento->fecha_hora))); ?></span>
            <h3 class="timeline-header"><a href="#">Turno otorgado por</a> <?php echo e($movimiento->name); ?></h3>

            <div class="timeline-body" style = "width:100%;">
            Horario asignado: <?php echo e($movimiento->horario); ?> | Turno: <?php echo e($movimiento->letra); ?><?php echo e($movimiento->id); ?> | Para: <?php echo e($movimiento->para); ?> | Asistió: <?php echo e($movimiento->asistio); ?><br>
            Comentarios: <?php echo e($movimiento->comentarios); ?>

            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-sm">Re-imprimir</a>
                <?php if($movimiento->asistio == 'no'): ?>
                <a class="btn btn-danger btn-sm">Re-programar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>
<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/pacientes.blade.php ENDPATH**/ ?>