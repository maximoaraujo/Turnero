


<title>Turnos | Dengue</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('dengue', [])->html();
} elseif ($_instance->childHasBeenRendered('VDZzu6F')) {
    $componentId = $_instance->getRenderedChildComponentId('VDZzu6F');
    $componentTag = $_instance->getRenderedChildComponentTagName('VDZzu6F');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('VDZzu6F');
} else {
    $response = \Livewire\Livewire::mount('dengue', []);
    $html = $response->html();
    $_instance->logRenderedChild('VDZzu6F', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/turnos/dengue-livewire.blade.php ENDPATH**/ ?>