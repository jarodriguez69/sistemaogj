@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Proyectos')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Crear Proyecto</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.proyectos.store')}}" method="POST">
                @csrf
                <input type="hidden" class="form-control" name="estadoproyecto_id" id="estadoproyecto_id" aria-describedby="estadoproyecto_id" placeholder="Ingrese Estado" value="1">
                
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Ingrese Nombre" value={{old('name')}}>
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Diagn&oacute;stico</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('description')}}</textarea>
                    @error('description')
                        <small id="descriptionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="objetivos">Objetivos Espec&iacute;ficos</label>
                    <textarea name="objetivos" class="form-control" cols="30" rows="5" placeholder="Ingrese Objetivos Especificos">{{old('objetivos')}}</textarea>
                    @error('objetivos')
                        <small id="objetivosId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>



                  <div class="form-group">
                    <label for="indicador">Indicador</label>
                    <input type="text" class="form-control" name="indicador" id="indicador" aria-describedby="indicador" placeholder="Ingrese Indicador" value={{old('indicador')}}>
                    @error('indicador')
                        <small id="indicadorHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="text" class="form-control" name="meta" id="meta" aria-describedby="meta" placeholder="Ingrese Meta" value={{old('meta')}}>
                    @error('meta')
                        <small id="metaHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="begin">Fecha de Inicio</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{old('begin')}}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fecha de Finalizaci&oacute;n</label>
                    <input type="date" class="form-control" id="end" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{old('end')}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="seguimiento">Fecha de Seguimiento</label>
                    <input type="date" class="form-control" id="seguimiento" name="seguimiento" aria-describedby="seguimiento" placeholder="Fecha de Seguimiento" value="{{old('seguimiento')}}">
                    @error('seguimiento')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                
                <div class="form-group">
                    <label for="grupo_id">Grupo</label>
                    <select class="form-control" name="grupo_id">
                      
                        @foreach ($grupos as $grupo)
                            <option value="{{$grupo->id}}">{{$grupo->name}}</option>
                        @endforeach
                    </select>
                    @error('grupo_id')
                        <small id="grupoid" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="recursos">Recursos y/o Adquisiciones</label>
                    <textarea name="recursos" class="form-control" cols="30" rows="5" placeholder="Ingrese Recursos">{{old('recursos')}}</textarea>
                    @error('recursos')
                        <small id="recursosId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poa_id">Planificación Operativa</label>
                    <select class="form-control" id="poa_id">
                        <option value="-1">(Seleccione POA)</option>
                        @foreach ($poas as $poa)
                            <option value="{{$poa->id}}">{{$poa->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="objetivo_id">Objetivo</label>
                    <select class="form-control" name="objetivo_id" id="objetivo_id">
                        <option value="0">(Seleccione Objetivo)</option>
                    </select> 
                    @error('objetivo_id')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="measuring">¿Tiene Medici&oacute;n?</label>
                    <select class="form-control" name="measuring" id="measuring">
                        <option value="0">No</option>
                        <option value="1">Si</option>
                    </select> 
                    @error('measuring')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">Lider del Proyecto</label>
                    <select class="form-control" name="user_id">
                      
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" >{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="equipo_id">Equipo de Proyecto</label>
                        @foreach ($equipos as $equipo)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultPartes{{$equipo->id}}" name="equipos[]" value="{{$equipo->id}}">
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
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefaultPartes{{$parte->id}}" name="partes[]" value="{{$parte->id}}">
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
       

        // $("#objetivo_name").autocomplete({
        //     source: function(request, response){
        //         $.ajax({
        //             url: "{{route('admin.actividades.searchProject')}}",
        //             datatype: 'json',
        //             data: {
        //                 term: request.term
        //             },
        //             success: function(data){
        //                 response(data)
        //             }
        //         });
        //     },
        //     select: function(evento, selected) {
                
        //         $("#objetivo_id").val(selected.item.id);
        //     }
        // });


                           
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
@endsection

