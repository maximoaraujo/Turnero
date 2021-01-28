<?php use SimpleSoftwareIO\QrCode\Facades\QrCode; ?>



<title>Gestión de turnos | Inicio</title>

<?php if(Auth::user()->rol != 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contar-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('dCtFcSj')) {
    $componentId = $_instance->getRenderedChildComponentId('dCtFcSj');
    $componentTag = $_instance->getRenderedChildComponentTagName('dCtFcSj');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('dCtFcSj');
} else {
    $response = \Livewire\Livewire::mount('contar-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('dCtFcSj', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php elseif(Auth::user()->rol == 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermogramas', [])->html();
} elseif ($_instance->childHasBeenRendered('lx1aeY1')) {
    $componentId = $_instance->getRenderedChildComponentId('lx1aeY1');
    $componentTag = $_instance->getRenderedChildComponentTagName('lx1aeY1');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('lx1aeY1');
} else {
    $response = \Livewire\Livewire::mount('espermogramas', []);
    $html = $response->html();
    $_instance->logRenderedChild('lx1aeY1', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/home.blade.php ENDPATH**/ ?>