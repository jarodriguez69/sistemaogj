@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Procesos')

@section('content_header')
    <h1>Proceso - {{$proceso->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$proceso->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$proceso->description}}</textarea>
                </div>
                <div class="form-group">
                    <a href="{{route('admin.procesos.edit', $proceso)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.procesos.index')}}" class="btn btn-danger">Volver</a>
                </div>
                {{-- <form action="{{route('admin.procesos.destroy', $proceso)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form> --}}
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


