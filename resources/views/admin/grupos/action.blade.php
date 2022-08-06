


<a href="{{route('admin.grupos.show', $grupo)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
<a href="{{route('admin.grupos.edit', $grupo->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>
<a href="{{route('admin.proyectos.indexgrupo', $grupo->id)}}" class="btn btn-sm btn-dark" title="Tareas"><i class="fas fa-tasks"></i></a>
<a href="{{route('admin.grupos.charts', $grupo->id)}}" class="btn btn-sm btn-primary" title="Graficos"><i class="fas fa-chart-bar"></i></a>
