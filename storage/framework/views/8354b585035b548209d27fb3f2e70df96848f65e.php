


<title>Gestión de turnos | Ordenes</title>

<?php $__env->startSection('contenido'); ?>
<div class = "row mt-2">
    <div class = "col-sm-12">
        <p>Paciente: <?php echo e($paciente); ?></p>
        <p>Obra social: <?php echo e($obra_social); ?></p>
    </div>
    <div class = "col-sm-5">
        <div class="card">
            <div class="card-header border-0">
                <h3 class="card-title">Prácticas asociadas</h3>
            </div>
            <div class="card-body">
                <?php $__currentLoopData = $practicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="d-flex justify-content-between align-items-center border-bottom mb-3">
                    <p class="d-flex flex-column text-right">
                        <span class="text-muted"><?php echo e($practica->codigo); ?> - <?php echo e($practica->practica); ?></span>
                    </p>

                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </div>
        </div>    
    </div>
    <div class="col-sm-7">
        <div class="card">
        <div class="card-header border-0">
            <h3 class="card-title">Ordenes adjuntas</h3>
        </div>
        <div class="card-body">
            <div class="row">
                <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <div class="col-sm-2">
                    <a href="<?php echo e($orden->url); ?>" data-toggle="lightbox" data-gallery="gallery">
                        <img src="<?php echo e($orden->url); ?>" class="img-fluid mb-2">
                    </a>
                </div> 
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>   
            </div>       
        </div>
        </div>
    </div>
</div>
<script>
  $(function () {
    $(document).on('click', '[data-toggle="lightbox"]', function(event) {
      event.preventDefault();
      $(this).ekkoLightbox({
        alwaysShowClose: true
      });
    });

    $('.filter-container').filterizr({gutterPixels: 3});
    $('.btn[data-filter]').on('click', function() {
      $('.btn[data-filter]').removeClass('active');
      $(this).addClass('active');
    });
  })
</script>
<?php $__env->stopSection(); ?>



<?php echo $__env->make('plantilla', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php echo $__env->make('layouts.menu', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH D:\Proyectos\Turnero\resources\views/ver-turnos/orden_turno.blade.php ENDPATH**/ ?>