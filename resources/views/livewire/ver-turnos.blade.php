<div>
    <div class = "row">
        <div class = "col-sm-2">  
            <input type = "date" class = "form-control" wire:model='fecha' style = "margin-top:10px;">
        </div>   
    </div>
    <div class="col-12 col-sm-12" style = "margin-top:20px;">
    <div class="card card-primary card-outline card-outline-tabs">
        <div class="card-header p-0 border-bottom-0">
            <ul class="nav nav-tabs" id="custom-tabs-four-tab" role="tablist">
                <li class="nav-item">
                    <a class="nav-link {{$tab_dengue}}" data-toggle="pill" href="#custom-tabs-four-dengue">Dengue</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_exudado}}" data-toggle="pill" href="#custom-tabs-four-exudado" >Exudado</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_espermograma}}" data-toggle="pill" href="#custom-tabs-four-espermograma">Espermograma</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_general}}" data-toggle="pill" href="#custom-tabs-four-general">General</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_citogenetica}}" data-toggle="pill" href="#custom-tabs-four-citogenetica">Citogenética</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link {{$tab_p75}}" data-toggle="pill" href="#custom-tabs-four-p75">P75</a>
                </li>
            </ul>
        </div>
        <div class="card-body">
        <div class="tab-content" id="custom-tabs-four-tabContent">
            <div class="tab-pane fade {{$tab_dengue_}}" id="custom-tabs-four-dengue" role="tabpanel">
               Dengue
            </div>
            <div class="tab-pane fade {{$tab_exudado_}}" id="custom-tabs-four-exudado" role="tabpanel">
               Exudado
            </div>
            <div class="tab-pane fade {{$tab_espermograma_}}" id="custom-tabs-four-espermograma" role="tabpanel">
               Espermograma
            </div>
            <div class="tab-pane fade {{$tab_general_}}" id="custom-tabs-four-general" role="tabpanel">
            <div class="table-responsive">
            <center>
            <div class = "col-sm-2">
            <select class="browser-default custom-select" wire:model='horario_sel'>
                <option selected>--Horarios--</option>
                @foreach($horarios as $horario)
                <option value="{{$horario->id_horario}}">{{$horario->horario}}</option>
                @endforeach
            </select>
            </div>
            </center>
            <table class="table" style = "margin-top:10px;">
                <thead>
                <tr>
                    <th scope="col" nowrap>Horario</th>
                    <th scope="col" nowrap>Turno</th>
                    <th scope="col" nowrap>Paciente</th>
                    <th scope="col" nowrap>Documento</th>
                    <th scope="col" nowrap>Domicilio</th>
                    <th scope="col" nowrap>O.S.</th>
                    <th scope="col" nowrap>Asistió</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($turnos_generales as $turno_general)
                <tr>
                    <td hidden>{{$turno_general->id_horario}}</td>
                    <td nowrap>{{$turno_general->horario}}</td>
                    <td nowrap>{{$turno_general->letra}}{{$turno_general->id}}</td>
                    <td nowrap>{{$turno_general->paciente}}</td>
                    <td nowrap>{{$turno_general->documento}}</td>
                    <td nowrap>{{$turno_general->domicilio}}</td>
                    <td nowrap>{{$turno_general->obra_social}}</td>
                    @if ($turno_general->asistio == 'si')
                    <td style = 'text-align: center;'><label><input type='checkbox' checked></label></td>
                    @else
                    <td style = 'text-align: center;'><label><input type='checkbox' wire:click='asistencia_generales("{{$turno_general->id_horario}}", "{{$turno_general->letra}}", "{{$turno_general->id}}", "{{$turno_general->documento}}")'></label></td>
                    @endif
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
            <div class="tab-pane fade {{$tab_citogenetica_}}" id="custom-tabs-four-citogenetica" role="tabpanel">
               Citogenetica
            </div>
            <div class="tab-pane fade {{$tab_p75_}}" id="custom-tabs-four-p75" role="tabpanel">
            <div class="table-responsive">
            <table class="table">
                <thead>
                <tr>
                    <th scope="col" nowrap>Horario</th>
                    <th scope="col" nowrap>Turno</th>
                    <th scope="col" nowrap>Paciente</th>
                    <th scope="col" nowrap>Documento</th>
                    <th scope="col" nowrap>Domicilio</th>
                    <th scope="col" nowrap>O.S.</th>
                    <th scope="col" nowrap>Asistió</th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
                </thead>
                <tbody>
                @foreach($turnos_p75 as $turno_p75)
                <tr>
                    <td nowrap>{{$turno_p75->horario}}</td>
                    <td nowrap>{{$turno_p75->letra}}{{$turno_p75->id}}</td>
                    <td nowrap>{{$turno_p75->paciente}}</td>
                    <td nowrap>{{$turno_p75->documento}}</td>
                    <td nowrap>{{$turno_p75->domicilio}}</td>
                    <td nowrap>{{$turno_p75->obra_social}}</td>
                    <td nowrap>{{$turno_p75->asistio}}</td>
                </tr>
                @endforeach
                </tbody>
            </table>
            </div>
            </div>
        </div>
        </div>
    </div>
    </div>
</div>
