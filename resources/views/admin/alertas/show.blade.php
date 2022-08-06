@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Alertas')

@section('content_header')
    <h1>Alerta - {{$alerta->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$alerta->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$alerta->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="days">D&iacute;as</label>
                    <input type="text" class="form-control" id="days" name="days" aria-describedby="days" value="{{$alerta->days}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$alerta->end != null ? date('Y-m-d', strtotime($alerta->end)):""}}" readonly>
                    
                </div>

                
                
                
                <div class="form-group">
                    <label for="user_id">Usuarios</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($alerta->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>

                <div class="form-group">
                    <a href="{{route('admin.alertas.edit', $alerta)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.alertas.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.alertas.destroy', $alerta)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


