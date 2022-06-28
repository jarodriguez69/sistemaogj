
<a href="{{route('admin.actividades.show', $actividad)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
<a href="{{route('admin.actividades.edit', $actividad->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  
<a href="{{route('admin.actividades.destroy', $actividad->id)}}" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>