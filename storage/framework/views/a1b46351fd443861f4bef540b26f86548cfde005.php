


<title>Gestión de turnos | Estadísticas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('estadisticas', [])->html();
} elseif ($_instance->childHasBeenRendered('W5xFIIw')) {
    $componentId = $_instance->getRenderedChildComponentId('W5xFIIw');
    $componentTag = $_instance->getRenderedChildComponentTagName('W5xFIIw');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('W5xFIIw');
} else {
    $response = \Livewire\Livewire::mount('estadisticas', []);
    $html = $response->html();
    $_instance->logRenderedChild('W5xFIIw', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>    
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/estadisticas.blade.php ENDPATH**/ ?>