@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Usuarios')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Crear Usuario</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.users.store')}}" method="POST">
                @csrf
                <input type="hidden" name="enabled" value="1">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Ingrese Nombre" value={{old('name')}}>
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Email</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Ingrese Correo" value={{old('email')}}>
                    @error('email')
                        <small id="emailId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="email">Contraseña</label>
                    <input type="text" class="form-control" name="password" id="password" aria-describedby="password" placeholder="Ingrese Password" value={{old('password')}}>
                    @error('password')
                        <small id="passwordId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                
                
                <div class="form-group">
                    <label for="eje_id">Roles</label>
                        @foreach ($roles as $rol)

                                <input type="checkbox" name="roles[]" value="{{$rol->id}}"> {{$rol->name}}    
                            
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


