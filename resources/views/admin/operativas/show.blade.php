@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Planificaciones Operativas')

@section('content_header')
    <h1>Planificación Operativa: {{$operativa->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$operativa->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$operativa->description}}</textarea>
                </div>

                
                <div class="form-group">
                    <label for="end">Planificaci&oacute;n Estrat&eacute;gica</label>
                    <input type="text" class="form-control" name="estrategica" aria-describedby="estrategica"  value="{{App\Models\Estrategica::find($operativa->estrategica_id) != null ? App\Models\Estrategica::find($operativa->estrategica_id)->name : ""}}" readonly>
                </div>
                
                <div class="form-group">
                    <a href="{{route('admin.operativas.edit', $operativa)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.operativas.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.operativas.destroy', $operativa)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


