


<title>Turnos | Espermograma</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermograma', [])->html();
} elseif ($_instance->childHasBeenRendered('S3Uet7B')) {
    $componentId = $_instance->getRenderedChildComponentId('S3Uet7B');
    $componentTag = $_instance->getRenderedChildComponentTagName('S3Uet7B');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('S3Uet7B');
} else {
    $response = \Livewire\Livewire::mount('espermograma', []);
    $html = $response->html();
    $_instance->logRenderedChild('S3Uet7B', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/espermograma-livewire.blade.php ENDPATH**/ ?>