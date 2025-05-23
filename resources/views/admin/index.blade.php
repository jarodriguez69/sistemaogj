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
                  <p class="card-text" id="resumenproyectos" style="margin-top: -15px !important"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-info mb-3" style="height: 14rem; max-width: 20rem; background: linear-gradient(135deg, #a74be5 0%,#7035d6 100%) !important;">
                <div class="card-header">Cantidad de Tareas por Estados</div>
                <div class="card-body">
                  {{-- <h5 class="card-title">Info card title</h5> --}}
                  <p class="card-text" id="resumentareas" style="margin-top: -15px !important"></p>
                </div>
            </div>
        </div>
        <div class="col-sm-4">
            <div class="card text-white bg-secondary mb-3" style="height: 14rem; max-width: 20rem; background: linear-gradient(135deg, #f61554 0%,#dd1390 100%) !important;">
                <div class="card-header">Alertas de Esta Semana</div>
                <div class="card-body">
                  {{-- <h5 class="card-title">Secondary card title</h5> --}}
                  <p class="card-text" id="resumenalertas" style="margin-top: -15px !important"></p>
                </div>
              </div>
        </div>
      </div>

      {{-- <div class="card">
        <h5 class="card-header d-flex">Visi&oacute;n General Indicadores 
            <div class="row ml-auto">
                <div class="col">
                    <input type="date" class="form-control" placeholder="Fecha Desde" id="begindate">
                </div>
                <div class="col">
                    <input type="date" class="form-control" placeholder="Fecha Hasta" id="enddate">
                </div>
                <a href="javascript:filtrar();" class="btn btn-primary btn-sm">Filtrar</a>
            </div>
        </h5>
                
        <div class="row">
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; float: none; font-size: 2.1rem;" id="indicadorproceso">0</h5>
                    <p class="card-text" style="text-align: center;">Proyectos en Proceso</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #5cd694; text-align: center; float: none; font-size: 2.1rem;" id="indicadorsuspendido">0</h5>
                    <p class="card-text" style="text-align: center;">Proyectos Suspendidos</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff9100;  text-align: center; float: none; font-size: 2.1rem;" id="indicadoracumulado">0</h5>
                    <p class="card-text" style="text-align: center;">Proyectos Acumulados</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff002f;  text-align: center; float: none; font-size: 2.1rem;" id="indicadorterminado">0</h5>
                    <p class="card-text" style="text-align: center;">Proyectos Terminados</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff00bc;  text-align: center; float: none; font-size: 2.1rem;" id="indicadormedicion">0</h5>
                    <p class="card-text" style="text-align: center;">Proyectos con Medici&oacute;n</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #1000ff;  text-align: center; float: none; font-size: 2.1rem;" id="indicadorsatisfactorio">0</h5>
                    <p class="card-text" style="text-align: center;">Proyectos con Medici&oacute;n Satisfactoria</p>
                  </div>
            </div>
        </div>

    </div> --}}
    
    <div class="card">
        <h5 class="card-header d-flex">Visi&oacute;n General Proyectos <a href="{{route('admin.proyectos.index')}}" class="btn btn-primary btn-sm ml-auto">Ver Todos</a></h5>
        <div class="row">
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style=" text-align: center; float: none; font-size: 2.1rem;" id="proyectostotal"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos Iniciados</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #5cd694; text-align: center; float: none; font-size: 2.1rem;" id="proyectoscompletos"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos Terminados</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff9100; text-align: center; float: none; font-size: 2.1rem;" id="proyectospendientes"></h5>
                    <p class="card-text" style="text-align: center;">Proyectos En Proceso</p>
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

        <div class="row">
                <div class="card-body">
                    <label for="historico">Historico</label>
                    <select id="historico" class="form-control" name="historico">
                        <option value="#">(Seleccione Año)</option>
                        <option value="{{route('admin.historicos.index', 2024)}}">2024</option>
                        <option value="{{route('admin.historicos.index', 2023)}}">2023</option>
                        <option value="{{route('admin.historicos.index', 2022)}}">2022</option>
                        <option value="{{route('admin.historicos.index', 2021)}}">2021</option>
                    </select>
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

    


    <div class="card">
        <h5 class="card-header d-flex">Gr&aacute;ficos</h5>
        <div id="container2"></div>
        {{-- <div id="container3"></div> --}}
        <div id="container"></div>
        <div id="container4"></div>
    </div>
    

    <div class="card">
        <h5 class="card-header d-flex">Medici&oacute;n de Proyectos 
        
            {{-- <div class="dropdown ml-auto">
                <select class="form-control btn btn-primary btn-sm" name="procesos" id="procesoid">
                    <option value="0">Todos</option>
                    @foreach ($procesos as $proceso)
                        <option value="{{$proceso->id}}">{{$proceso->name}}</option>
                    @endforeach
                    
                </select> 
            </div> --}}
            
            </h5>
        <div class="row">
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="text-align: center; float: none; font-size: 2.1rem;" id="proymedibles">{{$proyectostotalbyyear}}</h5>
                    <p class="card-text" style="text-align: center;">Total Factibles Medici&oacute;n</p>
                    {{-- <a href="#" class="btn btn-primary"></a> --}}
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #00acfc; text-align: center; float: none; font-size: 2.1rem;" id="proyconmed">{{$proyectosconmedicion->count()}}</h5>
                    <p class="card-text" style="text-align: center;">Total Con Medici&oacute;n</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #5cd694;  text-align: center; float: none; font-size: 2.1rem;" id="proysati">{{$proyectossatisfactorios}}</h5>
                    <p class="card-text" style="text-align: center;">Total Satisfactorios</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff4800;  text-align: center; float: none; font-size: 2.1rem;" id="proynosati">{{$proyectosnosatisfactorios}}</h5>
                    <p class="card-text" style="text-align: center;">Total No Satisfactorios</p>
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ffa600;  text-align: center; float: none; font-size: 2.1rem;" id="porcproymedido">{{$proyectostotalbyyear == 0 ? round(($proyectosconmedicion->count()*100),2) : round(($proyectosconmedicion->count()*100)/$proyectostotalbyyear,2)}}%</h5>
                    <p class="card-text" style="text-align: center;">% Proyectos Medidos</p> 
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #047a4d;  text-align: center; float: none; font-size: 2.1rem;" id="porcproysati">{{round($porcentajesatisfactorio,2)}}%</h5>
                    <p class="card-text" style="text-align: center;">% Proyectos Satisfactorios</p> 
                    {{-- <a href="#" class="btn btn-primary">Ver Todos</a> --}}
                  </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped" id="proyectosvencidos"> 
                                <thead>
                                    <tr>
                                        <th>ID</th>
                                        <th>Nombre</th>
                                        <th>Eje</th>
                                        <th>Grupo</th>
                                        <th>Medición</th>
                                        {{-- <th>Porcentaje</th> --}}
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="tbodyporproceso">
                                    @foreach ($proyectosconmedicion as $proyecto)
                                        <tr>
                                            <td>{{$proyecto->id}}</td>
                                            <td>{{$proyecto->name}}</td>
                                            <td>{{$proyecto->grupos->ejes->name}}</td>
                                            <td>{{$proyecto->grupos->name}}</td>
                                            <td>{{$proyecto->satisfactorio ? "Satisfactorio" : "No Satisfactorio"}}</td>
                                            {{-- <td>{{$proyecto->satisfactorio ? round(100/$proyectossatisfactorios) . "%" : round(100/$proyectosnosatisfactorios) . "%"}}</td> --}}
                                            <td>
                                                <a href="{{route('admin.proyectos.show', $proyecto)}}" class="btn btn-sm btn-warning" title="Ver" target='_blank'><i class="fas fa-eye"></i></a> 
                                                <a href="{{route('admin.tareas.indexproyecto', $proyecto->id)}}" class="btn btn-sm btn-dark" title="Tareas" target='_blank'><i class="fas fa-tasks"></i></a>
                                                <a href="{{route('admin.proyectos.charts', $proyecto->id)}}" class="btn btn-sm btn-primary" title="Graficos" target='_blank'><i class="fas fa-chart-bar"></i></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                        </table>   
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ffa600; text-align: center; float: none; font-size: 2.1rem;">Eje 1</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear1}} </br> Con Medición: {{$proyectosconmedicion1->count()}} </br> Sin Medición:{{$proyectossinmedicion1}}</p>
                    
                    
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #6f00ff; text-align: center; float: none; font-size: 2.1rem;">Eje 2</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear2}} </br> Con Medición: {{$proyectosconmedicion2->count()}} </br> Sin Medición:{{$proyectossinmedicion2}}</p>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #0099ff;  text-align: center; float: none; font-size: 2.1rem;">Eje 3</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear3}} </br> Con Medición: {{$proyectosconmedicion3->count()}} </br> Sin Medición:{{$proyectossinmedicion3}}</p>
                  </div>
            </div>
            <div class="col-sm-3">
                <div class="card-body">
                    <h5 class="card-title" style="color: #047a4d;  text-align: center; float: none; font-size: 2.1rem;">Eje 4</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear4}} </br> Con Medición: {{$proyectosconmedicion4->count()}} </br> Sin Medición:{{$proyectossinmedicion4}}</p>
                  </div>
            </div>
            <!-- <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #001aff;  text-align: center; float: none; font-size: 2.1rem;">Eje 5</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear5}} </br> Con Medición: {{$proyectosconmedicion5->count()}} </br> Sin Medición:{{$proyectossinmedicion5}}</p>
                  </div>
            </div>
            <div class="col-sm-2">
                <div class="card-body">
                    <h5 class="card-title" style="color: #ff4800;  text-align: center; float: none; font-size: 2.1rem;">Eje 6</h5>
                    <p class="card-text" style="text-align: center;">Total: {{$proyectostotalbyyear6}} </br> Con Medición: {{$proyectosconmedicion6->count()}} </br> Sin Medición:{{$proyectossinmedicion6}}</p>
                  </div>
            </div> -->
        </div>

        <div class="row">
            <div class="col-md-4">
                <div id="container5"></div>
            </div>
            <div class="col-md-4">
                <div id="container6"></div>
            </div>
            <div class="col-md-4">
                <div id="container7"></div>
            </div>
        </div>

        
        <div class="row">
            <div class="col-md-4">
                <div id="container8"></div>
            </div>
            <!-- <div class="col-md-4">
                <div id="container9"></div>
            </div>
            <div class="col-md-4">
                <div id="container10"></div>
            </div> -->
        </div>

    </div>

    <div class="card">
        <h5 class="card-header d-flex">Historico de Proyectos por Estado</h5>
        <div id="proyectosh"></div>
        
    </div>

    <div class="card">
        <h5 class="card-header d-flex">Historico Cumplimiento Objetivos</h5>
        <div id="objetivosh">
            
        </div>
        <p class="card-header d-flex" aria-hidden="true">
            Nota: Los números enteros representan cantidad. Los números decimales representan porcentajes. Por razones de escala en el grafico, los porcentajes se representan con valores entre el 0 y el 0.99. El valor  de 0.99 implica un cumplimiento del 100%. 
        </p>
        <div class="row">
            <div class="col-md-12">
                <div class="card">
                    <div class="card-body">
                    <table class="table">
                        <thead class="thead-dark">
                            <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                           
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <th scope="row">O.E. 1.1</th>
                                <td>OBJETIVO ESTRATÉGICO 1.1 Consolidar la reforma del Código Procesal Civil y Comercial a través del diseño y coordinación de la ejecución de planes de acción</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 1.2</th>
                                <td>OBJETIVO ESTRATÉGICO 1.2 Promover una mayor inmediación, oralidad, celeridad y digitalización en los procesos judiciales a través de propuestas de reformas normativas.</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 2.1</th>
                                <td>OBJETIVO ESTRATÉGICO 2.1 Promover el desarrollo del expediente digital administrativo a través de su implementación en la totalidad de las Unidades no Jurisdiccionales del PJT</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 2.2</th>
                                <td>OBJETIVO ESTRATÉGICO 2.2 Avanzar con la conformación del Expediente Digital mediante la implementación del SAE en las unidades pertenecientes a la Justicia de Paz</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 2.3</th>
                                <td>OBJETIVO ESTRATÉGICO 2.3 Promover acciones que permitan consolidar el vínculo con organismos externos a través del intercambio de herramientas tecnológicas </td>
                            </tr>

                            <tr>
                                <th scope="row">O.E. 2.4</th>
                                <td>OBJETIVO ESTRATÉGICO 2.4 Gestionar un servicio de internet adecuado a las necesidades laborales de todos los integrantes de OGJ</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 3.1</th>
                                <td>OBJETIVO ESTRATÉGICO 3.1 Acompañar en la implementación de los requisitos de la 
