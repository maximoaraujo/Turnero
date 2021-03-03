


<title>Turnos | Espermograma</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermograma', [])->html();
} elseif ($_instance->childHasBeenRendered('PE0BEx4')) {
    $componentId = $_instance->getRenderedChildComponentId('PE0BEx4');
    $componentTag = $_instance->getRenderedChildComponentTagName('PE0BEx4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('PE0BEx4');
} else {
    $response = \Livewire\Livewire::mount('espermograma', []);
    $html = $response->html();
    $_instance->logRenderedChild('PE0BEx4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/espermograma-livewire.blade.php ENDPATH**/ ?>