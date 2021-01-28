


<title>Gestión de turnos | Pacientes</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('pacientes', [])->html();
} elseif ($_instance->childHasBeenRendered('M2Ped1U')) {
    $componentId = $_instance->getRenderedChildComponentId('M2Ped1U');
    $componentTag = $_instance->getRenderedChildComponentTagName('M2Ped1U');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('M2Ped1U');
} else {
    $response = \Livewire\Livewire::mount('pacientes', []);
    $html = $response->html();
    $_instance->logRenderedChild('M2Ped1U', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/pacientes/pacientes.blade.php ENDPATH**/ ?>