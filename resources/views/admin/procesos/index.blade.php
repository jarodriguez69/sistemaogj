@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Procesos')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.procesos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Mapa de Procesos</h1>
@endsection

@section('content')

@if(session('info'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('info')}}</strong>
</div>
@endif

    <h5 style="text-align: center;">Procesos Estrat&eacute;gicos</h5>
    <div class="row">
        @foreach ($estrategicos as $estrategico)
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color:#7E7E7E; color:white">
                        <div class="inner">
                            <h3>{{$estrategico->description}}</h3>
                            <p>{{$estrategico->name}}</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        </div>
                        
                            <div style="background-color: rgba(0,0,0,.1); display: block; padding: 3px 0; text-decoration: none; z-index: 10; text-align:center">
                                @if((Auth::user()->hasRole('Admin')))
                                            <a href="{{route('admin.procesos.estrategico', $estrategico->id)}}" class="btn btn-sm {{$estrategico->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                            <a href="{{route('admin.procesos.clave', $estrategico->id)}}" class="btn btn-sm {{$estrategico->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                            <a href="{{route('admin.procesos.soporte', $estrategico->id)}}" class="btn btn-sm {{$estrategico->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                            <a href="{{route('admin.procesos.show', $estrategico)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.procesos.edit', $estrategico->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>
                                        @endif 
                                        <a href="{{route('admin.proyectos.indexproceso', $estrategico->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-cubes" target='_blank'></i></a>
                                        <a href="{{route('admin.tareas.indexproceso', $estrategico->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                                        <a href="javascript:chart({{$estrategico->id}},'{{$estrategico->name}}');" class="btn btn-sm btn-secondary" title="Graficos"><i class="fas fa-chart-bar"></i></a>

                            </div>
                        </div>
                </div>
            @endforeach
        
    </div>



    <h5 style="text-align: center;">Procesos Claves</h5>
    <div class="row">
        @foreach ($claves as $clave)
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color:#D54B4B; color:white">
                        <div class="inner">
                            <h3>{{$clave->description}}</h3>
                            <p>{{$clave->name}}</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        </div>
                        
                            <div style="background-color: rgba(0,0,0,.1); display: block; padding: 3px 0; text-decoration: none; z-index: 10; text-align:center">
                                @if((Auth::user()->hasRole('Admin')))
                                            <a href="{{route('admin.procesos.estrategico', $clave->id)}}" class="btn btn-sm {{$clave->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                            <a href="{{route('admin.procesos.clave', $clave->id)}}" class="btn btn-sm {{$clave->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                            <a href="{{route('admin.procesos.soporte', $clave->id)}}" class="btn btn-sm {{$clave->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                            <a href="{{route('admin.procesos.show', $clave)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.procesos.edit', $clave->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>
                                        @endif 
                                        <a href="{{route('admin.proyectos.indexproceso', $clave->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-cubes"></i></a>
                                        <a href="{{route('admin.tareas.indexproceso', $clave->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                                        <a href="javascript:chart({{$clave->id}},'{{$clave->name}}');" class="btn btn-sm btn-secondary" title="Graficos"><i class="fas fa-chart-bar"></i></a>
                            </div>
                        </div>
                </div>
            @endforeach
        
    </div>

    <h5 style="text-align: center;">Procesos de Soporte</h5>
    <div class="row">
        @foreach ($soportes as $soporte)
                <div class="col-lg-3 col-6">
                    <div class="small-box" style="background-color:#626262; color:white">
                        <div class="inner">
                            <h3>{{$soporte->description}}</h3>
                            <p>{{$soporte->name}}</p>
                        </div>
                        <div class="icon">
                            {{-- <i class="fas fa-arrow-circle-right"></i> --}}
                        </div>
                        
                            <div style="background-color: rgba(0,0,0,.1); display: block; padding: 3px 0; text-decoration: none; z-index: 10; text-align:center">
                                @if((Auth::user()->hasRole('Admin')))
                                            <a href="{{route('admin.procesos.estrategico', $soporte->id)}}" class="btn btn-sm {{$soporte->estrategico==true ?  "btn-success":"btn-danger" }}" title="Estrategico">E</a> 
                                            <a href="{{route('admin.procesos.clave', $soporte->id)}}" class="btn btn-sm {{$soporte->clave==true ?  "btn-success":"btn-danger"}}" title="Clave">C</a> 
                                            <a href="{{route('admin.procesos.soporte', $soporte->id)}}" class="btn btn-sm {{$soporte->soporte==true ?  "btn-success":"btn-danger"}}" title="Soporte">S</a> 
                                            <a href="{{route('admin.procesos.show', $soporte)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.procesos.edit', $soporte->id)}}" class="btn btn-sm btn-info" title="Editar" target='_blank'><i class="fas fa-edit"></i></a>
                                        @endif 
                                        <a href="{{route('admin.proyectos.indexproceso', $soporte->id)}}" class="btn btn-sm btn-primary" title="Proyectos"><i class="fas fa-cubes"></i></a>
                                        <a href="{{route('admin.tareas.indexproceso', $soporte->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                                        <a href="javascript:chart({{$soporte->id}},'{{$soporte->name}}');" class="btn btn-sm btn-secondary" title="Graficos"><i class="fas fa-chart-bar"></i></a>

                            </div>
                        </div>
                </div>
            @endforeach
        
    </div>

    <div class="modal fade" id="modal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title"> Medici&oacute;n de Proyectos </h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                     <div id="container">
                            <div class="row">
                                <div class="col-sm-2">
                                    <div class="card-body">
                                        <h5 class="card-title" style="text-align: center; float: none; font-size: 2.1rem;" id="proymedibles"></h5>
                                        <p class="card-text" style="text-align: center;">Total Factibles Medici&oacute;n</p>
                                      </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #00acfc; text-align: center; float: none; font-size: 2.1rem;" id="proyconmed"></h5>
                                        <p class="card-text" style="text-align: center;">Total Con Medici&oacute;n</p>
                                      </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #5cd694;  text-align: center; float: none; font-size: 2.1rem;" id="proysati"></h5>
                                        <p class="card-text" style="text-align: center;">Total Satisfactorios</p>
                                      </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #ff4800;  text-align: center; float: none; font-size: 2.1rem;" id="proynosati"></h5>
                                        <p class="card-text" style="text-align: center;">Total No Satisfactorios</p>
                                      </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #ffa600;  text-align: center; float: none; font-size: 2.1rem;" id="porcproymedido"></h5>
                                        <p class="card-text" style="text-align: center;">% Proyectos Medidos</p> 
                                      </div>
                                </div>
                                <div class="col-sm-2">
                                    <div class="card-body">
                                        <h5 class="card-title" style="color: #047a4d;  text-align: center; float: none; font-size: 2.1rem;" id="porcproysati"></h5>
                                        <p class="card-text" style="text-align: center;">% Proyectos Satisfactorios</p> 
                                      </div>
                                </div>
                            
                            </div>         
                        </div>
                {{-- <div class="modal-footer"> 
                    <a id="btnproceso" href="#" class="btn btn-sm btn-dark">En Proceso</a>
                    <a id="btnterminados" href="#" class="btn btn-sm btn-dark">Terminados</a> 
                </div> --}}
                </div>
        </div>
    </div>

    
@endsection



@section('js')
    <script>
        $('#procesos').DataTable( {
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



    function chart(id, name)
    {
       
       
       
        
        //$("#container").html("");
        $.ajax({
            url: "{{route('admin.procesos.resumen')}}",
            datatype: 'json',
            data: {
                peid: id
            },
            success: function(data){

            $('#proymedibles').text(data[0].proymedibles);
            $('#proyconmed').text(data[0].proyconmed);
            $('#proysati').text(data[0].proysati);
            $('#proynosati').text(data[0].proynosati);
            $('#porcproymedido').text(data[0].porcproymedido+"%");
            $('#porcproysati').text(data[0].porcproysati+"%");


           

              
            $('#modal').modal('show'); // abrir
                

            }
        });




       
    }


    </script>
@stop


