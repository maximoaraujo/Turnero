


<title>Turnos | Generales</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('generales', [])->html();
} elseif ($_instance->childHasBeenRendered('FoWlhjb')) {
    $componentId = $_instance->getRenderedChildComponentId('FoWlhjb');
    $componentTag = $_instance->getRenderedChildComponentTagName('FoWlhjb');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('FoWlhjb');
} else {
    $response = \Livewire\Livewire::mount('generales', []);
    $html = $response->html();
    $_instance->logRenderedChild('FoWlhjb', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>   


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/generales-livewire.blade.php ENDPATH**/ ?>