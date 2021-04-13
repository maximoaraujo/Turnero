


<title>Demanda | Consultas</title>

<?php $__env->startSection('contenido'); ?>
<?php
if (! isset($_instance)) {
    $html = \Livewire\Livewire::mount('consultas-generales', [])->html();
} elseif ($_instance->childHasBeenRendered('m9izvOP')) {
    $componentId = $_instance->getRenderedChildComponentId('m9izvOP');
    $componentTag = $_instance->getRenderedChildComponentTagName('m9izvOP');
    $html = \Livewire\Livewire::dummyMount($componentId, $componentTag);
    $_instance->preserveRenderedChild('m9izvOP');
} else {
    $response = \Livewire\Livewire::mount('consultas-generales', []);
    $html = $response->html();
    $_instance->logRenderedChild('m9izvOP', $response->id(), \Livewire\Livewire::getRootElementTagName($html));
}
echo $html;
?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/demanda/consultas.blade.php ENDPATH**/ ?>