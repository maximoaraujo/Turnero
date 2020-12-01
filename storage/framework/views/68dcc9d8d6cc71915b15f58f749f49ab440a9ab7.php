<div class = "row" style = "margin-top:20px;margin-left:10px;">
    <p>Paciente: <?php echo e($paciente); ?></p>
</div>
<div class = "row" style = "margin-left:10px;">
    <p>Fecha del turno: <?php echo e(date('d-m-Y', strtotime($fecha))); ?></p>
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
<div class = "row" style = "margin-top:20px;">
<?php $__currentLoopData = $horarios_dengue; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario_dengue): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-3 col-sm-4 col-12">
<div class="info-box bg-gradient-info">
    <span class="info-box-icon"><i class="far fa-calendar-alt"></i></span>

    <div class="info-box-content">
        <span class="info-box-text"><?php echo e($horario_dengue->horario); ?></span>
        <?php
            $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha_nuevo_turno],['id_horario', $horario_dengue->id], ['para', "dengue"]])->get()->count();
        ?>
        <span class="info-box-number"><?php echo $cantidad; ?> | <?php echo e($cantidad_turnos); ?></span>

        <div class="progress">
            <div class="progress-bar" style="width: <?php echo ($cantidad * 10); ?>%"></div>
        </div>
        <?php if($cantidad < $cantidad_turnos): ?>
        <span class="progress-description">
            <button type="button" class="btn btn-block btn-default btn-sm" wire:click='nuevo_turno("<?php echo e($horario_dengue->id_horario); ?>", "<?php echo e(Auth::user()->id); ?>", "dengue")'>Asignar</button>
        </span>
        <?php endif; ?>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<center>
<div class = "col-sm-2">
    <button class = "btn btn-danger" wire:click='cancelar_edicion'>Volver</button>
</div>
</center>
<?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/editar_turno_dengue.blade.php ENDPATH**/ ?>