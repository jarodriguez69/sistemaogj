{{-- <a href="{{route('admin.objetivos.show', $objetivo)}}" class="btn btn-sm btn-warning">Ver</a> 
<a href="{{route('admin.objetivos.edit', $objetivo->id)}}" class="btn btn-sm btn-info">Editar</a>
<a href="{{route('admin.tareas.indexobjetivo', $objetivo->id)}}" class="btn btn-sm btn-dark">Ver Tareas</a> --}}


{{-- <a href="{{route('admin.objetivos.show', 99)}}" class="btn btn-sm btn-warning">Ver</a> 
<a href="{{route('admin.objetivos.edit', 99)}}" class="btn btn-sm btn-info">Editar</a>
<a href="{{route('admin.tareas.indexobjetivo', 99)}}" class="btn btn-sm btn-dark">Ver Tareas</a> --}}


<a href="{{route('admin.objetivos.show', $objetivo)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
<a href="{{route('admin.objetivos.edit', $objetivo->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>
<a href="{{route('admin.actividades.indexobjetivo', $objetivo->id)}}" class="btn btn-sm btn-dark" title="Ver Actividades"><i class="far fa-fw fa-circle text-green"></i></a>
<a href="{{route('admin.objetivos.charts', $objetivo->id)}}" class="btn btn-sm btn-primary" title="Graficos"><i class="fas fa-chart-bar"></i></a>
