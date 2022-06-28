{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Tareas')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.tareas.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Tareas - {{$proyecto->name}} ({{$proyecto->id}}) </h1>
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
            <table class="table table-striped" id="tareasbyproject"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Inicio</th>
                            <th>Fin</th>
                            <th>Estado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>

                    </tbody>
            </table>   
        </div>
    </div>
@endsection


@section('js')
    <script>

        $('#tareasbyproject').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{route('admin.tareas.gettaskbyproject')}}",
            "data": function ( d ) {
                d.proyecto = {{$proyecto->id}};
                // d.custom = $('#myInput').val();
                // etc
            }
        },
        "dataType": 'json',
        "columns" : [
            {
                data:'id',
                name:'id'
            },
            {
                data:'name',
                name:'name'
            },
            {
                data:'begin',
                name:'begin'
            },
            {
                data:'end',
                name:'end'
            },
            {
                data:'estadotarea.name',
                name:'estadotarea.name'
            },
            {
                data:'actions',
                name:'actions',
                searchable:false,
                orderable:false
            }
        ],
        "language": {
            // "lengthMenu": "Mostrando _MENU_ registros por página",
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
            //'pageLength',
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


