


<title>Gestión de turnos | Estadísticas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('estadisticas', [])->html();
} elseif ($_instance->childHasBeenRendered('1J3cYlk')) {
    $componentId = $_instance->getRenderedChildComponentId('1J3cYlk');
    $componentTag = $_instance->getRenderedChildComponentTagName('1J3cYlk');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('1J3cYlk');
} else {
    $response = \Livewire\Livewire::mount('estadisticas', []);
    $html = $response->html();
    $_instance->logRenderedChild('1J3cYlk', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>    
<?php $__env->stopSection(); ?> 
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/estadisticas/estadisticas.blade.php ENDPATH**/ ?>