


<title>Turnos | Exudado</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('exudado', [])->html();
} elseif ($_instance->childHasBeenRendered('ZEmW0BB')) {
    $componentId = $_instance->getRenderedChildComponentId('ZEmW0BB');
    $componentTag = $_instance->getRenderedChildComponentTagName('ZEmW0BB');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ZEmW0BB');
} else {
    $response = \Livewire\Livewire::mount('exudado', []);
    $html = $response->html();
    $_instance->logRenderedChild('ZEmW0BB', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/exudado-livewire.blade.php ENDPATH**/ ?>