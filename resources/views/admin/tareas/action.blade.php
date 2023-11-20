
<a href="{{route('admin.tareas.show', $tarea)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
@if($tarea->proyectos->objetivos2->first()->operativas->enabled==false)
<a href="{{route('admin.tareas.edit', $tarea->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
@endif
<a href="{{route('admin.tareas.destroy', $tarea->id)}}" class="btn btn-sm btn-danger" title="Eliminar" target='_blank'><i class="fas fa-trash-alt"></i></a>