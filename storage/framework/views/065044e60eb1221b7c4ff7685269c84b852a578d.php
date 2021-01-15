


<title>Gestión de turnos | Rechazo</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('rechazo-turno', [])->html();
} elseif ($_instance->childHasBeenRendered('oEkItC9')) {
    $componentId = $_instance->getRenderedChildComponentId('oEkItC9');
    $componentTag = $_instance->getRenderedChildComponentTagName('oEkItC9');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('oEkItC9');
} else {
    $response = \Livewire\Livewire::mount('rechazo-turno', []);
    $html = $response->html();
    $_instance->logRenderedChild('oEkItC9', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/rechazo.blade.php ENDPATH**/ ?>