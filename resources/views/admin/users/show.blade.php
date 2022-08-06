@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Usuarios')

@section('content_header')
    <h1>Usuario - {{$user->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$user->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$user->email}}" readonly>
                </div>

                <div class="form-group">
                    <label for="eje_id">Roles</label>
                        @foreach ($roles as $rol)
                            <div>
                                <label>
                                    @if($user->hasRole($rol->name))
                                    <input type="checkbox" name="roles[]" value="{{$rol->id}}" checked disabled> {{$rol->name}}
                                    @else
                                        <input type="checkbox" name="roles[]" value="{{$rol->id}}" disabled> {{$rol->name}}    
                                    @endif
                                </label>
                            </div>
                        @endforeach
                </div>



                <div class="form-group">
                    <a href="{{route('admin.users.edit', $user)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.users.index')}}" class="btn btn-danger">Volver</a>
                </div>

                
                {{-- <form action="{{route('admin.users.destroy', $user)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form> --}}
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


