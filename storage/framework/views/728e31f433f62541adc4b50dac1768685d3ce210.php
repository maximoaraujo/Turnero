


<title>Turnos | Citogenética</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('citogenetica', [])->html();
} elseif ($_instance->childHasBeenRendered('Gz7wlUU')) {
    $componentId = $_instance->getRenderedChildComponentId('Gz7wlUU');
    $componentTag = $_instance->getRenderedChildComponentTagName('Gz7wlUU');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Gz7wlUU');
} else {
    $response = \Livewire\Livewire::mount('citogenetica', []);
    $html = $response->html();
    $_instance->logRenderedChild('Gz7wlUU', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/citogenetica-livewire.blade.php ENDPATH**/ ?>