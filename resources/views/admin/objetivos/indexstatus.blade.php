{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Objetivos')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.objetivos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Objetivos</h1>
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
                        <table id="objetivos" class="table table-striped"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Planificaci&oacute;n Operativa</th>
                            <th>Tipo</th>
                            <th>Avance</th>
                            <th>Meta</th>
                            <th>Estado</th>
                            <th>Responsable</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($objetivos as $objetivo)
                            <tr>
                                <td>{{$objetivo->id}}</td>
                                <td>{{$objetivo->name}}</td>
                                <td>{{$objetivo->operativas->name}}</td>
                                <td>{{$objetivo->tipoobjetivo->name}}</td>
                                <td>{{$objetivo->avance}}</td>
                                <td>{{strval($objetivo->meta) . ($objetivo->esporcentaje =='1' ? '%' : '')}}</td>
                                <td>{{$objetivo->estadoobjetivos->name}}</td>
                                <td>{{$objetivo->user->name}}</td>
                                <td>
                                    <a href="{{route('admin.objetivos.show', $objetivo)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-fw fa-eye"></i></a> 
                                    <a href="{{route('admin.objetivos.edit', $objetivo->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-fw fa-edit"></i></a>
                                    <a href="{{route('admin.actividades.indexobjetivo', $objetivo->id)}}" class="btn btn-sm btn-dark" title="Ver Actividades" target='_blank'><i class="far fa-fw fa-circle text-green"></i></a>
                                    <a href="{{route('admin.objetivos.charts', $objetivo->id)}}" class="btn btn-sm btn-primary" title="Graficos" target='_blank'><i class="fas fa-fw fa-chart-bar"></i></a>
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
        
        $('#objetivos').DataTable( {
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