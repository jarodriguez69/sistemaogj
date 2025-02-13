@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Actividades')
@section('plugins.Datatables', true)
@section('css')
    <link rel="stylesheet" href="{{asset('vendor/jquery-ui/jquery-ui.min.css')}}">
@endsection

@section('content_header')
    <h1>Editar Actividad</h1>
@endsection

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('info')}}</strong>
</div>
@endif
    <div class="card">
        <div class="card-body">
            
           

           <form id="form-submit" action="{{route('admin.tareas.update', $tarea)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')


            @if($tarea->proceso_id ==9)         
                




            {{--  CREAR --}}
            <div class="form-group">
                    <label for="fuente_id">Origen</label>
                    <select class="form-control" name="fuente_id">
                    
                            
                        
                        @foreach ($fuentes as $fuente)
                            <option value="{{$fuente->id}}" {{$tarea->fuente_id==$fuente->id ? "selected" : ""}}>{{$fuente->name}}</option>
                        @endforeach
                    </select>
                    @error('fuente_id')
                        <small id="fuenteid" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div> 

                <div class="form-group">
                    <label for="name">Descripción de no conformidad</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$tarea->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">An&aacute;lisis de Causa</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description',$tarea->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                {{--  CREAR --}}
                <div class="form-group">
                    <label for="correccion">Correcci&oacute;n</label>
                    <textarea name="correccion" class="form-control" cols="30" rows="10" placeholder="Ingrese Corrección">{{old('correccion',$tarea->correccion)}}</textarea>
                    @error('correccion')
                        <small id="correccionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="begin">Fecha de Registro</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{old('begin', $tarea->begin != null ? date('Y-m-d', strtotime($tarea->begin)) : "")}}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fecha de Implementaci&oacute;n</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{old('end', $tarea->end != null ? date('Y-m-d', strtotime($tarea->end)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proyecto_id">Proyecto</label>
                    <input type="text"  id="proyecto_name" class="form-control" value="{{old('proyecto_name',$tarea->proyectos->name.' - '.$tarea->proyectos->year)}}">
                    <input type="hidden" name="proyecto_id" id="proyecto_id" value="{{old('proyecto_id',$tarea->proyectos->id)}}">
                </div>

                {{-- <div class="form-group">
                    <label for="proyecto_id">Proyecto</label>
                    <select class="form-control" name="proyecto_id">
                      
                        @foreach ($proyectos as $proyecto)
                            <option value="{{$proyecto->id}}" {{$tarea->proyecto_id==$proyecto->id ? "selected" : ""}}>{{$proyecto->name}}</option>
                        @endforeach
                    </select>
                  </div> --}}

                  <div class="form-group">
                    <label for="estadotarea_id">Estado</label>
                    <select class="form-control" name="estadotarea_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" {{$tarea->estadotarea_id==$estado->id ? "selected" : ""}}>{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="proceso_id">Proceso</label>
                    <select class="form-control" name="proceso_id">
                        
                        @foreach ($procesos as $proceso)
                            <option value="{{$proceso->id}}" {{$tarea->proceso_id==$proceso->id ? "selected" : ""}}>{{$proceso->name}}</option>
                        @endforeach
                    </select>
                    @error('proceso_id')
                    <small id="procesoid" class="form-text text-danger">*{{$message}}</small>    
                @enderror
                </div>
                
                {{--  CREAR --}}
                <div class="form-group">
                    <label for="otra">NC - Otras Areas</label>
                    <textarea name="otra" class="form-control" cols="30" rows="10" placeholder="Ingrese NC - Otras Areas">{{old('otra',$tarea->otra)}}</textarea>
                    @error('otra')
                        <small id="otraId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                {{--  CREAR --}}
                <div class="form-group">
                    <label for="accioncorrectiva">Acción Correctiva</label>
                    <textarea name="accioncorrectiva" class="form-control" cols="30" rows="10" placeholder="Ingrese Acción Correctiva">{{old('accioncorrectiva',$tarea->accioncorrectiva)}}</textarea>
                    @error('accioncorrectiva')
                        <small id="accioncorrectivaId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                {{--  CREAR --}}
                <div class="form-group">
                    <label for="eficacia">Eficacia</label>
                    <textarea name="eficacia" class="form-control" cols="30" rows="10" placeholder="Ingrese Eficacia">{{old('eficacia',$tarea->eficacia)}}</textarea>
                    @error('eficacia')
                        <small id="eficaciaId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($tarea->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="url">Adjuntar Enlace</label>
                    <textarea name="url" class="form-control" cols="30" rows="5" placeholder="Ingrese Enlace">{{old('url', $tarea->url)}}</textarea>
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
                    <label for="filelist">Archivos</label>
                    <table class="table table-striped" id="filelist"> 

                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td><a href="{{route('admin.tareas.descarga', $file->id)}}">{{$file->name}}</a></td>
                                    <td><a href="javascript:deletefile({{$file->id}})" class="btn btn-sm btn-danger">Eliminar</a></td>
                                </tr>
                            @endforeach 
                        </tbody>

                    </table>   
                    
                </div>





            @else
                
            





                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$tarea->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description',$tarea->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{old('begin', $tarea->begin != null ? date('Y-m-d', strtotime($tarea->begin)) : "")}}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{old('end', $tarea->end != null ? date('Y-m-d', strtotime($tarea->end)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="finreal">Fin Real</label>
                    <input type="date" class="form-control" name="finreal" aria-describedby="end" placeholder="Fecha de Fin Real" value="{{old('finreal', $tarea->finreal != null ? date('Y-m-d', strtotime($tarea->finreal)) : "")}}">
                    @error('finreal')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="proyecto_id">Proyecto</label>
                    <input type="text"  id="proyecto_name" class="form-control" value="{{old('proyecto_name',$tarea->proyectos->name.' - '.$tarea->proyectos->year)}}">
                    <input type="hidden" name="proyecto_id" id="proyecto_id" value="{{old('proyecto_id',$tarea->proyectos->id)}}">
                </div>

                {{-- <div class="form-group">
                    <label for="proyecto_id">Proyecto</label>
                    <select class="form-control" name="proyecto_id">
                      
                        @foreach ($proyectos as $proyecto)
                            <option value="{{$proyecto->id}}" {{$tarea->proyecto_id==$proyecto->id ? "selected" : ""}}>{{$proyecto->name}}</option>
                        @endforeach
                    </select>
                  </div> --}}

                  <div class="form-group">
                    <label for="estadotarea_id">Estado</label>
                    <select class="form-control" name="estadotarea_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" {{$tarea->estadotarea_id==$estado->id ? "selected" : ""}}>{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="proceso_id">Proceso</label>
                    <select class="form-control" name="proceso_id">
                        
                        @foreach ($procesos as $proceso)
                            <option value="{{$proceso->id}}" {{$tarea->proceso_id==$proceso->id ? "selected" : ""}}>{{$proceso->name}}</option>
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
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($tarea->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <label for="url">Adjuntar Enlace</label>
                    <textarea name="url" class="form-control" cols="30" rows="5" placeholder="Ingrese Enlace">{{old('url', $tarea->url)}}</textarea>
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
                    <label for="filelist">Archivos</label>
                    <table class="table table-striped" id="filelist"> 

                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td><a href="{{route('admin.tareas.descarga', $file->id)}}">{{$file->name}}</a></td>
                                    <td><a href="javascript:deletefile({{$file->id}})" class="btn btn-sm btn-danger">Eliminar</a></td>
                                </tr>
                            @endforeach 
                        </tbody>

                    </table>   
                    
                </div>
                @endif

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

    function deletefile(id)
    {
    let fileid = id
    let ruta1 = "{{ route('admin.tareas.deleteFile', 'req_id') }}"
    var ruta = ruta1.replace('req_id', fileid)

    $.ajax({
        headers: { 'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
        url: ruta,
        method: "POST",
        success: function(data) {
            
            $("#filelist").html("");
            var table = '<tbody>';
            if(data.files != undefined)
            {
                for(var i = 0; i < data.files.length; i++){
                let idtodelete = data.files[i].id
                let ruta1 = "<tr><td><a href='{{route('admin.tareas.descarga', 'pid')}}'>" + data.files[i].name + "</a></td> <td> <a href='javascript:deletefile({{'pidi'}})' class='btn btn-sm btn-danger'>Eliminar</a></td></tr>";     
                table = table + ruta1.replace('pid', idtodelete)
                table = table.replace('pidi', idtodelete)
                }
            }
            
            table = table + '</tbody>';
            $("#filelist").append( table );
        },
        error: function (data, textStatus, errorThrown) {
            console.log(data);

        }
    });

}
</script>
@stop


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


