


<title>Gestión de turnos | Turnos del día</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('vista-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('wJiqdrV')) {
    $componentId = $_instance->getRenderedChildComponentId('wJiqdrV');
    $componentTag = $_instance->getRenderedChildComponentTagName('wJiqdrV');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('wJiqdrV');
} else {
    $response = \Livewire\Livewire::mount('vista-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('wJiqdrV', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>              
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/vista_turnos.blade.php ENDPATH**/ ?>