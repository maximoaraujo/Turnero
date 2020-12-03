@extends('layouts.menu')
@extends('plantilla')

<title>Gestión de turnos | Turnos</title>

@section('contenido')
<div class="card-body">
  <ul class="todo-list ui-sortable" data-widget="todo-list">
    <li class="done" style="">
      <span class="handle ui-sortable-handle">
        <i class="fas fa-ellipsis-v"></i>
        <i class="fas fa-ellipsis-v"></i>
      </span>
      <div class="icheck-primary d-inline ml-2">
        <input type="checkbox" value="" name="todo2" id="todoCheck2" checked="">
        <label for="todoCheck2"></label>
      </div>
      <span class="text">Make the theme responsive</span>
      <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
        <div class="tools">
          <i class="fas fa-edit"></i>
          <i class="fas fa-trash-o"></i>
        </div>
      </li><li class="" style="">
      <li class="done" style="">
      <span class="handle ui-sortable-handle">
        <i class="fas fa-ellipsis-v"></i>
        <i class="fas fa-ellipsis-v"></i>
      </span>
      <div class="icheck-primary d-inline ml-2">
        <input type="checkbox" value="" name="todo2" id="todoCheck2" checked="">
        <label for="todoCheck2"></label>
      </div>
      <span class="text">Make the theme responsive</span>
      <small class="badge badge-info"><i class="far fa-clock"></i> 4 hours</small>
        <div class="tools">
          <i class="fas fa-edit"></i>
          <i class="fas fa-trash-o"></i>
        </div>
      </li><li class="" style="">
      
    </ul>
</div>
@endsection              