


<title>Gestión de turnos | Configuraciones</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('configuracion', [])->html();
} elseif ($_instance->childHasBeenRendered('fyM7GQL')) {
    $componentId = $_instance->getRenderedChildComponentId('fyM7GQL');
    $componentTag = $_instance->getRenderedChildComponentTagName('fyM7GQL');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fyM7GQL');
} else {
    $response = \Livewire\Livewire::mount('configuracion', []);
    $html = $response->html();
    $_instance->logRenderedChild('fyM7GQL', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/configuraciones/configuraciones.blade.php ENDPATH**/ ?>