@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Estrat&eacute;gicas')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Estrat&eacute;gica</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.estrategicas.update', $estrategica)}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="enabled" value="{{$estrategica->enabled}}">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$estrategica->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description',$estrategica->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="ajuste">Ajustes</label>
                    <textarea name="ajuste" class="form-control" cols="30" rows="10" placeholder="Ingrese Ajustes">{{old('ajuste',$estrategica->ajuste)}}</textarea>
                    @error('ajuste')
                        <small id="ajusteId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="replanificacion">Replanificaci&oacute;n</label>
                    <textarea name="replanificacion" class="form-control" cols="30" rows="10" placeholder="Ingrese Replanificación">{{old('replanificacion',$estrategica->replanificacion)}}</textarea>
                    @error('replanificacion')
                        <small id="replanificacionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.estrategicas.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


