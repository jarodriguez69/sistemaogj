@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Procesos')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.procesos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Mapa de Procesos</h1>
@endsection

@section('content')

@if(session('info'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('info')}}</strong>
</div>
@endif

    <h5 style="text-align: center;">Procesos Estrat&eacute;gicos</h5>
    <div class="row">
        @foreach ($estrategicos as $estrategico)
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-success">
                        <div class="inner">
                            <h3>{{$estrategico->description}}</h3>
                            <p>{{$estrategico->name}}</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        </div>
                        
                            <div style="background-color: rgba(0,0,0,.1); display: block; padding: 3px 0; text-decoration: none; z-index: 10; text-align:center">
                                @if((Auth::user()->hasRole('Admin')))
                                            <a href="{{route('admin.procesos.show', $estrategico)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.procesos.edit', $estrategico->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
                                            <a href="{{route('admin.procesos.estrategico', $estrategico->id)}}" class="btn btn-sm {{$estrategico->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                            <a href="{{route('admin.procesos.clave', $estrategico->id)}}" class="btn btn-sm {{$estrategico->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                            <a href="{{route('admin.procesos.soporte', $estrategico->id)}}" class="btn btn-sm {{$estrategico->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                        @endif 
                                        <a href="{{route('admin.proyectos.indexproceso', $estrategico->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-cubes" target='_blank'></i></a>
                                        <a href="{{route('admin.tareas.indexproceso', $estrategico->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                            </div>
                        </div>
                </div>
            @endforeach
        
    </div>



    <h5 style="text-align: center;">Procesos Claves</h5>
    <div class="row">
        @foreach ($claves as $clave)
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-warning">
                        <div class="inner">
                            <h3>{{$clave->description}}</h3>
                            <p>{{$clave->name}}</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        </div>
                        
                            <div style="background-color: rgba(0,0,0,.1); display: block; padding: 3px 0; text-decoration: none; z-index: 10; text-align:center">
                                @if((Auth::user()->hasRole('Admin')))
                                            <a href="{{route('admin.procesos.show', $clave)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.procesos.edit', $clave->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
                                            <a href="{{route('admin.procesos.estrategico', $clave->id)}}" class="btn btn-sm {{$clave->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                            <a href="{{route('admin.procesos.clave', $clave->id)}}" class="btn btn-sm {{$clave->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                            <a href="{{route('admin.procesos.soporte', $clave->id)}}" class="btn btn-sm {{$clave->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                        @endif 
                                        <a href="{{route('admin.proyectos.indexproceso', $clave->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-cubes"></i></a>
                                        <a href="{{route('admin.tareas.indexproceso', $clave->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                            </div>
                        </div>
                </div>
            @endforeach
        
    </div>

    <h5 style="text-align: center;">Procesos de Soporte</h5>
    <div class="row">
        @foreach ($soportes as $soporte)
                <div class="col-lg-3 col-6">
                    <div class="small-box bg-info">
                        <div class="inner">
                            <h3>{{$soporte->description}}</h3>
                            <p>{{$soporte->name}}</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        </div>
                        
                            <div style="background-color: rgba(0,0,0,.1); display: block; padding: 3px 0; text-decoration: none; z-index: 10; text-align:center">
                                @if((Auth::user()->hasRole('Admin')))
                                            <a href="{{route('admin.procesos.show', $soporte)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.procesos.edit', $soporte->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
                                            <a href="{{route('admin.procesos.estrategico', $soporte->id)}}" class="btn btn-sm {{$soporte->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                            <a href="{{route('admin.procesos.clave', $soporte->id)}}" class="btn btn-sm {{$soporte->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                            <a href="{{route('admin.procesos.soporte', $soporte->id)}}" class="btn btn-sm {{$soporte->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                        @endif 
                                        <a href="{{route('admin.proyectos.indexproceso', $soporte->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-cubes"></i></a>
                                        <a href="{{route('admin.tareas.indexproceso', $soporte->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                            </div>
                        </div>
                </div>
            @endforeach
        
    </div>

    
    
            {{-- <table class="table table-striped" id="procesos"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Descripción</th>
                            <th>Clave</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($procesos as $proceso)
                            <tr>
                                <td>{{$proceso->id}}</td>
                                <td>{{$proceso->name}}</td>
                                <td>{{$proceso->description}}</td>
                                <td>{{$proceso->clave==true ? "Clave": ($proceso->soporte==true ? "Soporte" : "Estrategico")}}</td>
                                <td>
                                    @if((Auth::user()->hasRole('Admin')))
                                        <a href="{{route('admin.procesos.show', $proceso)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                        <a href="{{route('admin.procesos.edit', $proceso->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
                                        <a href="{{route('admin.procesos.estrategico', $proceso->id)}}" class="btn btn-sm {{$proceso->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                        <a href="{{route('admin.procesos.clave', $proceso->id)}}" class="btn btn-sm {{$proceso->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                        <a href="{{route('admin.procesos.soporte', $proceso->id)}}" class="btn btn-sm {{$proceso->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                    @endif 
                                    <a href="{{route('admin.proyectos.indexproceso', $proceso->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-fw fa-cubes"></i></a>
                                    <a href="{{route('admin.tareas.indexproceso', $proceso->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                                    
                            </tr>
                        @endforeach
                    </tbody>
            </table>    
        </div>
    </div>--}}

    
@endsection



@section('js')
    <script>
        $('#procesos').DataTable( {
        language: {            // "lengthMenu": "Mostrando _MENU_ registros por página",
            "lengthMenu": "Mostrando "+'<select class="custom-select custom-select-sm form-control form-control-sm"><option value="10">10</option> <option value="25">25</option> <option value="50">50</option> <option value="100">100</option> <option value="-1">Todos</option></select> '+" registros por página",
            "zeroRecords": "Nada encontrado",
            "info": "Mostrando página _PAGE_ de _PAGES_",
            "infoEmpty": "Sin registros disponibles",
            "infoFiltered": "(filtrados de _MAX_ registros totales)",
            "search": "Buscar:",
            "paginate":{
                "next": "Siguiente",
                "previous":"Anterior"
            }
        },
        dom: 'Blfrtip',
        responsive: true,
        autoWidth:false,
        buttons: [
            {
                extend: "excelHtml5",
                text: '<i class="fas fa-file-excel"></i>',
                titleAttr: 'Exportar a Excel',
                className: 'btn btn-success',
            },
            {
                extend: "pdfHtml5",
                text: '<i class="fas fa-file-pdf"></i>',
                titleAttr: 'Exportar a PDF',
                className: 'btn btn-danger',
            },
            {
                extend: "print",
                text: '<i class="fa fa-print"></i>',
                titleAttr: 'Imprimir',
                className: 'btn btn-info',
            }
        
        ]
    });
    </script>
@stop


