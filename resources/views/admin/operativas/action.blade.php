


<a href="{{route('admin.operativas.show', $operativa)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
<a href="{{route('admin.operativas.edit', $operativa->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>
<a href="{{route('admin.objetivos.indexoperativa', $operativa->id)}}" class="btn btn-sm btn-dark" title="Tareas"><i class="fas fa-tasks"></i></a>
<a href="{{route('admin.operativas.charts', $operativa->id)}}" class="btn btn-sm btn-primary" title="Graficos"><i class="fas fa-chart-bar"></i></a>
