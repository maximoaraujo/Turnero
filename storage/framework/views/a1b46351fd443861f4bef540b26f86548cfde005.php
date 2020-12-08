


<title>Gestión de turnos | Estadísticas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('estadisticas', [])->html();
} elseif ($_instance->childHasBeenRendered('AN90a3k')) {
    $componentId = $_instance->getRenderedChildComponentId('AN90a3k');
    $componentTag = $_instance->getRenderedChildComponentTagName('AN90a3k');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('AN90a3k');
} else {
    $response = \Livewire\Livewire::mount('estadisticas', []);
    $html = $response->html();
    $_instance->logRenderedChild('AN90a3k', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>    
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/estadisticas.blade.php ENDPATH**/ ?>