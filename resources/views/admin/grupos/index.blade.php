{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Programas')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.grupos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Programas</h1>
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
                        <table id="grupos" class="table table-striped"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Eje</th>
                            <th>Habilitado</th>
                            <th>Responsables</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($grupos as $grupo)
                        <tr>
                            <td>{{$grupo->id}}</td>
                            <td>{{$grupo->name}}</td>
                            <td>{{$grupo->ejes->name}}</td>
                            <td>{{$grupo->enabled==true?"SI":"NO"}}</td>
                            <td>
                                @foreach ($grupo->users as $user)
                                    {{$user->name}} 
                                @endforeach
                            </td>
                            <td><a href="{{route('admin.grupos.show', $grupo)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                <a href="{{route('admin.grupos.edit', $grupo->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>  
                                <a href="{{route('admin.grupos.enabled', $grupo->id)}}" class="btn btn-sm {{$grupo->enabled==true ?  "btn-danger" : "btn-success"}}" title="Habilitar/Deshabilitar"><i class="fas fa-recycle"></i></a> 
                                <a href="{{route('admin.proyectos.indexgrupo', $grupo)}}" class="btn btn-sm btn-dark" title="Ver Proyectos" target='_blank'><i class="fas fa-fw fa-cubes"></i></a>
                                <a href="{{route('admin.proyectos.indexgrupohistory', $grupo)}}" class="btn btn-sm btn-secondary" title="Ver Historico de Proyectos" target='_blank'><i class="fas fa-fw fa-history"></i></a></td>
                        </tr>
                    @endforeach
                    </tbody>

            </table>  
        </div>
    </div>
@endsection


@section('js')
    <script>
        
        $('#grupos').DataTable( {
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
        order: [[3, 'desc']],
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