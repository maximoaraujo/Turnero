


<title>Turnos | Espermograma</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermograma', [])->html();
} elseif ($_instance->childHasBeenRendered('A4gr5I7')) {
    $componentId = $_instance->getRenderedChildComponentId('A4gr5I7');
    $componentTag = $_instance->getRenderedChildComponentTagName('A4gr5I7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('A4gr5I7');
} else {
    $response = \Livewire\Livewire::mount('espermograma', []);
    $html = $response->html();
    $_instance->logRenderedChild('A4gr5I7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/espermograma-livewire.blade.php ENDPATH**/ ?>