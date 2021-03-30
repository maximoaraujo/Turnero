<div>
    <!--Fecha-->
    <div class = "col-sm-2 mt-2">
        <input type = "date" class = "form-control" wire:model='fecha'>
    </div>
    <!--Verificamos cuantos turnos para IOSCOR hay asignados-->
    <?php
    $ioscor = App\Models\paciente::join('pacientes_turnos', 'pacientes_turnos.documento', 'pacientes.documento')
    ->join('obras_socials', 'obras_socials.id', 'pacientes.obra_social_id')
    ->where('pacientes_turnos.fecha', $fecha)
    ->where('pacientes_turnos.para', 'general')
    ->where(function ($query) {
      $query->where('obras_socials.obra_social', '=', 'IOSCOR')
      ->orWhere('obras_socials.obra_social', '=', 'IOSCOR PRESUPUESTO');
    })
	  ->get()->count();
    ?>
    <!--Si la cantida de turnos de IOSCOR iguala o excede la cantidad permitida mostramos el mensaje-->
    <?php if($cantidad_ioscor <= $ioscor): ?>
    <center>
    <div class = "col-sm-6">
    <div class="alert alert-danger alert-dismissible">
      <button type="button" class="close">×</button>
        <h5><i class="icon fas fa-ban"></i> Atención!</h5>
        ¡No asignar más turnos a pacientes con IOSCOR!
    </div>
    </div>
    </center>
    <?php endif; ?>
    <!--Mensaje por día no laborable-->
    <?php if($no_laboral > 0): ?>
    <center>
    <div class = "col-sm-6">
    <div class="alert alert-warning alert-dismissible">
        <button type="button" class="close">×</button>
        <h5><i class="icon fas fa-exclamation-triangle"></i> Atención!</h5>
        ¡El laboratorio permanecerá cerrado!
    </div>
    </div>
    </center>
    <?php endif; ?>
    <!--Una vez que se genera el turno abrimos el comprobante en otra ventana y le pasamos el ID-->
    <?php if(session()->has('message')): ?>
    <input type = "text" value = "<?php echo e(session('message')); ?>" id = "id_turno" hidden>
       <script>
          var id_turno = $("#id_turno").val();
          $(document).ready(function(){
              window.open('/comprobante_turno/'+id_turno, '_blank');
          }); 
       </script>
    <?php endif; ?>
    <?php if($vista == 'turnos'): ?>
    <div class = "row mt-2">
    <!--Horarios-->
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
        <a href="#" class="small-box-footer" wire:click='Asignarturno(<?php echo e($horario->id_horario); ?>)'>
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
      <h5><span class="text-bold" style = "color:blue;">Horario: <?php echo e($horario); ?></span></h5>
      <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Paciente</h3>
        </div>
        <div class="card-body">
          <div class="row">
            <div class = "col-sm-4">
                <input type = "number" class = "form-control" wire:model='documento' wire:keydown.enter='buscoPaciente' placeholder="Documento">
				        <?php $__errorArgs = ['documento'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class ="badge badge-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
            </div> 
			      <div class = "col-sm-2">
                <button class = "btn btn-primary" wire:click='buscoPaciente'>Buscar</button>
            </div>
            <div class = "col-sm-2">
              <div wire:loading wire:target="buscoPaciente">
                  <div class="spinner-grow text-success" role="status">
                    <span class="sr-only">Buscando paciente...</span>
                  </div>
              </div> 
            </div>  
			      <div class = "col-sm-12 ml-1"><p class = "small" style = "font-size:12px;color:red;">Para buscar presione el botón o ENTER</p></div>
            <?php if($encontrado == 'No'): ?>
            <div class = "col-sm-12">
              <p style = "color:red;">No hay paciente registrado con el documento <?php echo e($documento); ?></p>
            </div>  
            <?php endif; ?>
          </div>
          <div class = "row">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" wire:model='paciente' placeholder="Paciente">
			      	  <?php $__errorArgs = ['paciente'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class ="badge badge-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>
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
        <div class = "row mt-2">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" wire:model='comentarios' placeholder="Comentarios">
            </div>
        </div>
        
        </div>
      </div>
      </div>
      <!--Prácticas-->
      <div class = "col-sm-6 mt-4 ml-2">
      <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Asignar prácticas</h3>
        </div>
        <div class="card-body">
          <div class = "row">
            <div class = "col-sm-12">
            <input wire:model.debounce.500ms="obrasocial" 
            wire:keydown="buscarObrasocial" type="text" class="form-control" placeholder="Obra social" autocomplete="off">
			      <?php $__errorArgs = ['obrasocial'];
$__bag = $errors->getBag($__errorArgs[1] ?? 'default');
if ($__bag->has($__errorArgs[0])) :
if (isset($message)) { $__messageOriginal = $message; }
$message = $__bag->first($__errorArgs[0]); ?> <span class ="badge badge-danger"><?php echo e($message); ?></span> <?php unset($message);
if (isset($__messageOriginal)) { $message = $__messageOriginal; }
endif;
unset($__errorArgs, $__bag); ?>			
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
            <input wire:model.debounce.500ms="practica" 
            wire:keydown="buscarPractica" type="text" class="form-control" placeholder="Práctica" autocomplete="off"> 
              <?php if(count($practicas)>0): ?>
                <?php if(!$picked_): ?>
                  <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                  <a href = "#" wire:click='cierroBusqueda' style = "float:right;"><i class="fas fa-times-circle"></i></a>
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
                  <th></th>
                </tr>
              </thead>
              <tbody>
                <?php $__currentLoopData = $practicas_agregadas; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $practica_agregada): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td hidden><?php echo e($practica_agregada->id); ?></td> 
                  <td><?php echo e($practica_agregada->codigo); ?></td> 
                  <td><?php echo e($practica_agregada->practica); ?></td> 
                  <td><a href = "#" wire:click='eliminarPractica(<?php echo e($practica_agregada->id); ?>)'><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
              </tbody>
            </table>
          </div>
          <div class="card card-body">
            <div class = "form-group">
              <form wire:submit="almacenar_orden_en_disco">
                <div class="custom-input-file col-md-12 col-sm-12 col-xs-12">
                <input type="file" id="orden_medica" class="input-file" wire:model='orden'>
                Orden médica
                </div>
              </form>
              <hr>
              <div class = "table-responsive">
              <table border="0" cellpadding="2">
                  <tr>
                  <?php $__currentLoopData = $ordenes; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $orden): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                  <td>
                    <img src="<?php echo e($orden->url); ?>" width="150px" height="200px"/><br>
                    <button class = "btn btn-small btn-danger" wire:click='elimino_orden("<?php echo e($orden->id_turno); ?>", "<?php echo e($orden->url); ?>")'><i class="fas fa-trash-alt"></i></a></button>
                  </td>
                  <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>    
                  </tr>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class = "btn btn-success" wire:click='guardo_turno'>Guardar</button>
      <button class = "btn btn-danger" wire:click='cancelar'>Cancelar</button>
      </div>
    </div>
    <?php endif; ?>
    <!---->
</div>





<?php /**PATH C:\laragon\www\Turnero\resources\views/livewire/espermograma.blade.php ENDPATH**/ ?>