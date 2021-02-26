


<title>Gestión de turnos | Pacientes</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pacientes', [])->html();
} elseif ($_instance->childHasBeenRendered('R2q8SP8')) {
    $componentId = $_instance->getRenderedChildComponentId('R2q8SP8');
    $componentTag = $_instance->getRenderedChildComponentTagName('R2q8SP8');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('R2q8SP8');
} else {
    $response = \Livewire\Livewire::mount('pacientes', []);
    $html = $response->html();
    $_instance->logRenderedChild('R2q8SP8', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/pacientes/pacientes.blade.php ENDPATH**/ ?>