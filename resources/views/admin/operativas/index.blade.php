{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Planificaciones Operativas')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.operativas.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Planificaciones Operativas</h1>
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
                        <table id="operativas" class="table table-striped"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Planificaci&oacute;n Estrat&eacute;gica</th>
                            <th>Finalizada</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($operativas as $operativa)
                        <tr>
                            <td>{{$operativa->id}}</td>
                            <td>{{$operativa->name}}</td>
                            <td>{{$operativa->estrategicas->name}}</td>
                            <td>{{$operativa->enabled==true?"SI":"NO"}}</td>
                            <td><a href="{{route('admin.operativas.show', $operativa)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
                                <a href="{{route('admin.operativas.edit', $operativa->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  
                                <a href="{{route('admin.operativas.enabled', $operativa->id)}}" class="btn btn-sm {{$operativa->enabled==true ?  "btn-success" : "btn-success"}}" title="Finalizada"><i class="fas fa-check"></i></a> 
                                <a href="{{route('admin.objetivos.indexoperativa', $operativa)}}" class="btn btn-sm btn-dark" title="Ver Objetivos"><i class="far fa-fw fa-circle text-cyan"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>

            </table>  
        </div>
    </div>
@endsection


@section('js')
    <script>
        
        $('#operativas').DataTable( {
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