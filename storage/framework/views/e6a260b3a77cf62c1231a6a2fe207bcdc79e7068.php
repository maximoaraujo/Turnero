<div>
    <?php if($accion == "editar datos"): ?>
        <?php echo $__env->make('ver-turnos.editar_datos_paciente', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
    <?php endif; ?>
    <?php if($accion == "ver"): ?>
    <div class = "row">
        <div class = "col-sm-2">  
            <input type = "date" class = "form-control" wire:model='fecha' style = "margin-top:10px;">
        </div>
        <div class = "col-sm-2" style = "margin-top:10px;">
            <select class = "form-control" wire:model='opcion_sel'>
                <option>Dengue</option>
                <option>Exudado</option>
                <option>General</option>
                <option>P75</option>
                <option>Citogenetíca</option>
            </select>
        </div> 
        <?php if(session()->has('mensaje')): ?>
        <div class = "col-sm-4" style = "margin-top:10px;">
        <center>
        <div class="alert alert-success alert-dismissible">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">×</button>
            <h5><i class="icon fas fa-check"></i> Correcto!</h5>
            El turno se elimino con éxito!
        </div>   
        </center>  
        </div> 
        <?php endif; ?>
    </div>
    <div class = "row" style = "margin-top:20px;">
        <?php if($opcion_sel == 'General'): ?>
            <?php echo $__env->make('ver-turnos.tablas.tabla_generales', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($opcion_sel == 'Dengue'): ?>
            <?php echo $__env->make('ver-turnos.tablas.tabla_dengue', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($opcion_sel == 'Exudado'): ?>
            <?php echo $__env->make('ver-turnos.tablas.tabla_exudado', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($opcion_sel == 'P75'): ?>
            <?php echo $__env->make('ver-turnos.tablas.tabla_p75', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php elseif($opcion_sel == 'Citogenetíca'): ?>
            <?php echo $__env->make('ver-turnos.tablas.tabla_citogenetica', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>                
        <?php endif; ?>
    </div>
    <?php endif; ?>
</div>



<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/ver-turnos.blade.php ENDPATH**/ ?>