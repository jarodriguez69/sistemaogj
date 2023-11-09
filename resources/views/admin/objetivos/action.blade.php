<a href="{{route('admin.objetivos.show', $objetivo)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-fw fa-eye"></i></a> 
@if($objetivo->operativas->enabled==false)
    <a href="{{route('admin.objetivos.edit', $objetivo->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-fw fa-edit"></i></a>
@endif 
<a href="{{route('admin.actividades.indexobjetivo', $objetivo->id)}}" class="btn btn-sm btn-dark" title="Ver Actividades" target='_blank'><i class="far fa-fw fa-circle text-green"></i></a>
<a href="{{route('admin.objetivos.charts', $objetivo->id)}}" class="btn btn-sm btn-primary" title="Graficos" target='_blank'><i class="fas fa-fw fa-chart-bar"></i></a>
