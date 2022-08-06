@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Tareas')

@section('content_header')
    <h1>Tarea - {{$actividade->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$actividade->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" readonly>{{$actividade->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$actividade->begin != null ? date('Y-m-d', strtotime($actividade->begin)):""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$actividade->end != null ? date('Y-m-d', strtotime($actividade->end)):""}}" readonly>
                    
                </div>

                <div class="form-group">
                    <label for="operativa_id">Planificación Operativa</label>
                    <input type="text" class="form-control" name="operativa_id" aria-describedby="operativa_id" value="{{$actividade->objetivos->operativas->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="objetivo_id">Objetivo</label>
                    <input type="text" class="form-control" name="objetivo_id" aria-describedby="objetivo_id" value="{{$actividade->objetivos->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="estadoactividad_id">Estado</label>
                    <input type="text" class="form-control" name="estadoactividad_id" aria-describedby="estadoactividad_id" value="{{App\Models\EstadoTarea::find($actividade->estadoactividad_id) != null ? App\Models\EstadoTarea::find($actividade->estadoactividad_id)->name : ""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="peso">Peso</label>
                    <input type="text" class="form-control" name="peso" id="peso" value="{{$actividade->peso}}" readonly>
                </div>

                <div class="form-group">
                    <label for="porcentaje">Avance</label>
                    <input type="text" class="form-control" name="porcentaje" id="porcentaje" value="{{$actividade->porcentaje}}" readonly>
                </div>

                {{-- <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($actividade->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div> --}}

                <div class="form-group">
                    <a href="{{route('admin.actividades.edit', $actividade)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.actividades.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.actividades.destroy', $actividade)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


