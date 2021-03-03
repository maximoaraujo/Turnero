


<title>Turnos | Espermograma</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermograma', [])->html();
} elseif ($_instance->childHasBeenRendered('tOGvG41')) {
    $componentId = $_instance->getRenderedChildComponentId('tOGvG41');
    $componentTag = $_instance->getRenderedChildComponentTagName('tOGvG41');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('tOGvG41');
} else {
    $response = \Livewire\Livewire::mount('espermograma', []);
    $html = $response->html();
    $_instance->logRenderedChild('tOGvG41', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/espermograma-livewire.blade.php ENDPATH**/ ?>