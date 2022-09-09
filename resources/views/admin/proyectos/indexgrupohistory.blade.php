{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Histórico de Proyectos')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.proyectos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Hist&oacute;rico de Proyectos en el Grupo: {{$grupo->name}}</h1>
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
            <table class="table table-striped" id="proyectos"> 
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nombre</th>
                        <th>POA</th>
                        <th>Fecha Inicio</th>
                        <th>Fecha Fin</th>
                        <th>Estado</th>
                        <th>Responsable</th>
                        <th></th>
                    </tr>
                </thead>
               
        </table>   
        </div>
    </div>
@endsection


@section('js')
    <script>
        
        $('#proyectos').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{route('admin.proyectos.getprojectbygrouphistory')}}",
            "data": function ( d ) {
                d.grupo = {{$grupo->id}};
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
                data: "poa",
                name: "poa"
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
                data:'estadoproyecto.name',
                name:'estadoproyecto.name'
            },
            {
                data:'user.name',
                name:'user.name'
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


