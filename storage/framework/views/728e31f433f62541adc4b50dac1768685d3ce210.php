


<title>Turnos | Citogenética</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('citogenetica', [])->html();
} elseif ($_instance->childHasBeenRendered('lcrLK4W')) {
    $componentId = $_instance->getRenderedChildComponentId('lcrLK4W');
    $componentTag = $_instance->getRenderedChildComponentTagName('lcrLK4W');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lcrLK4W');
} else {
    $response = \Livewire\Livewire::mount('citogenetica', []);
    $html = $response->html();
    $_instance->logRenderedChild('lcrLK4W', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/citogenetica-livewire.blade.php ENDPATH**/ ?>