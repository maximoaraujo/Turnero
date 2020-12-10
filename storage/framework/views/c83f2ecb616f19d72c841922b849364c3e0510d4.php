


<title>Gestión de turnos | Configuraciones</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('configuracion', [])->html();
} elseif ($_instance->childHasBeenRendered('ivlsZU8')) {
    $componentId = $_instance->getRenderedChildComponentId('ivlsZU8');
    $componentTag = $_instance->getRenderedChildComponentTagName('ivlsZU8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ivlsZU8');
} else {
    $response = \Livewire\Livewire::mount('configuracion', []);
    $html = $response->html();
    $_instance->logRenderedChild('ivlsZU8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/configuraciones/configuraciones.blade.php ENDPATH**/ ?>