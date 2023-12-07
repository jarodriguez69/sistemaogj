@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">   
@stop
@section('content_header')
    <h1>Tablero - Eje 4</h1>
@stop

@section('content')
    @csrf
    
        <div class="card">
            <h5 class="card-header d-flex">Datos Generales </h5>
            <div class="row">
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ffa600; text-align: center; float: none; font-size: 1.5rem;">Planes</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear4}} </br> Presentados: {{$proyectostotalbyyear4}} </br> No Presentados: 0</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #6f00ff; text-align: center; float: none; font-size: 1.5rem;">Mediciones</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear4}} </br> Con Medición: {{$proyectosconmedicion4}} </br> Sin Medición:{{$proyectostotalbyyear4 - $proyectosconmedicion4}}</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #0099ff;  text-align: center; float: none; font-size: 1.5rem;">Satisfacción</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectosconmedicion4}} </br> Satisfactorios: {{$proyectossatisfactorios4}} </br> No Satisfactorios:{{$proyectosnosatisfactorios4}}</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #047a4d;  text-align: center; float: none; font-size: 1.5rem;">Inf. Control</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$tareasinformescontroltotal}} </br> Presentados: {{$tareasinformescontrolterminada}} </br> No Presentados:{{$tareasinformescontroltotal}}</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #001aff;  text-align: center; float: none; font-size: 1.5rem;">Inf. Anual</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$tareasinformestotal}} </br> Presentados: {{$tareasinformesterminada}} </br> No Presentados:{{$tareasinformestotal-$tareasinformesterminada}}</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff4800;  text-align: center; float: none; font-size: 1.5rem;">Asistencias</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$tareasasistenciatotal}} </br> Terminadas: {{$tareasasistenciaterminada}} </br> No Terminadas:{{$tareasasistenciatotal-$tareasasistenciaterminada}}</p>
                  </div>
            </div>
        </div>

        </div>

        <div class="card">
            <div class="row">
                <div class="col-md-4">
                    <div id="plan"></div>
                </div>
                <div class="col-md-4">
                    <div id="medidos"></div>
                </div>    
                <div class="col-md-4">
                    <div id="satisfaccion"></div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-4">
                    <div id="informe"></div>
                </div>
                <div class="col-md-4">
                    <div id="informecontrol"></div>
                </div>
                <div class="col-md-4">
                    <div id="asistencia"></div>
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
    
    
   
    var proyectosmedicion = <?php echo json_encode($proyectosmedicion)?>;
    var proyectosmedidos = <?php echo json_encode($proyectosmedidos)?>;
    var asistencias = <?php echo json_encode($asistencias)?>;
    var informes = <?php echo json_encode($informes)?>;
    var informescontrol = <?php echo json_encode($informescontrol)?>;
    var planes = <?php echo json_encode($planes)?>;



    Highcharts.chart('plan', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Planes de Mejora'
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
        data:  planes

    }]
});
    
Highcharts.chart('satisfaccion', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición Satisfactoria'
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
        data:  proyectosmedicion

    }]
});

Highcharts.chart('medidos', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Proyectos con Medición'
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
        data:      proyectosmedidos
    
    }]
});

Highcharts.chart('asistencia', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Asistencias Realizadas'
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
        data:  asistencias
    }]
});


   
Highcharts.chart('informe', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Informe Anual'
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
        data:  informes
    }]
});

Highcharts.chart('informecontrol', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Informe de Control'
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
        data:  informescontrol
    }]
});


</script>


@stop