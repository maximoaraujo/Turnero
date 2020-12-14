


<title>Gestión de turnos | Correos</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('emails', [])->html();
} elseif ($_instance->childHasBeenRendered('quVPArI')) {
    $componentId = $_instance->getRenderedChildComponentId('quVPArI');
    $componentTag = $_instance->getRenderedChildComponentTagName('quVPArI');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('quVPArI');
} else {
    $response = \Livewire\Livewire::mount('emails', []);
    $html = $response->html();
    $_instance->logRenderedChild('quVPArI', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/emails/email.blade.php ENDPATH**/ ?>