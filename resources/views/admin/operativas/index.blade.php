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
                            <td><a href="{{route('admin.operativas.show', $operativa)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-fw fa-eye"></i></a> 
                                <a href="{{route('admin.operativas.edit', $operativa->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-fw fa-edit"></i></a>  
                                <a href="{{route('admin.operativas.enabled', $operativa->id)}}" class="btn btn-sm {{$operativa->enabled==true ?  "btn-success" : "btn-success"}}" title="Finalizada"><i class="fas fa-fw fa-check"></i></a> 
                                <a href="{{route('admin.objetivos.indexoperativa', $operativa)}}" class="btn btn-sm btn-dark" title="Ver Objetivos"><i class="far fa-fw fa-circle text-cyan"></i></a>
                                <a href="javascript:chart({{$operativa->id}}, '{{$operativa->name}}');" class="btn btn-sm btn-primary" title="Graficos"><i class="far fa-fw fa-chart-bar"></i></a>
                            </td>

                            <!-- Modal -->
                            <div class="modal fade" id="modal{{$operativa->id}}" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h5 class="modal-title"> {{$operativa->name}} </h5>
                                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                        </button>
                                    </div>
                                    <div class="modal-body">
                                    <div id="container{{$operativa->id}}"></div>        
                                    </div>
                                    <div class="modal-footer"> 
                                        <a id="btnproceso" href="{{ url('admin/objetivos/0/'.$operativa->id . '/1/indexstatus') }}" class="btn btn-sm btn-dark">En Proceso</a>
                                        <a id="btnterminados" href="{{ url('admin/objetivos/0/'.$operativa->id . '/2/indexstatus') }}" class="btn btn-sm btn-dark">Terminados</a>
                                    </div>
                                </div>
                                </div>
                            </div>

                        </tr>
                    @endforeach
                    </tbody>

            </table>  
        </div>
    </div>
      
    
@endsection


@section('js')
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript"> 
        
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


    function chart(id, name)
    {
        
        $("#container"+id).html("");
        $.ajax({
            url: "{{route('admin.objetivos.searchObjetivesbyOperative')}}",
            datatype: 'json',
            data: {
                peid: id
            },
            success: function(data){


                Highcharts.chart('container'+id, {
                    chart: {
                        plotBackgroundColor: null,
                        plotBorderWidth: 0,
                        plotShadow: false
                    },
                    title: {
                        text: 'Objetivos<br>Operativos<br>por Estados<br>2022',
                        align: 'center',
                        verticalAlign: 'middle',
                        y: 60
                    },
                    tooltip: {
                        pointFormat: '{series.name}: <b>{point.percentage:.1f}%</b>'
                    },
                    accessibility: {
                        point: {
                            valueSuffix: '%'
                        }
                    },
                    plotOptions: {
                        pie: {
                            dataLabels: {
                                enabled: true,
                                distance: -50,
                                style: {
                                    fontWeight: 'bold',
                                    color: 'white'
                                }
                            },
                            startAngle: -90,
                            endAngle: 90,
                            center: ['50%', '75%'],
                            size: '110%'
                        }
                    },
                    series: [{
                        type: 'pie',
                        name: 'Porcentaje',
                        innerSize: '50%',
                        data: data
                    }]
                });

                $('#modal'+id).modal('show'); // abrir
                

            }
        });
  
    }


    </script>
@stop