<div class="card card-success" style = "margin-top:20px;">
<div class="card-header">
    <h3 class="card-title">Modificar datos de <?php echo e($paciente); ?></h3>
</div>
<div class="card-body">
    <div class="row">
        <div class="col-3">
            <p>Paciente</p>
            <input type="text" class="form-control" wire:model='paciente'>
        </div>
        <div class="col-2">
            <p>Fecha de nacimiento</p>
            <input type="date" class="form-control" wire:model='fecha_nacimiento'>
        </div>
        <div class="col-3">
            <p>Domicilio</p>
            <input type="text" class="form-control" wire:model='domicilio'>
        </div>
        <div class="col-2">
            <p>Teléfono</p>
            <input type="text" class="form-control" wire:model='telefono'>
        </div>
        <div class="col-2">
            <p>Obra social</p>
            <input type="text" class="form-control" wire:model='obra_social'>
        </div>
    </div>
    <center>
    <div class = "col-sm-3" style = "margin-top:20px;">
        <button class = "btn btn-success" wire:click='actualizo_datos'>Guardar</button>
        <button class = "btn btn-danger" wire:click='cancelar_edicion'>Cancelar</button>
    </div>
    <center>
    </div>
</div><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/editar_datos_paciente.blade.php ENDPATH**/ ?>