@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">   
@stop
@section('content_header')
    <h1>Tablero</h1>
@stop

@section('content')
    @csrf

    <div class="row">
        <div class="col-sm-4">
            <div class="card text-white bg-primary mb-3" style="height: 14rem; max-width: 20rem; background: linear-gradient(135deg, #66b7ef 0%,#6283e5 100%) !important;">
                <div class="card-header">Cantidad de Proyectos por Estados</div>
                <div class="card-body">
                  {{-- <h5 class="card-title">Primary card title</h5> --}}
                  <p class="card-text" id="resumenproyectos"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-info mb-3" style="height: 14rem; max-width: 20rem; background: linear-gradient(135deg, #a74be5 0%,#7035d6 100%) !important;">
                <div class="card-header">Cantidad de Tareas por Estados</div>
                <div class="card-body">
                  {{-- <h5 class="card-title">Info card title</h5> --}}
                  <p class="card-text" id="resumentareas"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-secondary mb-3" style="height: 14rem; max-width: 20rem; background: linear-gradient(135deg, #f61554 0%,#dd1390 100%) !important;">
                <div class="card-header">Alertas de Esta Semana</div>
                <div class="card-body">
                  {{-- <h5 class="card-title">Secondary card title</h5> --}}
                  <p class="card-text" id="resumenalertas"></p>
                </div>
              </div>
        </div>
      </div>


    <div class="card">
        <h5 class="card-header d-flex">Visi&oacute;n General Proyectos <a href="{{route('admin.proyectos.index')}}" class="btn btn-primary btn-sm ml-auto">Ver Todos</a></h5>
        <div class="row">
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style=" text-align: center; float: none; font-size: 2.1rem;" id="proyectostotal"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #5cd694; text-align: center; float: none; font-size: 2.1rem;" id="proyectoscompletos"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos Completados</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff9100; text-align: center; float: none; font-size: 2.1rem;" id="proyectospendientes"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos Pendientes</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00aeff; text-align: center; float: none; font-size: 2.1rem;" id="proyectosmedicion"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos con Medici&oacute;n</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
        </div>

    </div>

        
    <div class="card">
        <h5 class="card-header d-flex">Visi&oacute;n General Tareas <a href="{{route('admin.tareas.index')}}" class="btn btn-primary btn-sm ml-auto">Ver Todos</a></h5>
        <div class="row">
            <div class="col-sm-4">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; float: none; font-size: 2.1rem;" id="tareastotal"></h5>
                    <p class="card-text" style="text-align: center;">Tareas</p>
                    {{-- <a href="#" class="btn btn-primary"></a> --}}
                  </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <h5 class="card-title" style="color: #5cd694; text-align: center; float: none; font-size: 2.1rem;" id="tareascompletas"></h5>
                    <p class="card-text" style="text-align: center;">Tareas Completadas</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-4">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff9100;  text-align: center; float: none; font-size: 2.1rem;" id="tareaspendientes"></h5>
                    <p class="card-text" style="text-align: center;">Tareas Pendientes</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
        </div>

    </div>


    
    <div id="container2"></div>
    {{-- <div id="container3"></div> --}}
    <div id="container"></div>
    <div id="container4"></div>

    <h1>Proyectos Vencidos</h1>

    <div class="row">
        <div class="col-md-6">
            <div class="card">
                <div class="card-body">
                    <table class="table table-striped" id="proyectosvencidos"> 
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
                                @foreach ($proyectosvencidos as $proyectovencido)
                                    <tr>
                                        <td>{{$proyectovencido->id}}</td>
                                        <td>{{$proyectovencido->name}}</td>
                                        <td>{{$proyectovencido->description}}</td>
                                        <td>{{$proyectovencido->end}}</td>
                                        <td>
                                            <a href="{{route('admin.proyectos.show', $proyectovencido)}}" class="btn btn-sm btn-warning" title="Ver"><i class="fas fa-eye"></i></a> 
                                            <a href="{{route('admin.proyectos.edit', $proyectovencido->id)}}" class="btn btn-sm btn-info" title="Editar"><i class="fas fa-edit"></i></a>
                                            <a href="{{route('admin.tareas.indexproyecto', $proyectovencido->id)}}" class="btn btn-sm btn-dark" title="Tareas"><i class="fas fa-tasks"></i></a>
                                            <a href="{{route('admin.proyectos.charts', $proyectovencido->id)}}" class="btn btn-sm btn-primary" title="Graficos"><i class="fas fa-chart-bar"></i></a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                    </table>   
                </div>
            </div>
        </div>
        <div class="col-md-6">
            <div id="container5"></div>
        </div>
    </div>


    
    
@stop



@section('js')

    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
    <script type="text/javascript"> 
        $('#proyectosvencidos').DataTable( {
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



                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('admin.proyectos.getinfoproyectos') }}",
                    //dataType: "json",
                    // data: {_token:_token, email:email, pswd:pswd,address:address},
                    method: "POST",
                    success: function(data) {
                     
                        




                        $("#resumenproyectos").html("");
                        $("#resumenproyectos").append("En Proceso (Fase Planificación): " + data.procesos + "<br>" + 
                        "En proceso (Fase Control y Ejecución): " + data.procesoscontrol + "<br>" + 
                        "Terminados (Fase Cierre): " + data.terminados + "<br>" + 
                        "Acumulados: " + data.acumulados + "<br>" + 
                        "Suspendidos: " + data.suspendidos + "<br>" + 
                        "Actividades Posteriores Fin: " + data.actividadesposteriores);
                        
                        $("#proyectostotal").html("");
                        $("#proyectoscompletos").html("");
                        $("#proyectospendientes").html("");
                        $("#proyectosmedicion").html("");
                        
                        $("#proyectostotal").append(data.total);
                        $("#proyectoscompletos").append(data.terminados);
                        $("#proyectospendientes").append(data.procesos + data.procesoscontrol);
                        $("#proyectosmedicion").append(data.medicion);
                    },
                    error: function (data, textStatus, errorThrown) {
                        console.log(data);

                    }
                });

                $.ajax({
                    headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
                    url: "{{ route('admin.tareas.getinfotareas') }}",
                    //dataType: "json",
                    // data: {_token:_token, email:email, pswd:pswd,address:address},
                    method: "POST",
                    success: function(data) {

                        $("#resumentareas").html("");
                        $("#resumentareas").append(
                        "No Iniciadas: " + data.noiniciada + "<br>" + 
                        "En Proceso: " + data.procesos + "<br>" + 
                        "Completadas: " + data.terminados + "<br>" + 
                        "Revisadas: " + data.revisada + "<br>" + 
                        "Verificadas: " + data.verificada + "<br>" + 
                        "Validadas: " + data.validada);
                      

                        $("#tareastotal").html("");
                        $("#tareascompletas").html("");
                        $("#tareaspendientes").html("");
                        $("#tareastotal").append(data.total);
                        $("#tareascompletas").append(data.terminados);
                        $("#tareaspendientes").append(data.procesos);

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
    
    var proyectos =  <?php echo json_encode($proyectos) ?>;
    var proyectosiso =  <?php echo json_encode($proyectosiso) ?>;
    var proyectosporejeData = <?php echo json_encode($data)?>;
    var dataproyectosiso = <?php echo json_encode($dataproyectosiso)?>;
    var proyectosvencidoschart = <?php echo json_encode($proyectosvencidoschart)?>;

    Highcharts.chart('container', {
        title: {
            text: 'Nuevos Proyectos, 2022'
        },
        subtitle: {
            text: 'Oficina de Gestión Judicial'
        },
         xAxis: {
            categories: ['Ene', 'Feb', 'Mar', 'Abr', 'May', 'Jun', 'Jul', 'Ago', 'Sep', 'Oct', 'Nov', 'Dic']
        },
        yAxis: {
            title: {
                text: 'Cantidad de Proyectos Nuevos'
            }
        },
        legend: {
            layout: 'vertical',
            align: 'right',
            verticalAlign: 'middle'
        },
        plotOptions: {
            series: {
                allowPointSelect: true
            }
        },
        series: [{
            name: 'Proyectos Nuevos',
            data: proyectos
        }],
        responsive: {
            rules: [{
                condition: {
                    maxWidth: 500
                },
                chartOptions: {
                    legend: {
                        layout: 'horizontal',
                        align: 'center',
                        verticalAlign: 'bottom'
                    }
                }
            }]
        }
});




// -----------------------



Highcharts.chart('container2', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Porcentaje de Proyectos por Grupo'
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
        name: 'Brands',
        colorByPoint: true,
        data: proyectosporejeData
        //  [{
        //     name: 'Chrome',
        //     y: 61.41,
        //     sliced: true,
        //     selected: true
        // }, {
        //     name: 'Internet Explorer',
        //     y: 11.84
        // }, {
        //     name: 'Firefox',
        //     y: 10.85
        // }, {
        //     name: 'Edge',
        //     y: 4.67
        // }, {
        //     name: 'Safari',
        //     y: 4.18
        // }, {
        //     name: 'Sogou Explorer',
        //     y: 1.64
        // }, {
        //     name: 'Opera',
        //     y: 1.6
        // }, {
        //     name: 'QQ',
        //     y: 1.2
        // }, {
        //     name: 'Other',
        //     y: 2.61
        // }]
    }]
});


