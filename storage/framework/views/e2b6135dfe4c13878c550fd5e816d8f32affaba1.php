


<title>Turnos | Citogenética</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('citogenetica', [])->html();
} elseif ($_instance->childHasBeenRendered('Y8rHCyN')) {
    $componentId = $_instance->getRenderedChildComponentId('Y8rHCyN');
    $componentTag = $_instance->getRenderedChildComponentTagName('Y8rHCyN');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Y8rHCyN');
} else {
    $response = \Livewire\Livewire::mount('citogenetica', []);
    $html = $response->html();
    $_instance->logRenderedChild('Y8rHCyN', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/turnos/citogenetica-livewire.blade.php ENDPATH**/ ?>