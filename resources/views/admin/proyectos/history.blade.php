{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Histórico de Proyectos')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.proyectos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Proyectos por Año</h1>
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
            <table class="table table-striped" id="history"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Año</th>
                            <th>Nombre</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($proyectos as $proyecto)
                            <tr>
                                <td>{{$proyecto->id}}</td>
                                <td>{{$proyecto->year}}</td>
                                <td>{{$proyecto->name}}</td>
                                <td>{{$proyecto->begin}}</td>
                                <td>{{$proyecto->end}}</td>
                                <td>{{$proyecto->estadoproyecto->name}}</td>
                                <td>{{$proyecto->user->name}}</td>
                                <td>
                                    <a href="{{route('admin.proyectos.show', $proyecto)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                    <a href="{{route('admin.proyectos.edit', $proyecto->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>
                                    <a href="{{route('admin.tareas.indexproyecto', $proyecto->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                                    <a href="{{route('admin.proyectos.charts', $proyecto->id)}}" class="btn btn-sm btn-primary" title="Graficos" target='_blank'><i class="fas fa-chart-bar"></i></a>
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
        $('#history').DataTable( {
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