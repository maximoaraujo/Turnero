<?php use SimpleSoftwareIO\QrCode\Facades\QrCode; ?>



<title>Gestión de turnos | Inicio</title>

<?php if(Auth::user()->rol != 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contar-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('j2w7R8S')) {
    $componentId = $_instance->getRenderedChildComponentId('j2w7R8S');
    $componentTag = $_instance->getRenderedChildComponentTagName('j2w7R8S');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('j2w7R8S');
} else {
    $response = \Livewire\Livewire::mount('contar-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('j2w7R8S', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php elseif(Auth::user()->rol == 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermogramas', [])->html();
} elseif ($_instance->childHasBeenRendered('Ok8y7rY')) {
    $componentId = $_instance->getRenderedChildComponentId('Ok8y7rY');
    $componentTag = $_instance->getRenderedChildComponentTagName('Ok8y7rY');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('Ok8y7rY');
} else {
    $response = \Livewire\Livewire::mount('espermogramas', []);
    $html = $response->html();
    $_instance->logRenderedChild('Ok8y7rY', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/home.blade.php ENDPATH**/ ?>