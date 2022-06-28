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
           <form action="{{route('admin.actividades.store')}}" method="POST" enctype="multipart/form-data">
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
                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('description')}}</textarea>
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
                    <label for="estadoactividad_id">Estado</label>
                    <select class="form-control" name="estadoactividad_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}">{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="porcentaje">Avance</label>
                    <input type="number" class="form-control" name="porcentaje" aria-describedby="porcentaje" placeholder="Ingrese Porcentaje" value="{{old('porcentaje')}}">
                    @error('porcentaje')
                        <small class="form-text text-danger">*{{$message}}</small>    
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

                {{-- <div class="form-group">
                    <label for="file">Adjuntar Archivos</label>
                    <input type="file" class="form-control" id="formFile" name="file" accept="application/msword, application/vnd.ms-excel, application/vnd.ms-powerpoint, text/plain, application/pdf, image/*"> <br />
                    @error('file')
                    <small class="form-text text-danger">*{{$message}}</small>   
                    @enderror
                </div> --}}

                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.actividades.index')}}" class="btn btn-danger">Cancelar</a>
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



