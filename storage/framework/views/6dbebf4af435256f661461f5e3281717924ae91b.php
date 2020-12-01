


<title>Gestión de turnos | Ver</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ver-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('ASZlvst')) {
    $componentId = $_instance->getRenderedChildComponentId('ASZlvst');
    $componentTag = $_instance->getRenderedChildComponentTagName('ASZlvst');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ASZlvst');
} else {
    $response = \Livewire\Livewire::mount('ver-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('ASZlvst', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/ver-turnos/ver_turnos.blade.php ENDPATH**/ ?>