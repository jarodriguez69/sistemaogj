@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">   
@stop
@section('content_header')
    <h1>Tablero - Eje 3</h1>
@stop

@section('content')
    @csrf

    
    
    <div class="card">
        <h5 class="card-header d-flex">Avance Institucional ISO 9001:2015  </h5>

        <div class="row">
            <div class="col-md-4">
                <div id="barrajuri"></div>
            </div>
            <div class="col-md-4">
                <div id="barranojuri"></div>
            </div>
            <div class="col-md-4">
                <div id="barratotal"></div>
            </div>
        </div>
        
        <div class="row">
            <div class="col-md-4">
                <div id="tortajuri"></div>
            </div>
            <div class="col-md-4">
                <div id="tortanojuri"></div>
            </div>
            <div class="col-md-4">
                <div id="tortatotal"></div>
            </div>
        </div>

    </div>


    
@stop



@section('js')

    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript"> 
     
   

        $(document).ready(function() {

           

            $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('admin.alertas.getinfoalerts') }}",
                    //dataType: "json",
                    // data: {_token:_token, email:email, pswd:pswd,address:address},
                    method: "POST",
                    success: function(data) {
                     
                        
                        $("#resumenalertas").html("");
                        $("#resumenalertas").append( data.alertas);

                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(data);

                    }
                });



                
        });

    </script>

<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/variable-pie.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>

<script type="text/javascript">
    
    
    var isotortajuri = <?php echo json_encode($tortajuri)?>;
    var isotortanojuri = <?php echo json_encode($tortanojuri)?>;
    var isotortatotal = <?php echo json_encode($tortatotal)?>;
    var isobarraañojuri = <?php echo json_encode($añosjuri)?>;
    var isobarranoañojuri = <?php echo json_encode($añosnojuri)?>;
    var isobarraañototal = <?php echo json_encode($añostotal)?>;
    var isobarrajuri = <?php echo json_encode($cantidadjuri)?>;
    var isobarranojuri = <?php echo json_encode($cantidadnojuri)?>;
    var isobarratotal = <?php echo json_encode($cantidadtotal)?>;



    
Highcharts.chart('tortajuri', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Unidades Jurisdiccionales'
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
        data:  isotortajuri

    }]
});

Highcharts.chart('tortanojuri', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Unidades No Jurisdiccionales'
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
        data:      isotortanojuri
    
    }]
});

Highcharts.chart('tortatotal', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Totalizador'
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
        data:  isotortatotal
    }]
});


    


Highcharts.chart('barrajuri', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Unidades Jurisdiccionales Certificadas por año',
        align: 'left'
    },
    xAxis: {
        categories: isobarraañojuri,
        crosshair: true,
        accessibility: {
            description: 'Años'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: isobarrajuri
});


Highcharts.chart('barranojuri', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Unidades No Jurisdiccionales Certificadas por año',
        align: 'left'
    },
    xAxis: {
        categories: isobarranoañojuri,
        crosshair: true,
        accessibility: {
            description: 'Años'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series:isobarranojuri
});


    
    
    

Highcharts.chart('barratotal', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Total Unidades Certificadas por año',
        align: 'left'
    },
    xAxis: {
        categories: isobarraañototal,
        crosshair: true,
        accessibility: {
            description: 'Años'
        }
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad'
        }
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: isobarratotal
});





</script>


@stop