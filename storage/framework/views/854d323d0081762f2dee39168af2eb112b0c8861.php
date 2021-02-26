


<title>Turnos | Generales</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('generales', [])->html();
} elseif ($_instance->childHasBeenRendered('TTSj2ED')) {
    $componentId = $_instance->getRenderedChildComponentId('TTSj2ED');
    $componentTag = $_instance->getRenderedChildComponentTagName('TTSj2ED');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('TTSj2ED');
} else {
    $response = \Livewire\Livewire::mount('generales', []);
    $html = $response->html();
    $_instance->logRenderedChild('TTSj2ED', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>   


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/generales-livewire.blade.php ENDPATH**/ ?>