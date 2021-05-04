


<title>Gestión de turnos | Mi perfíl</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('perfil', [])->html();
} elseif ($_instance->childHasBeenRendered('ShiT6WM')) {
    $componentId = $_instance->getRenderedChildComponentId('ShiT6WM');
    $componentTag = $_instance->getRenderedChildComponentTagName('ShiT6WM');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('ShiT6WM');
} else {
    $response = \Livewire\Livewire::mount('perfil', []);
    $html = $response->html();
    $_instance->logRenderedChild('ShiT6WM', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/usuarios/mi-perfil.blade.php ENDPATH**/ ?>