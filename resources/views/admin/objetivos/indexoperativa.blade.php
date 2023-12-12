{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Objetivos')
@section('plugins.Datatables', true)

@section('content_header')
    <a href="{{route('admin.objetivos.create')}}" class="btn btn-secondary float-right">Nuevo</a>
    <h1>Objetivos en la Planificaci&oacute;n Operativa: {{$operativa->name}}</h1>
@endsection

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('info')}}</strong>
</div>
@endif
    
<div class="card">
        <h5 class="card-header d-flex">Visi&oacute;n General Objetivos </h5>
        <div class="row">
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #7a5cd6; text-align: center; float: none; font-size: 2.1rem;" id="objetivostotal">{{$estrategicosproceso + $estrategicosterminado + $operativosproceso + $operativosterminado + $calidadproceso + $calidadterminado + $estrategicosexcluido + $operativosexcluido + $calidadexcluido}}</h5>
                    <p class="card-text" style="text-align: center; font-weight: bold;">Total</p>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #5cd694; text-align: center; float: none; font-size: 2.1rem;" id="objetivosestrategicos">{{$estrategicosproceso + $estrategicosterminado + $estrategicosexcluido}}</h5>
                    <p class="card-text" style="text-align: center; font-weight: bold;">Estrat&eacute;gicos</p>
                    <p class="card-text" style="text-align: center;">En Proceso: {{$estrategicosproceso}} </br> Terminados: {{$estrategicosterminado}} </br> Excluidos: {{$estrategicosexcluido}}</p>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff9100; text-align: center; float: none; font-size: 2.1rem;" id="objetivosoperativos">{{$operativosproceso + $operativosterminado + $operativosexcluido}}</h5>
                    <p class="card-text" style="text-align: center; font-weight: bold;">Operativos</p>
                    <p class="card-text" style="text-align: center;">En Proceso: {{$operativosproceso}} </br> Terminados: {{$operativosterminado}} </br> Excluidos: {{$operativosexcluido}}</p>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00aeff; text-align: center; float: none; font-size: 2.1rem;" id="objetivoscalidad">{{$calidadproceso + $calidadterminado + $calidadexcluido}}</h5>
                    <p class="card-text" style="text-align: center; font-weight: bold;">De Calidad</p>
                    <p class="card-text" style="text-align: center;">En Proceso: {{$calidadproceso}} </br> Terminados: {{$calidadterminado}} </br> Excluidos: {{$calidadexcluido}}</p>
                  </div>
            </div>
        </div>
        <div class="row">
                <div class="col-md-4">
                    <div id="estrategico"></div>
                </div>    
                <div class="col-md-4">
                    <div id="operativo"></div>
                </div>
                <div class="col-md-4">
                    <div id="calidad"></div>
                </div>
        </div>
    </div>
    
    <div class="card">
        <div class="card-body">
            <table class="table table-striped" id="objetivosporoperativa"> 
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
                   
            </table>   
        </div>
    </div>
@endsection


@section('js')
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script type="text/javascript">
        var operativos = <?php echo json_encode($chartoperativos)?>;
        var estrategicos = <?php echo json_encode($chartestrategicos)?>;
        var calidad = <?php echo json_encode($chartcalidad)?>;
        
        $('#objetivosporoperativa').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax": {
            "url": "{{route('admin.objetivos.getprojectbygroup')}}",
            "data": function ( d ) {
                d.operativa = {{$operativa->id}};
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
                data:'operativas.name',
                name:'operativas.name'
            },
            {
                 data:'tipoobjetivo.name',
                 name:'tipoobjetivo.name'
            },
            {
                data:'avance',
                name:'avance'
            },
            {
                data: "meta",
                render: function ( data, type, row ) {
                        // esto es lo que se va a renderizar como html
                        tValor = row.meta + (row.esporcentaje =='1' ? '%' : '');
                        return tValor; 
                }
            },
            {
                data:'estadoobjetivos.name',
                name:'estadoobjetivos.name',
            },
            {
                data:'user.name',
                name:'user.name',
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

    Highcharts.chart('calidad', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'De Calidad'
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
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data:  calidad

        }]
    });



    Highcharts.chart('estrategico', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Estratégicos'
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
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data:  estrategicos

        }]
    });


    Highcharts.chart('operativo', {
        chart: {
            plotBackgroundColor: null,
            plotBorderWidth: null,
            plotShadow: false,
            type: 'pie'
        },
        title: {
            text: 'Operativos'
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
                allowPointSelect: true,
                cursor: 'pointer',
                dataLabels: {
                    enabled: true,
                    format: '<b>{point.name}</b>: {point.percentage:.1f} %'
                }
            }
        },
        series: [{
            name: 'Porcentaje',
            colorByPoint: true,
            data:  operativos

        }]
    });

</script>
@stop


