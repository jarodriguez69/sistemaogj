@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Indicadores')
@section('plugins.Datatables', true)




@section('content_header')
    <a href="{{route('admin.indicadores.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Indicadores</h1>
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
            <table class="table table-striped" id="indicadores"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Mes</th>
                            <th>Proyectos en Proceso</th>
                            <th>Proyectos Suspendidos</th>
                            <th>Proyectos Acumulados</th>
                            <th>Proyectos Terminados</th>
                            <th>Proyectos con Medici&oacute;n</th>
                            <th>Proyectos con Medici&oacute;n Satisfactoria</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($indicadores as $indicador)
                            <tr>
                                <td>{{$indicador->id}}</td>
                                <td>{{$indicador->name}}</td>
                                <td>{{$indicador->proyectos_procesos}}</td>
                                <td>{{$indicador->proyectos_suspendidos}}</td>
                                <td>{{$indicador->proyectos_acumulados}}</td>
                                <td>{{$indicador->proyectos_terminados}}</td>
                                <td>{{$indicador->proyectos_con_medicion}}</td>
                                <td>{{$indicador->proyectos_satisfactorio}}</td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>   
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#indicadores').DataTable( {
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


