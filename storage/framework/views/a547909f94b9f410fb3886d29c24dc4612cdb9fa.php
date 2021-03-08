<div>
    <center>
    <div class = "col-sm-4" style = "margin-top:20px;">    
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Cantidad de turnos asignados</h3>
        </div>
        <div class="card-body p-0">
            <table class="table table-sm">
                <thead>
                <tr>
                    <th style="width: 10px">#</th>
                    <th>Para</th>
                    <th style="width: 40px;text-align:center;">Cant.</th>
                </tr>
                </thead>
                <tbody>
                <tr>
                  <td>1.</td> 
                  <td>Dengue</td> 
                  <td style = "color:red;text-align:center;"><?php echo e($cant_dengue); ?>(<?php echo e($cant_dengue_ios); ?>)</td>    
                </tr>
                <tr>
                  <td>2.</td> 
                  <td>Exudado</td> 
                  <td style = "color:red;text-align:center;"><?php echo e($cant_exudado); ?>(<?php echo e($cant_exudado_ios); ?>)</td>    
                </tr>
                <tr>
                  <td>3.</td> 
                  <td>Espermograma</td> 
                  <td style = "color:red;text-align:center;"><?php echo e($cant_espermograma); ?>(<?php echo e($cant_espermograma_ios); ?>)</td>    
                </tr>
                <tr>
                  <td>4.</td> 
                  <td>Generales</td> 
                  <td style = "color:red;text-align:center;"><?php echo e($cant_general); ?>(<?php echo e($cant_general_ios); ?>)</td>    
                </tr>
                <tr>
                  <td>5.</td> 
                  <td>P75</td> 
                  <td style = "color:red;text-align:center;"><?php echo e($cant_p75); ?>(<?php echo e($cant_p75_ios); ?>)</td>    
                </tr>
                <tr>
                  <td>6.</td> 
                  <td>Citogenetíca</td> 
                  <td style = "color:red;text-align:center;"><?php echo e($cant_citogenetica); ?>(<?php echo e($cant_citogenetica_ios); ?>)</td>    
                </tr>
                </tbody>
            </table>
        </div>
    </div>
    </div>
    </center>
</div>
<?php /**PATH D:\Proyectos\Turnero\resources\views/livewire/contar-turnos.blade.php ENDPATH**/ ?>