@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Actividades')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@endsection
@section('content_header')
    <h1>Crear No Conformidad</h1>
@endsection


@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.tareas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                {{--  CREAR --}}
                <div class="form-group">
                    <label for="fuente_id">Origen</label>
                    <select class="form-control" name="fuente_id">
                      
                        @foreach ($fuentes as $fuente)
                            <option value="{{$fuente->id}}">{{$fuente->name}}</option>
                        @endforeach
                    </select>
                    @error('fuente_id')
                        <small id="fuenteid" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div> 

                <div class="form-group">
                    <label for="name">Descripción de no conformidad</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Ingrese Nombre" value={{old('name')}}>
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">An&aacute;lisis de Causa</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description')}}</textarea>
                    @error('description')
                        <small id="descriptionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                {{--  CREAR --}}
                <div class="form-group">
                    <label for="correccion">Correcci&oacute;n</label>
                    <textarea name="correccion" class="form-control" cols="30" rows="10" placeholder="Ingrese Corrección">{{old('correccion')}}</textarea>
                    @error('correccion')
                        <small id="correccionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="begin">Fecha de Registro</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{ old('begin') }}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fecha de Implementaci&oacute;n</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{ old('end') }}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="finreal">Fin Real (opcional)</label>
                    <input type="date" class="form-control" name="finreal" aria-describedby="end" placeholder="Fecha de Fin Real" value="{{ old('finreal') }}">
                    @error('finreal')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proyecto_id">Proyecto</label>
                    <input type="text"  id="proyecto_name" class="form-control">
                    <input type="hidden" name="proyecto_id" id="proyecto_id">
                    {{-- <select class="form-control" name="proyecto_id">
                      
                        @foreach ($proyectos as $proyecto)
                            <option value="{{$proyecto->id}}">{{$proyecto->name}}</option>
                        @endforeach
                    </select> --}}
                    @error('proyecto_id')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estadotarea_id">Estado</label>
                    <select class="form-control" name="estadotarea_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="proceso_id">Proceso</label>
                    <select class="form-control" name="proceso_id">
                      
                        @foreach ($procesos as $proceso)
                            <option value="{{$proceso->id}}">{{$proceso->name}}</option>
                        @endforeach
                    </select>
                    @error('proceso_id')
                        <small id="procesoid" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                {{--  CREAR --}}
                <div class="form-group">
                    <label for="otra">NC - Otras Areas</label>
                    <textarea name="otra" class="form-control" cols="30" rows="10" placeholder="Ingrese NC - Otras Areas">{{old('otra')}}</textarea>
                    @error('otra')
                        <small id="otraId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                {{--  CREAR --}}
                <div class="form-group">
                    <label for="accioncorrectiva">Acción Correctiva</label>
                    <textarea name="accioncorrectiva" class="form-control" cols="30" rows="10" placeholder="Ingrese Acción Correctiva">{{old('accioncorrectiva')}}</textarea>
                    @error('accioncorrectiva')
                        <small id="accioncorrectivaId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                {{--  CREAR --}}
                <div class="form-group">
                    <label for="eficacia">Eficacia</label>
                    <textarea name="eficacia" class="form-control" cols="30" rows="10" placeholder="Ingrese Eficacia">{{old('eficacia')}}</textarea>
                    @error('eficacia')
                        <small id="eficaciaId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}">
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>

              


                <div class="form-group">
                    <label for="url">Adjuntar Enlace</label>
                    <textarea name="url" class="form-control" cols="30" rows="5" placeholder="Ingrese Enlace">{{old('url')}}</textarea>
                    @error('url')
                        <small id="urlId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="file">Adjuntar Archivos</label>
                    <input type="file" class="form-control" id="formFile" name="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*"> <br />
                    @error('file')
                    <small class="form-text text-danger">*{{$message}}</small>   
                    @enderror
                </div>

                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.tareas.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 

@section('js')
    
    <script src="{{asset('vendor/jquery-ui/jquery-ui.min.js')}}"></script>

    <script>
       

        $("#proyecto_name").autocomplete({
            source: function(request, response){
                $.ajax({
                    url: "{{route('admin.tareas.searchProject')}}",
                    datatype: 'json',
                    data: {
                        term: request.term
                    },
                    success: function(data){
                        response(data)
                    }
                });
            },
            select: function(evento, selected) {
                
                $("#proyecto_id").val(selected.item.id);
            }
        });



        
    </script>
@endsection



