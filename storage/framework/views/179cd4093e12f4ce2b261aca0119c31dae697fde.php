<?php use SimpleSoftwareIO\QrCode\Facades\QrCode; ?>



<title>Gestión de turnos | Inicio</title>

<?php if(Auth::user()->rol != 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contar-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('fCBZBDj')) {
    $componentId = $_instance->getRenderedChildComponentId('fCBZBDj');
    $componentTag = $_instance->getRenderedChildComponentTagName('fCBZBDj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('fCBZBDj');
} else {
    $response = \Livewire\Livewire::mount('contar-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('fCBZBDj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php elseif(Auth::user()->rol == 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermogramas', [])->html();
} elseif ($_instance->childHasBeenRendered('LNnzCAo')) {
    $componentId = $_instance->getRenderedChildComponentId('LNnzCAo');
    $componentTag = $_instance->getRenderedChildComponentTagName('LNnzCAo');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('LNnzCAo');
} else {
    $response = \Livewire\Livewire::mount('espermogramas', []);
    $html = $response->html();
    $_instance->logRenderedChild('LNnzCAo', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/home.blade.php ENDPATH**/ ?>