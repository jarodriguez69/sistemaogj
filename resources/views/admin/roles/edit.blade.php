@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Roles')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Role</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.roles.update', $role)}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="enabled" value="{{$role->enabled}}">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$role->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
               
                <h2 class="h3">Lista de permisos</h2>
                @foreach ($permissions as $item)
                    <div>
                        <label>
                            @if($role->hasPermissionTo($item->name))
                                <input type="checkbox" name="permissions[]" value="{{$item->id}}" checked> {{$item->description}}
                            @else
                            <input type="checkbox" name="permissions[]" value="{{$item->id}}"> {{$item->description}}
                            @endif
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


