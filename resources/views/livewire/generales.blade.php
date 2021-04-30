<div>
    <!--Fecha-->
    <div class = "row">
      <div class = "col-sm-2 mt-2">
          <input type = "date" class = "form-control" wire:model='fecha'>
      </div>
      <div class = "col-sm-10 mt-3">IOSCOR: <span class = "text-danger">{{$ioscor}}</span> | 
      PLAN SUMAR ({{$plan_sumar}}) - PROFE ({{$profe}}) - SIN CARGO ({{$sin_cargo}}): <span class = "text-danger">{{$resto}}</span> | Resto: <span class = "text-danger">{{$demanda}}</span> | IOSFA: <span class = "text-danger">{{$iosfa}}</span></div>
      </div>
      <div class = "row mt-2">
        @if($cantidad_ioscor <= $ioscor)
        <div class = "col-sm-6">
          <div class="alert alert-danger alert-dismissible">
            <button type="button" class="close">×</button>
              <h5><i class="icon fas fa-ban"></i> Atención!</h5>
              ¡No asignar más turnos a pacientes con IOSCOR!
          </div>
        </div>
        @endif
        @if($cantidad_resto <= $resto)
        <div class = "col-sm-6">
          <div class = "alert alert-danger alert-dismissible">
            <h5><i class = "icon fas fa-ban"></i>Atención!</h5>
            ¡No asignar más turnos a pacientes con PLAN SUMAR, PROFE Y/O SIN CARGO!
          </div>
        </div>
        @endif  
        <!--Mensaje por día no laborable-->
        @if($no_laboral > 0)
        <div class = "col-sm-6">
          <div class="alert alert-warning alert-dismissible">
              <h5><i class="icon fas fa-exclamation-triangle"></i> Atención!</h5>
              ¡El laboratorio permanecerá cerrado!
          </div>
        </div>
        @endif  
        <div class = "col-sm-6">
          <div class="alert alert-dismissible" style = "background-color:orange;">
              <h5><i class="icon fas fa-exclamation-triangle"></i> Novedades!</h5>
              -Calcio iónico = <strong>Lunes, Martes y Miércoles</strong><br>
              -Proteinograma electrof. = <strong>Jueves y Viernes</strong><br>
              -HPV = <strong>Miércoles</strong><br>
              -Cariotipo Bandeo GTG | Cariotipo alta resolución (suspendida) = <strong>Lunes y Martes</strong><br>
              -Hepatitis B CARGA VIRAL | Hepatitis C CARGA VIRAL | Citogenetica m. ósea = <strong>Lunes a Jueves</strong>                
          </div>
        </div>
      </div>  
      <!--Una vez que se genera el turno abrimos el comprobante en otra ventana y le pasamos el ID-->
      @if (session()->has('message'))
      <input type = "text" value = "{{ session('message') }}" id = "id_turno" hidden>
        <script>
            var id_turno = $("#id_turno").val();
            $(document).ready(function(){
                window.open('/comprobante_turno/'+id_turno, '_blank');
            }); 
        </script>
      @endif
      @if($vista == 'turnos')
      <!--Horarios-->
      <div class="row">
        @foreach($horarios as $horario)
          <div class="col-lg-3 col-6 mt-2">
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
      <h5><span class="text-bold" style = "color:blue;">Horario: {{$horario}}</span></h5>
      <div class="card card">
        <div class="card-header">
          <h3 class="card-title">Paciente</h3>
        </div>
        <div class="card-body">
          @if($horario == '06:30')
            @if((date('l', strtotime($fecha)) == 'Tuesday') || (date('l', strtotime($fecha)) == 'Wednesday') || (date('l', strtotime($fecha)) == 'Thursday') || (date('l', strtotime($fecha)) == 'Friday'))
              <div class="custom-control custom-checkbox">
                <input type="checkbox" class="custom-control-input" wire:model='p75' id = 'p75'>   
                <?php $cantidad_p75 = App\Models\pacientes_turno::where([['fecha', $fecha],['para', 'P75']])->get()->count(); ?>
                <label class="custom-control-label" for="p75">P75 - (<?php echo $cantidad_p75; ?>)</label>
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
                <input type = "number" class = "form-control" wire:model='documento' wire:keydown.enter='buscoPaciente' placeholder="Documento">
				        @error('documento') <span class ="badge badge-danger">{{ $message }}</span> @enderror
            </div> 
			      <div class = "col-sm-2">
                <button class = "btn btn-primary" wire:click='buscoPaciente'>Buscar</button>
            </div>
            <div class = "col-sm-2 ml-2">
              <div wire:loading wire:target="buscoPaciente">
                  <div class="spinner-grow text-success" role="status">
                    <span class="sr-only">Buscando paciente...</span>
                  </div>
              </div> 
            </div>  
            <div class = "col-sm-12 ml-1"><p class = "small" style = "font-size:12px;color:red;">Para buscar presione el botón o ENTER</p></div>
            @if($encontrado == 'No')
            <div class = "col-sm-12">
              <p style = "color:red;">No hay paciente registrado con el documento {{$documento}}</p>
            </div>  
            @endif
              </div>
              <div class = "row">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" wire:model.defer='paciente' placeholder="Paciente">
                    @error('paciente') <span class ="badge badge-danger">{{ $message }}</span> @enderror
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" wire:model.defer='domicilio' placeholder="Domicilio">
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-sm-6">
                    <input type = "text" class = "form-control" wire:model.defer='telefono' placeholder="Teléfono">
                </div>
                <div class = "col-sm-6">
                    <input type = "date" class = "form-control" wire:model.defer='fecha_nacimiento' placeholder="Fecha">
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-sm-12">
                    <input type = "text" class = "form-control" wire:model.defer='comentarios' placeholder="Comentarios">
                </div>
            </div>
            <div class = "row mt-2">
                <div class = "col-sm-12">
                    <p style = "color:red;">Último turno: {{date('d-m-Y', strtotime($ultimo_turno))}}</p>
                </div>
            </div>
            <div class = "row mt-2">
              <div class = "row">
                @foreach($turnos_desde as $turno_desde)
                <div class = "col-sm-4">
                <div class="form-check">
                  <input class="form-check-input" value = "{{$turno_desde->id}}" wire:model='desde_id' type="radio" name="flexRadioDefault" id="flexRadioDefault1">
                  <label class="form-check-label" for="flexRadioDefault1">
                    {{$turno_desde->desde}}
                  </label>
                </div>
                </div>
                @endforeach
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
			@error('obrasocial') <span class ="badge badge-danger">{{ $message }}</span> @enderror
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
            <input wire:model.debounce.500ms="practica" 
            wire:keydown="buscarPractica" type="text" class="form-control" placeholder="Práctica" autocomplete="off"> 
              @if(count($practicas)>0)
                @if(!$picked_)
                  <div class="shadow rounded px-3 pt-3 pb-0 orange lighten-5">
                      <a href = "#" wire:click='cierroBusqueda' style = "float:right;"><i class="fas fa-times-circle"></i></a>
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
          <div class="card card-body">
            <div class = "form-group">
              <form>
                <div class="custom-input-file col-md-12 col-sm-12 col-xs-12">
                <input type="file" id="orden_medica" class="input-file" wire:model='orden'>
                Orden médica
                </div>
                @error('orden') <span class="error">{{ $message }}</span> @enderror
              </form>
              <hr>
              <div class = "table-responsive">
              <table border="0" cellpadding="2">
                  <tr>
                  @foreach($ordenes as $orden)
                  <td>
                    <img src="{{$orden->url}}" width="150px" height="200px"/><br>
                    <button class = "btn btn-small btn-danger" wire:click='elimino_orden("{{$orden->id_turno}}", "{{$orden->url}}")'><i class="fas fa-trash-alt"></i></a></button>
                  </td>
                  @endforeach    
                  </tr>
              </table>
              </div>
            </div>
          </div>
        </div>
      </div>
      <button class = "btn btn-success" wire:click='guardo_turno'>Guardar</button>
      <button class = "btn btn-danger ml-1" wire:click='cancelar'>Cancelar</button>
      </div>
    </div>
    @endif
    <!---->
</div>