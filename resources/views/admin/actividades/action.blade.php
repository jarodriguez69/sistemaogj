
<a href="{{route('admin.actividades.show', $actividad)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-fw fa-eye"></i></a> 
<a href="{{route('admin.actividades.edit', $actividad->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-fw fa-edit"></i></a>  
<a href="{{route('admin.actividades.destroy', $actividad->id)}}" class="btn btn-sm btn-danger" title="Eliminar" target='_blank'><i class="fas fa-fw fa-trash-alt"></i></a>