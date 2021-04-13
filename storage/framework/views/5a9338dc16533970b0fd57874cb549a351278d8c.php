


<title>Turnos | Exudado</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('exudado', [])->html();
} elseif ($_instance->childHasBeenRendered('g93qM2R')) {
    $componentId = $_instance->getRenderedChildComponentId('g93qM2R');
    $componentTag = $_instance->getRenderedChildComponentTagName('g93qM2R');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('g93qM2R');
} else {
    $response = \Livewire\Livewire::mount('exudado', []);
    $html = $response->html();
    $_instance->logRenderedChild('g93qM2R', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>  
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/turnos/exudado-livewire.blade.php ENDPATH**/ ?>