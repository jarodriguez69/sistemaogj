@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Proyectos')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Proyecto</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.proyectos.update', $proyecto)}}" method="post">
            @csrf
            @method('put')
            {{-- <input type="hidden" name="enabled" value="{{$proyecto->enabled}}"> --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$proyecto->name)}}" readonly>
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="comment">Descripci&oacute;n</label> 
                    <textarea name="comment" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('comment',$proyecto->comment)}}</textarea>
                    @error('comment')
                        <small id="commentId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poa_id">Planificación Operativa</label>
                    <select class="form-control" id="poa_id">
                        <option value="0">(Seleccione POA)</option>
                        @foreach ($poas as $poa)
                            <option value="{{$poa->id}}" {{$proyecto->objetivos2->first()->operativas->id==$poa->id ? "selected":""}}>{{$poa->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="objetivos_id">Objetivos</label>
                    <div id="objetivos_id">
                        @foreach ($objetivosdelpoa as $objetivodelpoa)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultObjetivos{{$objetivodelpoa->id}}" name="objetivo[]" value="{{$objetivodelpoa->id}}" {{ in_array($objetivodelpoa->id, collect($proyecto->objetivos2)->pluck('id')->toArray()) ? "checked":""}}> 
                                    <label class="form-check-label" for="flexCheckDefaultObjetivos{{$objetivodelpoa->id}}">
                                        {{$objetivodelpoa->name}}
                                    </label>
                                </div>
                        @endforeach
                    </div>
                </div>

                <div class="form-group">
                    <label for="objetivos">Objetivos Espec&iacute;ficos</label>
                    <textarea name="objetivos" class="form-control" cols="30" rows="5" placeholder="Ingrese Objetivos Especificos">{{old('objetivos', $proyecto->objetivos)}}</textarea>
                    @error('objetivos')
                        <small id="objetivosId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="begin">Fecha de Inicio</label>
                    <input type="text" class="form-control" aria-describedby="begin"  value="{{$proyecto->begin != null ? date('d-m-Y', strtotime($proyecto->begin)) : ""}}" readonly>
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="end">Fecha de Finalizaci&oacute;n</label>
                    <input type="text" class="form-control" aria-describedby="end" value="{{($proyecto->end != null ? date('d-m-Y', strtotime($proyecto->end)) : "")}}" readonly>
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="seguimiento">Fecha de Cambio de Estado</label>
                    <input type="date" class="form-control" name="seguimiento" aria-describedby="seguimiento" placeholder="Fecha de Seguimiento" value="{{old('seguimiento', $proyecto->seguimiento != null ? date('Y-m-d', strtotime($proyecto->seguimiento)) : "")}}">
                    @error('seguimiento')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="real">Fin Real</label>
                    <input type="date" class="form-control" name="real" aria-describedby="real" placeholder="Fecha de Fin Real" value="{{old('real', $proyecto->real != null ? date('Y-m-d', strtotime($proyecto->real)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="year">Año</label>
                    <input type="number" class="form-control" name="year" id="year" aria-describedby="meta" placeholder="Ingrese Año" value={{old('year', $proyecto->year)}}>
                    @error('year')
                        <small id="yearHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="indicador">Indicador</label>
                    <input type="text" class="form-control" name="indicador" id="indicador" aria-describedby="indicador" placeholder="Ingrese Indicador" value="{{old('indicador', $proyecto->indicador)}}">
                    @error('indicador')
                        <small id="indicadorHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="text" class="form-control" name="meta" id="meta" aria-describedby="meta" placeholder="Ingrese Meta" value="{{old('meta', $proyecto->meta)}}">
                    @error('meta')
                        <small id="metaHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="risk">Riesgos</label> 
                    <a class="form-control" href="{{$proyecto->risk}}" target='_blank'>{{$proyecto->risk}}</a>
                    @error('risk')
                        <small id="riskId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="otherrisk">Otros Riesgos</label> 
                    <textarea name="otherrisk" class="form-control" cols="30" rows="5" placeholder="Ingrese Otros Riesgos">{{old('otherrisk',$proyecto->otherrisk)}}</textarea>
                    @error('otherrisk')
                        <small id="otherriskId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="chance">Oportunidades de Mejora</label> 
                    <a class="form-control" href="{{$proyecto->chance}}" target='_blank'>{{$proyecto->chance}}</a>
                    @error('chance')
                        <small id="chanceId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="otherchance">Otras Oportunidades de Mejora</label> 
                    <textarea name="otherchance" class="form-control" cols="30" rows="5" placeholder="Ingrese Otras Oportunidades">{{old('otherchance',$proyecto->otherchance)}}</textarea>
                    @error('otherchance')
                        <small id="otherchanceId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="diagnostico">Fecha de Diagn&oacute;stico</label>
                    <input type="date" class="form-control" id="diagnostico" name="diagnostico" aria-describedby="diagnostico" placeholder="Fecha de Diagnóstico" value="{{$proyecto->diagnostico != null ? date('Y-m-d', strtotime($proyecto->diagnostico)):""}}">
                    @error('diagnostico')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                <label for="description">Diagn&oacute;stico</label> <a href="#" data-toggle="popover" title="Ejemplos" data-content="EJEMPLO 1
Proyecto: Diseño e Implementación del SGC_Dirección de Recursos Humanos_2022
Diagnóstico: Se realiza el diagnóstico con el fin de obtener información que nos permita determinar si la Dirección de Recursos Humanos cuenta con un sistema de gestión de calidad y si fuera así, en qué grado cumple con los requisitos de la Norma ISO 9001:2015.
A tal fin, desde el  14/02/22 al 18/02/22 se realizaron reuniones y entrevistas con la Directora de la Unidad: Lic. Teresita Comolli y con parte de su equipo a los fines de recolectar evidencias de la existencia del SGC y de su grado de cumplimiento con los requisitos de la norma mencionada.
Se pudo determinar que cuentan con una Misión, Visión, Valores Manual de Procedimientos en una versión obsoleta, sitio web que permite la comunicación con sus usuarios, registro de indicadores.
Se concluye que la unidad no cuenta con un SGC, aunque si cuenta con una organización y documentos que evidencian su trabajo organizado.
Por ello se resuelve en conjunto iniciar el proceso implementación de la norma ISO 9001:2015 propuesto por la OGJ (incluye desde capacitaciones hasta el acompañamiento en el proceso de Certificación) a partir del 23/02/2022.

EJEMPLO 2
Proyecto: Plan Operativo_Juzgado Civil y Comercial Común V°_CJCapital_2022
Diagnóstico: Se realiza el diagnóstico con el fin de obtener información que nos permita determinar el  estado de situación actual de la Unidad en relación al proceso Gestión de Resoluciones (emisión de sentencias).
A tal fin, el día 27/09/2022 se consulta en el Tablero de Comando de la Dirección de Estadísticas y en el Tablero del SAE de la Unidad los siguientes indicadores:
•	Total de sentencias definitivas vencidas a la fecha
•	Promedio mensual de sentencias definitivas dictadas desde el 01/02/2022 hasta el 31/08/2022
Obteniendo como resultados:
•	Total de sentencias definitivas vencidas a la fecha del relevamiento: 38
•	Promedio mensual de sentencias Definitivas dictadas desde el 01/02/2022 hasta el 31/08/2022: 14,42

Se concluye que la unidad requiere de la implementación de POA para mejorar su desempeño."><i class="fas fa-info-circle"></i></a> 
                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('description',$proyecto->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="grupo_id">Programa</label>
                    <select class="form-control" name="grupo_id">
                        
                        @foreach ($grupos as $grupo)
                            <option value="{{$grupo->id}}" {{$proyecto->grupo_id==$grupo->id ? "selected" : ""}}>{{$grupo->name}}</option>
                        @endforeach
                    </select>
                    @error('grupo_id')
                    <small id="grupoid" class="form-text text-danger">*{{$message}}</small>    
                @enderror
                </div>

                <div class="form-group">
                    <label for="estadoproyecto_id">Estado</label>
                    <select class="form-control" name="estadoproyecto_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" {{$proyecto->estadoproyecto_id==$estado->id ? "selected" : ""}}>{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="proceso_id">Proceso</label>
                    <select class="form-control" name="proceso_id">
                        
                        @foreach ($procesos as $proceso)
                            <option value="{{$proceso->id}}" {{$proyecto->proceso_id==$proceso->id ? "selected" : ""}}>{{$proceso->name}}</option>
                        @endforeach
                    </select>
                    @error('proceso_id')
                    <small id="procesoid" class="form-text text-danger">*{{$message}}</small>    
                @enderror
                </div>

                <div class="form-group">
                    <label for="recursos">Recursos y/o Adquisiciones</label>
                    <textarea name="recursos" class="form-control" cols="30" rows="5" placeholder="Ingrese Recursos">{{old('recursos',$proyecto->recursos)}}</textarea>
                    @error('recursos')
                        <small id="recursosId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="measuring">¿Tiene Medici&oacute;n?</label>
                    <select class="form-control" name="measuring" id="measuring">
                        <option value="0" {{!$proyecto->measuring ? "selected" : ""}}>No</option>
                        <option value="1" {{$proyecto->measuring ? "selected" : ""}}>Si</option>
                    </select> 
                    @error('measuring')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="satisfactorio">¿Es Satisfactoria?</label>
                    <select class="form-control" name="satisfactorio" id="satisfactorio">
                        <option value="0" {{!$proyecto->satisfactorio ? "selected" : ""}}>No</option>
                        <option value="1" {{$proyecto->satisfactorio ? "selected" : ""}}>Si</option>
                    </select> 
                    @error('satisfactorio')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="medido">Fecha de Medici&oacute;n</label>
                    <input type="date" class="form-control" name="medido" aria-describedby="medido" placeholder="Fecha de Medición" value="{{old('medido', $proyecto->medido != null ? date('Y-m-d', strtotime($proyecto->medido)) : "")}}">
                    @error('medido')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="innovation">¿Es Innovaci&oacute;n?</label>
                    <select class="form-control" name="innovation" id="innovation">
                        <option value="0" {{!$proyecto->innovation ? "selected" : ""}}>No</option>
                        <option value="1" {{$proyecto->innovation ? "selected" : ""}}>Si</option>
                    </select> 
                    @error('innovation')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="benchmarking">¿Es Benchmarking?</label>
                    <select class="form-control" name="benchmarking" id="benchmarking">
                        <option value="0" {{!$proyecto->benchmarking ? "selected" : ""}}>No</option>
                        <option value="1" {{$proyecto->benchmarking ? "selected" : ""}}>Si</option>
                    </select> 
                    @error('benchmarking')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="leccion">Lecciones Aprendidas</label> 
                    <textarea name="leccion" class="form-control" cols="30" rows="5" placeholder="Ingrese Lecciones Aprendidas">{{old('leccion',$proyecto->leccion)}}</textarea>
                    @error('leccion')
                        <small id="leccionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">Responsable de Proyecto</label>
                    <select class="form-control" name="user_id">
                      
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" {{$proyecto->user_id==$user->id ? "selected" : ""}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="equipo_id">Equipo Operativo</label>
                        @foreach ($equipos as $equipo)
                                <div class="form-check">
                                
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultPartes{{$equipo->id}}" name="equipos[]" value="{{$equipo->id}}" {{ in_array($equipo->id, collect($proyecto->equipos)->pluck('id')->toArray()) ? "checked":""}}> 
                                    <label class="form-check-label" for="flexCheckDefaultPartes{{$equipo->id}}">
                                        {{$equipo->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
    
                <div class="form-group">
                    <label for="parte_id">Partes Interesadas</label>
                        @foreach ($partes as $parte)
                                <div class="form-check">
                                
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultPartes{{$parte->id}}" name="partes[]" value="{{$parte->id}}" {{ in_array($parte->id, collect($proyecto->partes)->pluck('id')->toArray()) ? "checked":""}}> 
                                    <label class="form-check-label" for="flexCheckDefaultPartes{{$parte->id}}">
                                        {{$parte->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.proyectos.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 


@section('js')

<script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>
<script>
            $(function () {
        $('[data-toggle="popover"]').popover()
        })

$("#poa_id").change(function(){
  
  $.ajax({
      url: "{{route('admin.actividades.searchObjetives')}}",
      datatype: 'json',
      data: {
          poaid: $("#poa_id").val()
      },
      success: function(data){

        $('#objetivos_id').html("");
                    data.forEach(function(obj, index) {
                        $('#objetivos_id').append('<div class="form-check"><input class="form-check-input" type="checkbox" id="flexCheckDefaultObjetivos' + obj.id + '" name="objetivo[]" value="' + obj.id + '"> <label class="form-check-label" for="flexCheckDefaultObjetivos' + obj.id + '">'+obj.label+'</label></div>');
                    });


      }
  });
});

</script>
@stop




{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


