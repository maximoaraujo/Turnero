


<title>Turnos | Citogenética</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('citogenetica', [])->html();
} elseif ($_instance->childHasBeenRendered('H1RDHVv')) {
    $componentId = $_instance->getRenderedChildComponentId('H1RDHVv');
    $componentTag = $_instance->getRenderedChildComponentTagName('H1RDHVv');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('H1RDHVv');
} else {
    $response = \Livewire\Livewire::mount('citogenetica', []);
    $html = $response->html();
    $_instance->logRenderedChild('H1RDHVv', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/citogenetica-livewire.blade.php ENDPATH**/ ?>