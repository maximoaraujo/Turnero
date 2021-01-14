


<title>Gestión de turnos | Dengue</title>

<?php $__env->startSection('contenido'); ?>
<div class = "row">
<?php 
    if (empty($fecha = $_GET['f'])) {
        $fecha = date('Y-m-d');
    }
?>    
<div class = "col-sm-2" style = "margin-top:10px;">
    <input type = "date" class = "form-control" id = "fecha_turno_dengue" min = "<?php echo $fecha=date('Y-m-d'); ?>" value = "<?php echo $fecha=$_GET['f']; ?>">
</div>
<div class = "col-sm-9" style = "margin-top:10px;">
<?php
$ioscor = App\Models\paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
->where('pacientes_turnos.fecha', $fecha)
->where('pacientes_turnos.para', 'dengue')
->where('pacientes.obra_social', 'IOSCOR')
->whereOr('pacientes.obra_social', 'ioscor')->get()->count();
?>
<?php if($cantidad_ioscor == $ioscor): ?>
<center>
<div class="callout callout-danger">
    <h5>¡No asignar más turnos a pacientes con IOSCOR!</h5>
    <p>¡El límite de turnos permitidos fue alcanzado, intente con una fecha distinta!</p>
</div>
</center>
<?php endif; ?>
<center>
<div class="callout callout-info" id = "no_laboral" style = "display:none;">
    <h5>¡Día no laborable!</h5>
    <p>El laboratorio permanecerá cerrado el <?php echo $fecha_sel = date('d-m-Y', strtotime($fecha)); ?>, seleccione otra fecha para asignar un turno</p>
</div>
</center>
</div>
</div>
<div class = "row" id = "row_dengue">
<?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class = "col-sm-4" style = "margin-top:10px;">
    <div class="card card-navy collapsed-card">
        <div class="card-header">
            <?php
                $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha],['id_horario', $horario->id_horario], ['para', 'dengue']])->get()->count();
            ?>
            <h3 class="card-title"><span style = "font-size:22px;"><?php echo e($horario->horario); ?></span> <br> <?php echo $cantidad; ?> | <?php echo e($cantidad_turnos); ?></h3> 
            <?php if($cantidad < $cantidad_turnos): ?>
            <div class="card-tools">
                <button type="button" class="btn btn-tool" data-card-widget="collapse" data-toggle="tooltip" title="Collapse" style = "display:'.$estado.'">
                <i class="fas fa-plus" style = "margin-top:20px;"></i></button>
            </div>
            <?php endif; ?>
        </div>
        <div class="card-body" style="display: none;">
            <div class = "row">
                <input type = "number" id = "id_usuario" name = "id_usuario" value = "<?php echo e(Auth::user()->id); ?>" hidden>
                <input type = "number" id = "id_horario" name = "id_horario" value = "<?php echo e($horario->id_horario); ?>" hidden>
                <input type = "text" class = "form-control" id = "id_turno<?php echo e($horario->id_horario); ?>" hidden>
            <div class = "col-sm-5">
                <input type = "number" class = "form-control" id = "documento<?php echo e($horario->id_horario); ?>" placeholder="Documento" required>
            </div>
            <div class = "col-sm-7">
                <?php if($horario->horario == '06:30'): ?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" name = "p75" id="p75">
                    <label class="custom-control-label" for="p75">P75</label>
                </div>
                <?php endif; ?>
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input ley<?php echo e($horario->id_horario); ?>" id="ley<?php echo e($horario->id_horario); ?>">
                    <label class="custom-control-label" for="ley<?php echo e($horario->id_horario); ?>">Ley 26743</label>
                </div>
            </div>
        </div>
        <center>
            <span class="loader" id = "loader<?php echo e($horario->id_horario); ?>" style = "display:none;"></span>
        </center>
        <div id = "cuerpo_turno<?php echo e($horario->id_horario); ?>">
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "paciente<?php echo e($horario->id_horario); ?>"  placeholder="Paciente" required>
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "domicilio<?php echo e($horario->id_horario); ?>" placeholder="Domicilio" required>
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-5">
                <input type = "text" class = "form-control" id = "telefono<?php echo e($horario->id_horario); ?>"  placeholder="Teléfono" required>
            </div>
            <div class = "col-sm-7">
                <input type = "date" class = "form-control" id = "fecha_nacimiento<?php echo e($horario->id_horario); ?>" placeholder="Fecha">
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "obra_social<?php echo e($horario->id_horario); ?>" placeholder="Obra social" required>
            </div>
        </div>
        <div class = "row" style = "margin-top:5px;">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" id = "comentarios<?php echo e($horario->id_horario); ?>" placeholder="Comentarios">
            </div>
        </div>
        <center>
            <button class = "btn btn-primary mt-2" id = "practicas<?php echo e($horario->id_horario); ?>">Prácticas</button>
            <button class = "btn btn-success" id = "guardar<?php echo e($horario->id_horario); ?>" style = "margin-top:5px;">Guardar</button>
        </center>
        </div>
        </div> 
        </div>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('turnos.modales.modal_practicas', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/dengue.blade.php ENDPATH**/ ?>