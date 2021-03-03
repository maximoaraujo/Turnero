


<title>Demanda | Consultas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('consultas-generales', [])->html();
} elseif ($_instance->childHasBeenRendered('nJ1P7x6')) {
    $componentId = $_instance->getRenderedChildComponentId('nJ1P7x6');
    $componentTag = $_instance->getRenderedChildComponentTagName('nJ1P7x6');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('nJ1P7x6');
} else {
    $response = \Livewire\Livewire::mount('consultas-generales', []);
    $html = $response->html();
    $_instance->logRenderedChild('nJ1P7x6', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\laragon\www\Turnero\resources\views/demanda/consultas.blade.php ENDPATH**/ ?>