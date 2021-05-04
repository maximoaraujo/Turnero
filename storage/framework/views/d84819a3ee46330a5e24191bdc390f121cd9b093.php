


<title>Gestión de turnos | Turnos asignados</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('turnos-asignados', [])->html();
} elseif ($_instance->childHasBeenRendered('pEZ6kC4')) {
    $componentId = $_instance->getRenderedChildComponentId('pEZ6kC4');
    $componentTag = $_instance->getRenderedChildComponentTagName('pEZ6kC4');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('pEZ6kC4');
} else {
    $response = \Livewire\Livewire::mount('turnos-asignados', []);
    $html = $response->html();
    $_instance->logRenderedChild('pEZ6kC4', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/usuarios/turnos-asignados.blade.php ENDPATH**/ ?>