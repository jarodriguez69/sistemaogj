{{-- <a href="{{route('admin.proyectos.show', $proyecto)}}" class="btn btn-sm btn-warning">Ver</a> 
<a href="{{route('admin.proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-info">Editar</a>
<a href="{{route('admin.tareas.indexproyecto', $proyecto->id)}}" class="btn btn-sm btn-dark">Ver Tareas</a> --}}


{{-- <a href="{{route('admin.proyectos.show', 99)}}" class="btn btn-sm btn-warning">Ver</a> 
<a href="{{route('admin.proyectos.edit', 99)}}" class="btn btn-sm btn-info">Editar</a>
<a href="{{route('admin.tareas.indexproyecto', 99)}}" class="btn btn-sm btn-dark">Ver Tareas</a> --}}


<a href="{{route('admin.proyectos.show', $proyecto)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
<a href="{{route('admin.proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>
<a href="{{route('admin.tareas.indexproyecto', $proyecto->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
<a href="{{route('admin.proyectos.charts', $proyecto->id)}}" class="btn btn-sm btn-primary" title="Graficos" target='_blank'><i class="fas fa-chart-bar"></i></a>
<a href="{{route('admin.proyectos.history', $proyecto->id)}}" class="btn btn-sm btn-secondary" title="Historico" target='_blank'><i class="fas fa-history"></i></a>
