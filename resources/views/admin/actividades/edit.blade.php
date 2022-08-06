@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Tareas')
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
            
           

           <form id="form-submit" action="{{route('admin.actividades.update', $actividade)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$actividade->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('description',$actividade->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{old('begin', $actividade->begin != null ? date('Y-m-d', strtotime($actividade->begin)) : "")}}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{old('end', $actividade->end != null ? date('Y-m-d', strtotime($actividade->end)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="poa_id">Planificación Operativa</label>
                    <select class="form-control" id="poa_id">
                        <option value="0">(Seleccione POA)</option>
                        @foreach ($poas as $poa)
                            <option value="{{$poa->id}}" {{$actividade->objetivos->operativas->id==$poa->id ? "selected":""}}>{{$poa->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="objetivo_id">Objetivo</label>
                    <select class="form-control" name="objetivo_id" id="objetivo_id">
                        <option value="0">(Seleccione Objetivo)</option>
                        @foreach ($objetivosdelpoa as $objetivodelpoa)
                            <option value="{{$objetivodelpoa->id}}" {{$actividade->objetivos->id==$objetivodelpoa->id ? "selected":""}}>{{$objetivodelpoa->name}}</option>
                        @endforeach
                    </select> 
                    @error('objetivo_id')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="estadoactividad_id">Estado</label>
                    <select class="form-control" name="estadoactividad_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" {{$actividade->estadoactividad_id==$estado->id ? "selected" : ""}}>{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="number" class="form-control" name="peso" aria-describedby="peso" placeholder="Ingrese Peso" value="{{old('peso',$actividade->peso)}}">
                    @error('peso')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="porcentaje">Avance</label>
                    <input type="number" class="form-control" name="porcentaje" aria-describedby="porcentaje" placeholder="Ingrese Porcentaje" value="{{old('porcentaje',$actividade->porcentaje)}}">
                    @error('porcentaje')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                {{-- <div class="form-group">
                    <label for="objetivo_id">Objetivo</label>
                    <select class="form-control" name="objetivo_id">
                      
                        @foreach ($objetivos as $objetivo)
                            <option value="{{$objetivo->id}}" {{$actividade->objetivo_id==$objetivo->id ? "selected" : ""}}>{{$objetivo->name}}</option>
                        @endforeach
                    </select>
                  </div> --}}



                <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($actividade->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>

 {{--
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
                                    <td><a href="{{route('admin.actividades.descarga', $file->id)}}">{{$file->name}}</a></td>
                                    <td><a href="javascript:deletefile({{$file->id}})" class="btn btn-sm btn-danger">Eliminar</a></td>
                                </tr>
                            @endforeach 
                        </tbody>

                    </table>   
                    
                </div>
                 --}}

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
    $("#objetivo_name").autocomplete({
        source: function(request, response){
            $.ajax({
                url: "{{route('admin.actividades.searchProject')}}",
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
            
            $("#objetivo_id").val(selected.item.id);
        }
    });

    function deletefile(id)
    {
    let fileid = id
    let ruta1 = "{{ route('admin.actividades.deleteFile', 'req_id') }}"
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
                let ruta1 = "<tr><td><a href='{{route('admin.actividades.descarga', 'pid')}}'>" + data.files[i].name + "</a></td> <td> <a href='javascript:deletefile({{'pidi'}})' class='btn btn-sm btn-danger'>Eliminar</a></td></tr>";     
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