Norma ISO 9001:2015 a las unidades judiciales del PJT</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 3.2</th>
                                <td>OBJETIVO ESTRATÉGICO 3.2 Alcanzar los Objetivos de Calidad de la OGJ</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 4.1</th>
                                <td>OBJETIVO ESTRATÉGICO 4.1 Proponer Planes de Mejora por Procesos del fuero penal</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 4.2</th>
                                <td>OBJETIVO ESTRATÉGICO 4.2 Proponer Planes de Mejora por Procesos del fuero no penal</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 4.3</th>
                                <td>OBJETIVO ESTRATÉGICO 4.3 Identificar buenas prácticas de disminución de retrasos en procesos claves</td>
                            </tr>

                            <tr>
                                <th scope="row">O.E. 4.4</th>
                                <td>OBJETIVO ESTRATÉGICO 4.4 impulsar el análisis de la información reflejada en los tableros de control, con la valoración e identificación de información prioritaria sobre el comportamiento y desempeño de las unidades jurisdiccionales y no jurisdiccionales</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 5.1</th>
                                <td>OBJETIVO ESTRATÉGICO 5.1 Promover el uso responsable de los recursos mediante la presentación de proyectos para la reducción, reutilización y reciclado de residuos generados por el P.J.</td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 6.1</th>
                                <td>OBJETIVO ESTRATÉGICO 6.1: Fomentar la interacción de la OGJ con otras oficinas del PJT mediante la presentación de proyectos en conjunto para mejorar el servicio de justicia. </td>
                            </tr>
                            <tr>
                                <th scope="row">O.E. 6.2</th>
                                <td>OBJETIVO ESTRATÉGICO 6.2: Presentar proyectos sobre Gobierno Abierto</td>
                            </tr>

                        </tbody>
                    </table>
                    </div>
                </div>
            </div>
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
                        "Terminado (Con actividades post.): " + data.actividadesposteriores + "<br>" + 
                        "Acumulados: " + data.acumulados + "<br>" + 
                        "Suspendidos: " + data.suspendidos);
                        
                        $("#proyectostotal").html("");
                        $("#proyectoscompletos").html("");
                        $("#proyectospendientes").html("");
                        $("#proyectosmedicion").html("");
                        
                        $("#proyectostotal").append(data.total);
                        $("#proyectoscompletos").append(data.terminados + data.actividadesposteriores);
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
                        "D. Realizados: " + data.realizados + "<br>" + 
                        "D. Revisados: " + data.revisada + "<br>" + 
                        "D. Verificados: " + data.verificada + "<br>" + 
                        "D. Validados: " + data.validada);
                      

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


                $("#procesoid").change(function(){
                    
                    filtrarporproceso();
                        
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
    var proyectosend =  <?php echo json_encode($proyectosend) ?>;
    var proyectosiso =  <?php echo json_encode($proyectosiso) ?>;
    var proyectosporejeData = <?php echo json_encode($data)?>;
    var dataproyectosiso = <?php echo json_encode($dataproyectosiso)?>;
    var proyectosvencidoscharte1 = <?php echo json_encode($proyectosvencidoscharte1)?>;
    var proyectosvencidoscharte2 = <?php echo json_encode($proyectosvencidoscharte2)?>;
    var proyectosvencidoscharte3 = <?php echo json_encode($proyectosvencidoscharte3)?>;
    var proyectosvencidoscharte4 = <?php echo json_encode($proyectosvencidoscharte4)?>;
    var proyectosvencidoscharte5 = <?php echo json_encode($proyectosvencidoscharte5)?>;
    var proyectosvencidoscharte6 = <?php echo json_encode($proyectosvencidoscharte6)?>;




    Highcharts.chart('container', {
        title: {
            text: 'Proyectos en el año'
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
        },{
        name: 'Proyectos Terminados',
        data:     proyectosend
    }
    ],
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
        text: 'Porcentaje de Proyectos por Eje'
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

    }]
});




