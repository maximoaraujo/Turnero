


<title>Gestión de turnos | Configuraciones</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('configuracion', [])->html();
} elseif ($_instance->childHasBeenRendered('jdfejJv')) {
    $componentId = $_instance->getRenderedChildComponentId('jdfejJv');
    $componentTag = $_instance->getRenderedChildComponentTagName('jdfejJv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('jdfejJv');
} else {
    $response = \Livewire\Livewire::mount('configuracion', []);
    $html = $response->html();
    $_instance->logRenderedChild('jdfejJv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/configuraciones/configuraciones.blade.php ENDPATH**/ ?>