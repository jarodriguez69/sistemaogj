@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Actividades')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@endsection
@section('content_header')
    <h1>Crear Actividad</h1>
@endsection


@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.tareas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Ingrese Nombre" value={{old('name')}}>
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description')}}</textarea>
                    @error('description')
                        <small id="descriptionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{ old('begin') }}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{ old('end') }}">
                    @error('end')
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



