@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Roles')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.roles.create')}}" class="btn btn-secondary btn-sm float-right">Nuevo</a>
    <h1>Roles</h1>
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
            <table id="roles" class="table table-striped"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($roles as $role)
                            <tr>
                                <td>{{$role->id}}</td>
                                <td>{{$role->name}}</td>
                                <td><a href="{{route('admin.roles.edit', $role)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  {{--<a href="{{route('admin.roles.enabled', $role->id)}}" class="btn btn-sm btn-danger">{{$role->enabled==true?"Deshabilitar":"Habilitar"}}</a>--}}</td> 
                                <td>
                                    <form action="{{route('admin.roles.destroy', $role)}}" method="POST">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></button>
                                    </form>
                                    
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
    $('#roles').DataTable( {
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


