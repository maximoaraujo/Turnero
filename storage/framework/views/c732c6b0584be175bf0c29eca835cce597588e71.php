


<title>Turnos | Exudado</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('exudado', [])->html();
} elseif ($_instance->childHasBeenRendered('r84D3Rj')) {
    $componentId = $_instance->getRenderedChildComponentId('r84D3Rj');
    $componentTag = $_instance->getRenderedChildComponentTagName('r84D3Rj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('r84D3Rj');
} else {
    $response = \Livewire\Livewire::mount('exudado', []);
    $html = $response->html();
    $_instance->logRenderedChild('r84D3Rj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/exudado-livewire.blade.php ENDPATH**/ ?>