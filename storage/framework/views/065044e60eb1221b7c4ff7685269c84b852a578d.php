


<title>Gestión de turnos | Rechazo</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('rechazo-turno', [])->html();
} elseif ($_instance->childHasBeenRendered('jB8vzTl')) {
    $componentId = $_instance->getRenderedChildComponentId('jB8vzTl');
    $componentTag = $_instance->getRenderedChildComponentTagName('jB8vzTl');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jB8vzTl');
} else {
    $response = \Livewire\Livewire::mount('rechazo-turno', []);
    $html = $response->html();
    $_instance->logRenderedChild('jB8vzTl', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/rechazo.blade.php ENDPATH**/ ?>