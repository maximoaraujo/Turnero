


<title>Gestión de turnos | Estadísticas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('estadisticas', [])->html();
} elseif ($_instance->childHasBeenRendered('Py9cITY')) {
    $componentId = $_instance->getRenderedChildComponentId('Py9cITY');
    $componentTag = $_instance->getRenderedChildComponentTagName('Py9cITY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Py9cITY');
} else {
    $response = \Livewire\Livewire::mount('estadisticas', []);
    $html = $response->html();
    $_instance->logRenderedChild('Py9cITY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>    
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/estadisticas.blade.php ENDPATH**/ ?>