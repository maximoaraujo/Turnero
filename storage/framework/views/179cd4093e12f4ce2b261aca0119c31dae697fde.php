


<title>Gestión de turnos | Inicio</title>

<?php if(Auth::user()->rol != 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('contar-turnos', [])->html();
} elseif ($_instance->childHasBeenRendered('nBhPOBe')) {
    $componentId = $_instance->getRenderedChildComponentId('nBhPOBe');
    $componentTag = $_instance->getRenderedChildComponentTagName('nBhPOBe');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nBhPOBe');
} else {
    $response = \Livewire\Livewire::mount('contar-turnos', []);
    $html = $response->html();
    $_instance->logRenderedChild('nBhPOBe', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php elseif(Auth::user()->rol == 'espermograma'): ?>
<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('espermogramas', [])->html();
} elseif ($_instance->childHasBeenRendered('T2XYxn7')) {
    $componentId = $_instance->getRenderedChildComponentId('T2XYxn7');
    $componentTag = $_instance->getRenderedChildComponentTagName('T2XYxn7');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('T2XYxn7');
} else {
    $response = \Livewire\Livewire::mount('espermogramas', []);
    $html = $response->html();
    $_instance->logRenderedChild('T2XYxn7', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php endif; ?>


<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/home.blade.php ENDPATH**/ ?>