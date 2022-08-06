@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">   
@stop

@section('content_header')
    <h1>Tablero - {{$objetivo->name}}</h1>
@stop

@section('content')
    @csrf
<div class="row">
    <div class="col-md-6"id="container1"></div>
    <div class="col-md-6" id="container2"></div>
</div>

    
<div id="container3"></div>

<h1>Actividades Vencidas</h1>

<div class="row">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-striped" id="tareasvencidas"> 
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripci&oacute;n</th>
                                <th>Fecha Vencimiento</th>
                                <th></th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($tareasvencidas as $tareavencida)
                                <tr>
                                    <td>{{$tareavencida->id}}</td>
                                    <td>{{$tareavencida->name}}</td>
                                    <td>{{$tareavencida->description}}</td>
                                    <td>{{$tareavencida->end}}</td>
                                    <td>
                                        <a href="{{route('admin.actividades.show', $tareavencida)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
                                        <a href="{{route('admin.actividades.edit', $tareavencida->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>  
                                        <a href="{{route('admin.actividades.destroy', $tareavencida->id)}}" class="btn btn-sm btn-danger" title="Eliminar"><i class="fas fa-trash-alt"></i></a>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                </table>   
            </div>
        </div>
    </div>
    
    <div class="col-md-6">
        <div id="container4"></div>
    </div>
</div>

<br>
    
    
@stop



@section('js')
<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">

$('#tareasvencidas').DataTable( {
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


    var completosincompletos = <?php echo json_encode($data)?>;
    var pasoporestados = <?php echo json_encode($pasoporestados)?>;
    var tareas = <?php echo json_encode($tareas)?>;
    var porcentajetareas = <?php echo json_encode($porcentajetareas)?>;
    var tareasvencidaschart = <?php echo json_encode($tareasvencidaschart)?>;

    Highcharts.chart('container1', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: 0,
        plotShadow: false
    },
    title: {
        text: 'Porcentaje<br>Actividades<br>Completadas',
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
        name: 'Porcentaje de Avance',
        innerSize: '50%',
        data: completosincompletos
    }]
});

// ------------------------------------------------

Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Porcentaje de Actividades por Estado'
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
        data: pasoporestados
         
    }]
});

// ----------------------------------------

Highcharts.chart('container3', {
    chart: {
        type: 'bar'
    },
    title: {
        text: 'Avance de Actividades'
    },
    subtitle: {
        text: ''
    },
    xAxis: {
        categories: tareas,
        title: {
            text: null
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Porcentaje',
            align: 'high'
        },
        labels: {
            overflow: 'justify'
        }
    },
    tooltip: {
        valueSuffix: ' %'
    },
    plotOptions: {
        bar: {
            dataLabels: {
                enabled: true
            }
        }
    },
    legend: {
        layout: 'vertical',
        align: 'right',
        verticalAlign: 'top',
        x: -40,
        y: 80,
        floating: true,
        borderWidth: 1,
        backgroundColor:
            Highcharts.defaultOptions.legend.backgroundColor || '#FFFFFF',
        shadow: true
    },
    credits: {
        enabled: false
    },
    series: porcentajetareas
});



Highcharts.chart('container4', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Actividades Vencidas y No Vencidas'
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
        data: tareasvencidaschart
    }]
});

</script>


@stop
