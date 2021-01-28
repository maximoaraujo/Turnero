<div>
    <?php if($accion == 'editar turno'): ?>
        <?php echo $__env->make('pacientes.editar_turno', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($accion == 'paciente'): ?>
    <div class = "row" style = "margin-top:20px;">
        <div class = "col-sm-12">
        <div class="card card-info">
            <div class="card-header">
                <h3 class="card-title">Buscar paciente</h3>
            </div>
            <div class="card-body">
            <div class="row">
            <div class = "col-sm-3">
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
            <div class="col-2">
                <input type="text" class="form-control" wire:model='documento' readonly>
            </div>
            <div class="col-3">
                <input type="text" class="form-control" wire:model='domicilio'>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" wire:model='telefono'>
            </div>
            <div class="col-2">
                <input type="text" class="form-control" wire:model='obra_social'>
            </div>
            </div>
            <?php if($documento != ''): ?>
            <button class = "btn btn-success mt-1" wire:click='actualizar_datos'>Guardar</button>
            <?php endif; ?>
            </div>
        </div>   
        </div>
    </div>
    <hr>
    <?php if(count($pacientes)>0): ?>
    <center>
    <p>Historial de turnos asignados</p>
    </center>
    <?php endif; ?>
    <div class = "row" style = "margin-top:20px;margin-left:3%;">
    <?php $__currentLoopData = $movimientos_paciente; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $movimiento): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div class="timeline">
    <!---->
    <div class="time-label">
        <span class="bg-red"><?php echo e(date('d-m-Y', strtotime($movimiento->fecha))); ?></span>
    </div>
    <!---->
    <div>
        <i class="fas fa-info bg-blue"></i>
        <div class="timeline-item">
            <span class="time"><i class="far fa-calendar"></i> <?php echo e(date('d-m-Y H:m:s', strtotime($movimiento->fecha_hora))); ?></span>
            <h3 class="timeline-header">Turno otorgado por <?php echo e($movimiento->name); ?></h3>
            <div class="timeline-body" style = "width:100%;">
            Horario asignado para turno: <span class = "text-danger"><?php echo e($movimiento->horario); ?></span> | Turno: <span class = "text-danger"><?php echo e($movimiento->letra); ?><?php echo e($movimiento->id); ?></span> | Turno para: <span class = "text-danger"><?php echo e($movimiento->para); ?></span> | Asistió: <span class = "text-danger"><?php echo e($movimiento->asistio); ?></span><br>
            Comentarios: <?php echo e($movimiento->comentarios); ?>

            </div>
            <div class="timeline-footer">
                <a class="btn btn-primary btn-sm" href = "/comprobante_turno/<?php echo e($movimiento->id_turno); ?>" target = "_blank">Re-imprimir</a>
                <?php if($movimiento->asistio == 'no'): ?>
                <a class="btn btn-danger btn-sm" wire:click='editar_turno("<?php echo e($movimiento->fecha); ?>", "<?php echo e($movimiento->horario); ?>", "<?php echo e($movimiento->id_horario); ?>", "<?php echo e($movimiento->para); ?>")'>Re-programar</a>
                <?php endif; ?>
            </div>
        </div>
    </div>
    </div>
    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
</div>
<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/pacientes.blade.php ENDPATH**/ ?>