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
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$proyecto->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Diagn&oacute;stico</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('description',$proyecto->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="objetivos">Objetivos Espec&iacute;ficos</label>
                    <textarea name="objetivos" class="form-control" cols="30" rows="5" placeholder="Ingrese Objetivos Especificos">{{old('objetivos', $proyecto->objetivos)}}</textarea>
                    @error('objetivos')
                        <small id="objetivosId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="indicador">Indicador</label>
                    <input type="text" class="form-control" name="indicador" id="indicador" aria-describedby="indicador" placeholder="Ingrese Indicador" value={{old('indicador', $proyecto->indicador)}}>
                    @error('indicador')
                        <small id="indicadorHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="text" class="form-control" name="meta" id="meta" aria-describedby="meta" placeholder="Ingrese Meta" value={{old('meta', $proyecto->meta)}}>
                    @error('meta')
                        <small id="metaHelp" class="form-text text-danger">*{{$message}}</small>    
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
                    <label for="real">Fin Real</label>
                    <input type="date" class="form-control" name="real" aria-describedby="real" placeholder="Fecha de Fin Real" value="{{old('real', $proyecto->real != null ? date('Y-m-d', strtotime($proyecto->real)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
    
                <div class="form-group">
                    <label for="seguimiento">Fecha de Seguimiento</label>
                    <input type="date" class="form-control" name="seguimiento" aria-describedby="seguimiento" placeholder="Fecha de Seguimiento" value="{{old('seguimiento', $proyecto->seguimiento != null ? date('Y-m-d', strtotime($proyecto->seguimiento)) : "")}}">
                    @error('seguimiento')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="grupo_id">Grupo</label>
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
                    <label for="recursos">Recursos y/o Adquisiciones</label>
                    <textarea name="recursos" class="form-control" cols="30" rows="5" placeholder="Ingrese Recursos">{{old('recursos',$proyecto->recursos)}}</textarea>
                    @error('recursos')
                        <small id="recursosId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poa_id">Planificación Operativa</label>
                    <select class="form-control" id="poa_id">
                        <option value="0">(Seleccione POA)</option>
                        @foreach ($poas as $poa)
                            <option value="{{$poa->id}}" {{$proyecto->objetivos2->operativas->id==$poa->id ? "selected":""}}>{{$poa->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="objetivo_id">Objetivo</label>
                    <select class="form-control" name="objetivo_id" id="objetivo_id">
                        <option value="0">(Seleccione Objetivo)</option>
                        @foreach ($objetivosdelpoa as $objetivodelpoa)
                            <option value="{{$objetivodelpoa->id}}" {{$proyecto->objetivos2->id==$objetivodelpoa->id ? "selected":""}}>{{$objetivodelpoa->name}}</option>
                        @endforeach
                    </select> 
                    @error('objetivo_id')
                        <small class="form-text text-danger">*{{$message}}</small>    
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
                    <label for="user_id">Lider del Proyecto</label>
                    <select class="form-control" name="user_id">
                      
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" {{$proyecto->user_id==$user->id ? "selected" : ""}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>
    
                <div class="form-group">
                    <label for="equipo_id">Equipo de Proyecto</label>
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

$("#poa_id").change(function(){
  
  $.ajax({
      url: "{{route('admin.actividades.searchObjetives')}}",
      datatype: 'json',
      data: {
          poaid: $("#poa_id").val()
      },
      success: function(data){

          $('#objetivo_id').html("");
          $('#objetivo_id').append('<option value="-1">(Seleccione Objetivo)</option>');
          data.forEach(function(obj, index) {
              $('#objetivo_id').append('<option value="' + obj.id + '">'+obj.label+'</option>');
          });
      }
  });
});

</script>
@stop




{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}

