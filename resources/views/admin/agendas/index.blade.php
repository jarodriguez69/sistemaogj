@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Agenda')
@section('plugins.Datatables', true)




@section('content_header')
    <a href="{{route('admin.agendas.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Agenda OGJ</h1>
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
            <table class="table table-striped" id="agendas"> 
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Contacto</th>
                            <th>Descripción</th>
                            <th>Correo</th>
                            <th>Celular</th>
                            <th>Tel&eacute;fono</th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($agendas as $agenda)
                            <tr>
                                <td>{{$agenda->id}}</td>
                                <td>{{$agenda->name}}</td>
                                <td>{{$agenda->description}}</td>
                                <td>{{$agenda->email}}</td>
                                <td>{{$agenda->cellphone}}</td>
                                <td>{{$agenda->phone}}</td>
                                <td>
                                    <a href="https://api.whatsapp.com/send?phone=54{{$agenda->cellphone}}"  Target="_blank"  class="btn btn-sm btn-success" title="Enviar Whatsapp"><i class="fab fa-whatsapp"></i></a>  
                                    <a href="tel:+54{{$agenda->cellphone}}" class="btn btn-sm btn-primary" title="Enviar Whatsapp"><i class="fas fa-phone"></i></a>  
                                    <a href="{{route('admin.agendas.edit', $agenda->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  
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
        $('#agendas').DataTable( {
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


