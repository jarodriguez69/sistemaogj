@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Usuarios')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Usuario</h1>
@endsection

@section('content')
@if (session('info'))
    <div class="alert alert-success">
        <strong>{{session('info')}}</strong>
    </div>
@endif     

    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.users.update', $user)}}" method="post">
            @csrf
            @method('put')
            {{-- <input type="hidden" name="enabled" value="{{$eje->enabled}}"> --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$user->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Ingrese Correo" value={{old('email',$user->email)}}>
                    @error('email')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                
                <div class="form-group">
                    <label for="eje_id">Roles</label>
                        @foreach ($roles as $rol)
                            <div>
                                <label>
                                    @if($user->hasRole($rol->name))
                                    <input type="checkbox" name="roles[]" value="{{$rol->id}}" checked> {{$rol->name}}
                                    @else
                                        <input type="checkbox" name="roles[]" value="{{$rol->id}}"> {{$rol->name}}    
                                    @endif
                                </label>
                            </div>
                        @endforeach
                </div>

                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.users.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


