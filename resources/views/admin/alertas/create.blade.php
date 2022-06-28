@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Alertas')
@section('plugins.Datatables', true)


@section('content_header')
    <h1>Crear Alerta</h1>
@endsection


@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.alertas.store')}}" method="POST" enctype="multipart/form-data">
                @csrf
                
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" aria-describedby="name" placeholder="Ingrese Nombre" value={{old('name')}}>
                    @error('name')
                        <small id="emailHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description')}}</textarea>
                    @error('description')
                        <small id="descriptionId" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="days">D&iacute;as</label>
                    <input type="number" class="form-control" id="days" name="days" aria-describedby="days" placeholder="D&iacute;as Antes" value="{{ old('days') }}">
                    
                    @error('days')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{ old('end') }}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">Usuarios</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}">
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>

                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.alertas.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 




