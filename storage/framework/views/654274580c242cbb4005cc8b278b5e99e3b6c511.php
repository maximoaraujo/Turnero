<div>
    <!--Fecha-->
    <div class = "col-sm-2 mt-2">
        <input type = "date" class = "form-control" wire:model='fecha'>
    </div>
    <?php if($vista == 'general'): ?>
    <div class = "row">
    <!--Horarios-->
    <div class="row mt-2 ml-2">
        <?php $__currentLoopData = $horarios; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $horario): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <div class="col-lg-3 col-6">
            <!---->
            <div class="small-box bg-info">
              <div class="inner">
                <h4><?php echo e($horario->horario); ?></h4>

                <?php
                  $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha],['id_horario', $horario->id_horario]])->get()->count();
                ?>
                <h3><?php echo $cantidad; ?>/<?php echo e($cantidad_turnos); ?></h3>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              <?php if(($cantidad < $cantidad_turnos)||(Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador')): ?>
              <a href="#" class="small-box-footer" wire:click='Asignarturno'>
              Asignar turno <i class="far fa-calendar-plus fa-sm"></i>
              </a>
              <?php endif; ?>
            </div>
          </div>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
    <?php endif; ?>
    <?php if($vista == 'asignar'): ?>
    <div class = "row">

      <!--Paciente-->
      <div class = "col-sm-5 mt-2 ml-2">
      <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Paciente</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class = "col-sm-4">
                <input type = "number" class = "form-control" wire:model='documento' wire:keydown.enter='buscoPaciente' placeholder="Documento">
            </div>      
          </div>
          <div class = "row mt-2">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" wire:model='paciente' placeholder="Paciente">
            </div>
        </div>
        <div class = "row mt-2">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" wire:model='domicilio' placeholder="Domicilio">
            </div>
        </div>
        <div class = "row mt-2">
            <div class = "col-sm-6">
                <input type = "text" class = "form-control" wire:model='telefono' placeholder="Teléfono">
            </div>
            <div class = "col-sm-6">
                <input type = "date" class = "form-control" wire:model='fecha_nacimiento' placeholder="Fecha">
            </div>
        </div>
        
        </div>
      </div>
      </div>
      <!--Prácticas-->
      <div class = "col-sm-6 mt-2 ml-2">
      <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Asignar prácticas</h3>
        </div>
        <div class="card-body">
          <div class = "row">
            <div class = "col-sm-12">
            <input wire:model.debounce.200ms="obrasocial" 
            wire:keydown="buscarObrasocial" type="text" class="form-control" placeholder="Obra social" autocomplete="off"> 
              <?php if(count($obras_sociales)>0): ?>
                <?php if(!$picked): ?>
                  <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                      <?php $__currentLoopData = $obras_sociales; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $obra_social): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div style="cursor: pointer;color:black;">
                          <a wire:click="asignarObrasocial('<?php echo e($obra_social->obra_social); ?>')">
                              <?php echo e($obra_social->obra_social); ?>

                          </a>
                      </div>
                      <hr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>
              <?php endif; ?>  
            </div>
          </div>
          <div class = "row mt-2">
            <div class = "col-sm-3">
              <input type = "number" class = "form-control" wire:model='codigo_practica' wire:keydown.enter='buscar_x_codigo' placeholder = 'Cod.'>
            </div>
            <div class = "col-sm-9">
            <input wire:model.debounce.200ms="practica" 
            wire:keydown="buscarPractica" type="text" class="form-control" placeholder="Práctica" autocomplete="off"> 
              <?php if(count($practicas)>0): ?>
                <?php if(!$picked_): ?>
                  <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                      <?php $__currentLoopData = $practicas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                      <div style="cursor: pointer;color:black;">
                          <a wire:click="asignarPractica('<?php echo e($practica->practica); ?>')">
                              <?php echo e($practica->practica); ?>

                          </a>
                      </div>
                      <hr>
                      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                  </div>
                <?php endif; ?>
              <?php endif; ?>  
            </div>
          </div>
          <div class = "table-responsive mt-2">
            <table class = "table">
              <thead>
                <tr>
                  <th nowrap>Código</th>
                  <th nowrap>Práctica</th>
                </tr>
              </thead>
              <tbody>
                <tr>
                  
                </tr>
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <button class = "btn btn-success">Guardar</button>
      <button class = "btn btn-danger" wire:click='cancelar'>Cancelar</button>
      </div>
    </div>
    <?php endif; ?>
    <!---->
</div>


<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/generales.blade.php ENDPATH**/ ?>