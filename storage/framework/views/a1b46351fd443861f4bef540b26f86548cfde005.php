


<title>Gestión de turnos | Estadísticas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('estadisticas', [])->html();
} elseif ($_instance->childHasBeenRendered('Iqa3Zwk')) {
    $componentId = $_instance->getRenderedChildComponentId('Iqa3Zwk');
    $componentTag = $_instance->getRenderedChildComponentTagName('Iqa3Zwk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Iqa3Zwk');
} else {
    $response = \Livewire\Livewire::mount('estadisticas', []);
    $html = $response->html();
    $_instance->logRenderedChild('Iqa3Zwk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>    
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/estadisticas/estadisticas.blade.php ENDPATH**/ ?>