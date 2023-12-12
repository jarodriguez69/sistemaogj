{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Actividades')
@section('plugins.Datatables', true)

@section('content_header')
    @if($proceso->id ==9)         
        <a href="{{route('admin.tareas.createnc')}}" class="btn btn-secondary float-right">Nueva NC</a>     
    @else
        <a href="{{route('admin.tareas.create')}}" class="btn btn-secondary float-right">Nuevo</a>       
    @endif

    <h1>Actividades del Proceso {{$proceso->name}}</h1>
@endsection

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('info')}}</strong>
</div>
@endif
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="tareas"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>Descripci&oacute;n</th>
                        <th>Proyecto</th>
                        <th>Inicio</th>
                        <th>Fin</th>
                        <th>Estado</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($tareas as $tarea)
                        <tr>
                            <td>{{$tarea->id}}</td>
                            <td>{{$tarea->name}} <a href="{{route('admin.tareas.show', $tarea)}}" target='_blank'><i class="fas fa-paperclip" {{App\Models\File::where('tarea_id',$tarea->id)->get()->count() == 0 ? 'style=display:none;' : ''}}></i></a> </td>
                            <td>{{$tarea->description}}</td>
                            <td>{{$tarea->proyectos->name}}</td>
                            <td>{{$tarea->begin}}</td>
                            <td>{{$tarea->end}}</td>
                            <td>{{$tarea->estadotarea->name}}</td>
                            <td>
                                @if($tarea->proceso_id !=9)         
                                <a href="{{route('admin.tareas.show', $tarea)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                @endif
                                @if($tarea->proyectos->objetivos2->first()->operativas->enabled==false)
                                <a href="{{route('admin.tareas.edit', $tarea->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
                                @endif
                                <a href="{{route('admin.tareas.destroy', $tarea->id)}}" class="btn btn-sm btn-danger" title="Eliminar" target='_blank'><i class="fas fa-trash-alt"></i></a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
        </table> 
        </div>
    </div>
@endsection


@section('js')
    <script>

$('#tareas').DataTable( {
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


