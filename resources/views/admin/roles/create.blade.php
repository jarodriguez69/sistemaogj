@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Roles')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Crear Role</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.roles.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Ingrese Nombre" value={{old('name')}}>
                    @error('name')
                        <small id="nameHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
               <h2 class="h3">Lista de permisos</h2>
               @foreach ($permissions as $permission)
                   <div>
                       <label>
                            <input type="checkbox" name="permissions[]" value="{{$permission->id}}"> {{$permission->description}}
                       </label>
                   </div>
               @endforeach
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.roles.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


