@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Proyectos')

@section('content_header')
    <h1>Proyecto - {{$proyecto->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$proyecto->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Diagn&oacute;stico</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" readonly>{{$proyecto->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="description">Objetivos Espec&iacute;ficos</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" readonly>{{$proyecto->objetivos}}</textarea>
                </div>

                <div class="form-group">
                    <label for="indicador">Indicador</label>
                    <input type="text" class="form-control" name="indicador" id="indicador" value="{{$proyecto->indicador}}" readonly>
                </div>

                <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="text" class="form-control" name="meta" id="meta" value="{{$proyecto->meta}}" readonly>
                </div>

                <div class="form-group">
                    <label for="begin">Fecha de Inicio</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$proyecto->begin != null ? date('Y-m-d', strtotime($proyecto->begin)):""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Fecha de Finalización</label>
                    <input type="text" class="form-control" name="end" aria-describedby="end" value="{{$proyecto->end != null ? date('Y-m-d', strtotime($proyecto->end)):""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="end">Fin Real</label>
                    <input type="text" class="form-control" name="real" aria-describedby="real" value="{{$proyecto->real != null ? date('Y-m-d', strtotime($proyecto->real)):""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="seguimiento">Fecha de Seguimiento</label>
                    <input type="text" class="form-control" name="seguimiento" aria-describedby="seguimiento" value="{{$proyecto->seguimiento != null ? date('Y-m-d', strtotime($proyecto->seguimiento)):""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="end">Grupo</label>
                    <input type="text" class="form-control" name="grupo" aria-describedby="grupo"  value="{{App\Models\Grupo::find($proyecto->grupo_id) != null ? App\Models\Grupo::find($proyecto->grupo_id)->name : ""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="end">Estado</label>
                    <input type="text" class="form-control" name="estado" aria-describedby="estado" value="{{App\Models\EstadoProyecto::find($proyecto->estadoproyecto_id) != null ? App\Models\EstadoProyecto::find($proyecto->estadoproyecto_id)->name : ""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="recursos">Recursos y/o Adquisiciones</label>
                    <textarea name="recursos" class="form-control" cols="30" rows="5" readonly>{{$proyecto->recursos}}</textarea>
                </div>
                <div class="form-group">
                    <label for="operativa_id">Planificación Operativa</label>
                    <input type="text" class="form-control" name="operativa_id" aria-describedby="operativa_id" value="{{$proyecto->objetivos2->operativas->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="objetivo_id">Objetivo</label>
                    <input type="text" class="form-control" name="objetivo_id" aria-describedby="objetivo_id" value="{{$proyecto->objetivos2->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="user">Lider del Proyecto</label>
                    <input type="text" class="form-control" name="user" aria-describedby="user" value="{{App\Models\User::find($proyecto->user_id) != null ? App\Models\User::find($proyecto->user_id)->name : ""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="equipo_id">Equipo de Proyecto</label>
                        @foreach ($equipos as $equipo)
                                <div class="form-check">
                                
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefaultPartes{{$equipo->id}}" name="equipos[]" value="{{$equipo->id}}" {{ in_array($equipo->id, collect($proyecto->equipos)->pluck('id')->toArray()) ? "checked":""}}> 
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
                                
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefaultPartes{{$parte->id}}" name="partes[]" value="{{$parte->id}}" {{ in_array($parte->id, collect($proyecto->partes)->pluck('id')->toArray()) ? "checked":""}}> 
                                    <label class="form-check-label" for="flexCheckDefaultPartes{{$parte->id}}">
                                        {{$parte->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <a href="{{route('admin.proyectos.edit', $proyecto)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.proyectos.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.proyectos.destroy', $proyecto)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


