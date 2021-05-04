


<title>Gestión de turnos | Turnos asignados</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('turnos-asignados', [])->html();
} elseif ($_instance->childHasBeenRendered('Lce3PQ7')) {
    $componentId = $_instance->getRenderedChildComponentId('Lce3PQ7');
    $componentTag = $_instance->getRenderedChildComponentTagName('Lce3PQ7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Lce3PQ7');
} else {
    $response = \Livewire\Livewire::mount('turnos-asignados', []);
    $html = $response->html();
    $_instance->logRenderedChild('Lce3PQ7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/usuarios/turnos-asignados.blade.php ENDPATH**/ ?>