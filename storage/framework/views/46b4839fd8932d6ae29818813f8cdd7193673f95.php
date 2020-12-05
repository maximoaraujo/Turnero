


<title>Gestión de turnos | Pacientes</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pacientes', [])->html();
} elseif ($_instance->childHasBeenRendered('GkFW9AW')) {
    $componentId = $_instance->getRenderedChildComponentId('GkFW9AW');
    $componentTag = $_instance->getRenderedChildComponentTagName('GkFW9AW');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('GkFW9AW');
} else {
    $response = \Livewire\Livewire::mount('pacientes', []);
    $html = $response->html();
    $_instance->logRenderedChild('GkFW9AW', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/pacientes/pacientes.blade.php ENDPATH**/ ?>