


<title>Gestión de turnos | Ver</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('ver-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('LkmvDmj')) {
    $componentId = $_instance->getRenderedChildComponentId('LkmvDmj');
    $componentTag = $_instance->getRenderedChildComponentTagName('LkmvDmj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LkmvDmj');
} else {
    $response = \Livewire\Livewire::mount('ver-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('LkmvDmj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/ver-turnos/ver_turnos.blade.php ENDPATH**/ ?>