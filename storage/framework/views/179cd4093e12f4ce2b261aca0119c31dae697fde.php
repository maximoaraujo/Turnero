<?php use SimpleSoftwareIO\QrCode\Facades\QrCode; ?>



<title>Gestión de turnos | Inicio</title>

<?php if(Auth::user()->rol != 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contar-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('L5bI9pf')) {
    $componentId = $_instance->getRenderedChildComponentId('L5bI9pf');
    $componentTag = $_instance->getRenderedChildComponentTagName('L5bI9pf');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('L5bI9pf');
} else {
    $response = \Livewire\Livewire::mount('contar-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('L5bI9pf', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php elseif(Auth::user()->rol == 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermogramas', [])->html();
} elseif ($_instance->childHasBeenRendered('3Kfhwih')) {
    $componentId = $_instance->getRenderedChildComponentId('3Kfhwih');
    $componentTag = $_instance->getRenderedChildComponentTagName('3Kfhwih');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('3Kfhwih');
} else {
    $response = \Livewire\Livewire::mount('espermogramas', []);
    $html = $response->html();
    $_instance->logRenderedChild('3Kfhwih', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/home.blade.php ENDPATH**/ ?>