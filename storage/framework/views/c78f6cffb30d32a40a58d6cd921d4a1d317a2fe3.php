


<title>Gestión de turnos | Mi perfíl</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('perfil', [])->html();
} elseif ($_instance->childHasBeenRendered('rYth2pc')) {
    $componentId = $_instance->getRenderedChildComponentId('rYth2pc');
    $componentTag = $_instance->getRenderedChildComponentTagName('rYth2pc');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('rYth2pc');
} else {
    $response = \Livewire\Livewire::mount('perfil', []);
    $html = $response->html();
    $_instance->logRenderedChild('rYth2pc', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/usuarios/mi-perfil.blade.php ENDPATH**/ ?>