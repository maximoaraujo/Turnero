


<title>Turnos | Generales</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('generales', [])->html();
} elseif ($_instance->childHasBeenRendered('Rm9SUSd')) {
    $componentId = $_instance->getRenderedChildComponentId('Rm9SUSd');
    $componentTag = $_instance->getRenderedChildComponentTagName('Rm9SUSd');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Rm9SUSd');
} else {
    $response = \Livewire\Livewire::mount('generales', []);
    $html = $response->html();
    $_instance->logRenderedChild('Rm9SUSd', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>   


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/turnos/generales-livewire.blade.php ENDPATH**/ ?>