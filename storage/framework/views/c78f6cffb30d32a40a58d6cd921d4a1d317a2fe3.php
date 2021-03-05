


<title>Gestión de turnos | Mi perfíl</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('perfil', [])->html();
} elseif ($_instance->childHasBeenRendered('RYvxbfF')) {
    $componentId = $_instance->getRenderedChildComponentId('RYvxbfF');
    $componentTag = $_instance->getRenderedChildComponentTagName('RYvxbfF');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('RYvxbfF');
} else {
    $response = \Livewire\Livewire::mount('perfil', []);
    $html = $response->html();
    $_instance->logRenderedChild('RYvxbfF', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/usuarios/mi-perfil.blade.php ENDPATH**/ ?>