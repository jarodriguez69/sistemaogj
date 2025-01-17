@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Novedades')
@section('plugins.Datatables', true)




@section('content_header')
    <a href="{{route('admin.blogs.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Novedades</h1>
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
            <table class="table table-striped" id="blogs"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>T&iacute;tulo</th>
                            <th>Descripción</th>
                            <th>Habilitado</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($blogs as $blog)
                            <tr>
                                <td>{{$blog->id}}</td>
                                <td>{{$blog->name}}</td>
                                <td>{{$blog->description}}</td>
                                <td>{{$blog->enabled==true?"SI":"NO"}}</td>
                                <td><a href="{{route('admin.blogs.show', $blog)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
                                    <a href="{{route('admin.blogs.edit', $blog->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  
                                    <a href="{{route('admin.blogs.enabled', $blog->id)}}" class="btn btn-sm {{$blog->enabled==true ?  "btn-danger" : "btn-success"}}" title="Habilitar/Deshabilitar"><i class="fas fa-recycle"></i></a></td>
                            </tr>
                        @endforeach
                    </tbody>
            </table>   
        </div>
    </div>
@endsection


@section('js')
    <script>
        $('#blogs').DataTable( {
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