Highcharts.chart('container5', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición de Proyectos Eje 1'
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
        data:  proyectosvencidoscharte1
    }]
});



Highcharts.chart('container6', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición de Proyectos Eje 2'
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
        data:  proyectosvencidoscharte2
    }]
});

Highcharts.chart('container7', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición de Proyectos Eje 3'
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
        data:  proyectosvencidoscharte3
    }]
});

Highcharts.chart('container8', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición de Proyectos Eje 4'
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
        data:  proyectosvencidoscharte4
    }]
});

Highcharts.chart('container9', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición de Proyectos Eje 5'
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
        data:  proyectosvencidoscharte5
    }]
});

Highcharts.chart('container10', {
    chart: {
        plotBackgroundColor: null,
        plotBorderWidth: null,
        plotShadow: false,
        type: 'pie'
    },
    title: {
        text: 'Medición de Proyectos Eje 6'
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
        data:  proyectosvencidoscharte6
    }]
});


Highcharts.chart('proyectosh', {

title: {
    text: 'Estados de Proyectos',
},

yAxis: {
    title: {
        text: 'Cantidad'
    }
},

xAxis: {
    categories: ['2021', '2022', '2023']
},

legend: {
    layout: 'vertical',
    align: 'right',
    verticalAlign: 'middle'
},

plotOptions: {
    series: {
        label: {
            connectorAllowed: false
        },
        pointStart: 2021
    }
},

series: [{
    name: 'Inicio',
    data: [110,149,195]
}, {
    name: 'En Proceso (Fase Control y Ejecución)',
    data: [73,18,0]
}, {
    name: 'En Proceso (Fase Planificación)',
    data: [null,null,0]
}, {
    name: 'Terminado (Con actividades posteriores a la finalización)',
    data: [null,null,118]
}, {
    name: 'Terminado (Fase Cierre)',
    data: [18,128,45]
}, {
    name: 'Acumulado',
    data: [4,3,4]
}, {
    name: 'Suspendido',
    data: [15,18,28]
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


Highcharts.chart('objetivosh', {
    chart: {
        type: 'column'
    },
    title: {
        text: 'Cumplimiento Objetivos Historico'
    },
    xAxis: {
        categories: [
            'O.E. 1.1',
            'O.E. 1.2',
            'O.E. 2.1',
            'O.E. 2.2',
            'O.E. 2.3',
            'O.E. 2.4',
            'O.E. 3.1',
            'O.E. 3.2',
            'O.E. 4.1',
            'O.E. 4.2',
            'O.E. 4.3',
            'O.E. 4.4',
            'O.E. 5.1',
            'O.E. 6.1',
            'O.E. 6.2'
        ]
    },
    yAxis: [{
        min: 0,
        title: {
            text: 'Cantidad'
        }
    }, {
        title: {
            text: 'Cantidad'
        },
        opposite: true
    }],
    legend: {
        shadow: false
    },
    tooltip: {
        shared: true
    },
    plotOptions: {
        column: {
            grouping: false,
            shadow: false,
            borderWidth: 0
        }
    },

    series: [{
        name: 'Meta 2022',
        color: 'rgba(165,170,217,1)',
        data: [1,8,0.05,0.20,5,0.99,4,0.99,0,0.99,0.99,0.99,2,1,1],
        pointPadding: 0.3,
        pointPlacement: -0.2
    }, {
        name: 'Logro 2022',
        color: 'rgba(126,86,134,.9)',
        data: [1,8,0.05,0.20,5,0.99,7,0.99,0,0.99,0.99,0.99,3,4,3],
        pointPadding: 0.4,
        pointPlacement: -0.2
    }, {
        name: 'Meta 2023',
        color: 'rgba(248,161,63,1)',
        data: [2,18,0.35,0.70,10,0.99,10,0.99,0.99,0.99,0.99,0.99,4,3,3],
        pointPadding: 0.3,
        pointPlacement: 0.2,
    }, {
        name: 'Logro 2023',
        color: 'rgba(186,60,61,.9)',
        data: [2,18,0.35,0.70,10,0.99,10,0.99,0.99,0.99,0.99,0.99,4,3,3],
        pointPadding: 0.4,
        pointPlacement: 0.2,
    }]
});

function filtrar()
{
    // $.ajax({
    //             url: "",
    //             datatype: 'json',
    //             data: {
    //                 begin: $("#begindate").val(),
    //                 end: $("#enddate").val()
    //             },
    //             success: function(data){
    //                 console.log(data);
    //                 $("#indicadorproceso").html("");
    //                 $("#indicadorsuspendido").html("");
    //                 $("#indicadoracumulado").html("");
    //                 $("#indicadorterminado").html("");
    //                 $("#indicadormedicion").html("");
    //                 $("#indicadorsatisfactorio").html("");
    //                 $("#indicadorproceso").append(data[0].indicadorproceso);
    //                 $("#indicadorsuspendido").append(data[0].indicadorsuspendido);
    //                 $("#indicadoracumulado").append(data[0].indicadoracumulado);
    //                 $("#indicadorterminado").append(data[0].indicadorterminado);
    //                 $("#indicadormedicion").append(data[0].indicadormedicion);
    //                 $("#indicadorsatisfactorio").append(data[0].indicadorsatisfactorio);
                    
    //                 // data.forEach(function(obj, index) {
    //                 //     $('#tbody').append('<tr><td>' + obj.id + '</td><td>'+obj.label+'</td><td>'+obj.poa+'</td></tr>');
    //                 // });
    //             }
    //         });
}

function filtrarporproceso()
{
    
    $.ajax({
        url: "{{route('admin.porprocesos')}}",
        datatype: 'json',
        data: {
            datesearch: $("#procesoid").val()
        },
        success: function(data){
            
            $('#tbodyporproceso').html("");
            $('#tbodytareasporproceso').html("");
            
            data[0].grilla.forEach(function(obj, index) {
                 $('#tbodyporproceso').append('<tr><td>' + obj.id + '</td><td>'+obj.name+'</td><td>'+obj.eje+'</td><td>'+obj.grupos+'</td><td>'+obj.satisfactorio+'</td><td>'+obj.botones+'</td></tr>');
            });

           
            $('#proymedibles').text(data[0].proymedibles);
            $('#proyconmed').text(data[0].proyconmed);
            $('#proysati').text(data[0].proysati);
            $('#proynosati').text(data[0].proynosati);
            $('#porcproymedido').text(data[0].porcproymedido+"%");
            $('#porcproysati').text(data[0].porcproysati+"%");

        }
    });
}


$("#historico_id").change(function(){
    let a= document.createElement('a');
    a.target= '_blank';
    a.href= $("#historico").val();
    a.click();
});


</script>


@stop