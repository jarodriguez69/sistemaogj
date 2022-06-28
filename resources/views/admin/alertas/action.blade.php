
<a href="{{route('admin.alertas.show', $alerta)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
<a href="{{route('admin.alertas.edit', $alerta->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  
<a href="{{route('admin.alertas.destroy', $alerta->id)}}" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>