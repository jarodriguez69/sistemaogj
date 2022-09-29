@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Estrat&eacute;gicas')

@section('content_header')
    <h1>Planificaci&oacute;n Estrat&eacute;gica: {{$estrategica->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$estrategica->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$estrategica->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="ajuste">Ajustes</label>
                    <textarea name="ajuste" class="form-control" cols="30" rows="10" readonly>{{$estrategica->ajuste}}</textarea>
                </div>
                <div class="form-group">
                    <label for="replanificacion">Replanificaci&oacute;n</label>
                    <textarea name="replanificacion" class="form-control" cols="30" rows="10" readonly>{{$estrategica->replanificacion}}</textarea>
                </div>
                <div class="form-group">
                    <a href="{{route('admin.estrategicas.edit', $estrategica)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.estrategicas.index')}}" class="btn btn-danger">Volver</a>
                </div>
                
                {{-- <form action="{{route('admin.estrategicas.destroy', $estrategica)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form> --}}
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