//-----------------------------------------------



Highcharts.chart('container3', {

chart: {
    type: 'column'
},

title: {
    text: 'Total fruit consumption, grouped by gender'
},

xAxis: {
    categories: ['Apples', 'Oranges', 'Pears', 'Grapes', 'Bananas']
},

yAxis: {
    allowDecimals: false,
    min: 0,
    title: {
        text: 'Number of fruits'
    }
},

tooltip: {
    formatter: function () {
        return '<b>' + this.x + '</b><br/>' +
            this.series.name + ': ' + this.y + '<br/>' +
            'Total: ' + this.point.stackTotal;
    }
},

plotOptions: {
    column: {
        stacking: 'normal'
    }
},

series: [{
    name: 'John',
    data: [5, 3, 4, 7, 2],
    stack: 'male'
}, {
    name: 'Joe',
    data: [3, 4, 4, 2, 5],
    stack: 'male'
}, {
    name: 'Jane',
    data: [2, 5, 6, 2, 1],
    stack: 'female'
}, {
    name: 'Janet',
    data: [3, 0, 4, 4, 3],
    stack: 'female'
}]
});



Highcharts.chart('container4', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cantidad de Tareas en Proceso'
    },
    subtitle: {
        text: 'Fuente: Sistema OGJ'
    },
    xAxis: {
        categories: proyectosiso,
        crosshair: true
    },
    yAxis: {
        min: 0,
        title: {
            text: 'Cantidad'
        }
    },
    tooltip: {
        headerFormat: '<span style="font-size:10px">{point.key}</span><table>',
        pointFormat: '<tr><td style="color:{series.color};padding:0">{series.name}: </td>' +
            '<td style="padding:0"><b>{point.y}</b></td></tr>',
        footerFormat: '</table>',
        shared: true,
        useHTML: true
    },
    plotOptions: {
        column: {
            pointPadding: 0.2,
            borderWidth: 0
        }
    },
    series: dataproyectosiso 
});



Highcharts.chart('container5', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Proyectos Vencidos y No Vencidos'
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
        data: proyectosvencidoschart
    }]
});


</script>


@stop