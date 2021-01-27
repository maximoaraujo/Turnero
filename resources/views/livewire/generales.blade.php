<div>
    <!--Fecha-->
    <div class = "col-sm-2 mt-2">
        <input type = "date" class = "form-control" wire:model='fecha'>
    </div>
    @if($vista == 'turnos')
    <div class = "row">
    <!--Horarios-->
    <div class="row mt-2 ml-2">
        @foreach($horarios as $horario)
        <div class="col-lg-3 col-6">
            <!---->
            <div class="small-box bg-info">
              <div class="inner">
                <h4>{{$horario->horario}}</h4>

                <?php
                  $cantidad = App\Models\pacientes_turno::where([['fecha', $fecha],['id_horario', $horario->id_horario]])->get()->count();
                ?>
                <h3><?php echo $cantidad; ?>/{{$cantidad_turnos}}</h3>
              </div>
              <div class="icon">
                <i class="fas fa-calendar-alt"></i>
              </div>
              @if(($cantidad < $cantidad_turnos)||(Auth::user()->rol == 'desarrollador')||(Auth::user()->rol == 'administrador'))
              <a href="#" class="small-box-footer" wire:click='Asignarturno({{$horario->id_horario}})'>
              Asignar turno <i class="far fa-calendar-plus fa-sm"></i>
              </a>
              @endif
            </div>
          </div>
        @endforeach
    </div>
    @endif
    @if($vista == 'asignar')
    <div class = "row">

      <!--Paciente-->
      <div class = "col-sm-5 mt-2 ml-2">
      <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Paciente</h3>
        </div>
        <div class="card-body">
          @if($horario == '06:30')
            @if((date('l', strtotime($fecha)) == 'Wednesday') || (date('l', strtotime($fecha)) == 'Friday'))
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" wire:model='p75' id = 'p75'>   
                <label class="custom-control-label" for="p75">P75</label> 
              </div>
            @endif
          @endif
          @if(date('l', strtotime($fecha)) == 'Tuesday')
            <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" wire:model='ley' id = "ley">
                <label class="custom-control-label" for = "ley">Ley 26743</label>
              </div>
          @endif
 
          <div class="row">
            <div class = "col-sm-4">
                <input type = "number" wire:model='id_usuario' hidden>
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
        <div class = "row mt-2">
            <div class = "col-sm-12">
                <input type = "text" class = "form-control" wire:model='comentarios' placeholder="Comentarios">
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
              @if(count($obras_sociales)>0)
                @if(!$picked)
                  <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                      @foreach($obras_sociales as $obra_social)
                      <div style="cursor: pointer;color:black;">
                          <a wire:click="asignarObrasocial('{{ $obra_social->obra_social }}')">
                              {{ $obra_social->obra_social }}
                          </a>
                      </div>
                      <hr>
                      @endforeach
                  </div>
                @endif
              @endif  
            </div>
          </div>
          <div class = "row mt-2">
            <div class = "col-sm-3">
              <input type = "number" class = "form-control" wire:model='codigo_practica' wire:keydown.enter='buscar_x_codigo' placeholder = 'Cod.'>
            </div>
            <div class = "col-sm-9">
            <input wire:model.debounce.200ms="practica" 
            wire:keydown="buscarPractica" type="text" class="form-control" placeholder="Práctica" autocomplete="off"> 
              @if(count($practicas)>0)
                @if(!$picked_)
                  <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                      @foreach($practicas as $practica)
                      <div style="cursor: pointer;color:black;">
                          <a wire:click="asignarPractica('{{ $practica->practica }}')">
                              {{ $practica->practica }}
                          </a>
                      </div>
                      <hr>
                      @endforeach
                  </div>
                @endif
              @endif  
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
                @foreach($practicas_agregadas as $practica_agregada)
                <tr>
                  <td hidden>{{$practica_agregada->id}}</td> 
                  <td>{{$practica_agregada->codigo}}</td> 
                  <td>{{$practica_agregada->practica}}</td> 
                  <td><a href = "#" wire:click='eliminarPractica({{$practica_agregada->id}})'><i class="fas fa-trash-alt"></i></a></td>
                </tr>
                @endforeach
              </tbody>
            </table>
          </div>
        </div>
      </div>
      <button class = "btn btn-success" wire:click='guardo_turno'>Guardar</button>
      <button class = "btn btn-danger" wire:click='cancelar'>Cancelar</button>
      </div>
    </div>
    @endif
    <!---->
</div>


