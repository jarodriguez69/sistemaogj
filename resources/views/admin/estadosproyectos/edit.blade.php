@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Estado de Proyectos')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Estado de Proyecto</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.estadosproyectos.update', $estadosproyecto)}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="enabled" value="{{$estadosproyecto->enabled}}">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$estadosproyecto->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description',$estadosproyecto->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.estadosproyectos.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div>  
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


