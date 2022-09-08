@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Tareas')

@section('content_header')
    <h1>Tarea - {{$tarea->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$tarea->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$tarea->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$tarea->begin != null ? date('Y-m-d', strtotime($tarea->begin)):""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$tarea->end != null ? date('Y-m-d', strtotime($tarea->end)):""}}" readonly>
                    
                </div>

                <div class="form-group">
                    <label for="proyecto_id">Proyecto</label>
                    <input type="text" class="form-control" name="proyecto_id" aria-describedby="proyecto_id" value="{{App\Models\Proyecto::find($tarea->proyecto_id) != null ? App\Models\Proyecto::find($tarea->proyecto_id)->name : ""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="estadotarea_id">Estado</label>
                    <input type="text" class="form-control" name="estadotarea_id" aria-describedby="estadotarea_id" value="{{App\Models\EstadoTarea::find($tarea->estadotarea_id) != null ? App\Models\EstadoTarea::find($tarea->estadotarea_id)->name : ""}}" readonly>
                </div>

                
                <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($tarea->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>

                <div class="form-group">
                    <label for="url">Enlace</label>
                    <textarea name="url" class="form-control" cols="30" rows="5" readonly>{{$tarea->url}}</textarea>
                </div>

                <div class="form-group">
                    <label for="filelist">Archivos</label>
                    <table class="table table-striped" id="filelist"> 

                        <tbody>
                            @foreach ($files as $file)
                                <tr>
                                    <td><a href="{{route('admin.tareas.descarga', $file->id)}}">{{$file->name}}</a></td>
                                </tr>
                            @endforeach 
                        </tbody>

                    </table>   
                    
                </div>

                <div class="form-group">
                    <a href="{{route('admin.tareas.edit', $tarea)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.tareas.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.tareas.destroy', $tarea)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


