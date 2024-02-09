@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Programas')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Programa</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.grupos.update', $grupo)}}" method="post">
            @csrf
            @method('put')
            <input type="hidden" name="enabled" value="{{$grupo->enabled}}">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$grupo->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description',$grupo->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

               
                <div class="form-group">
                    <label for="eje_id">Eje</label>
                    <select class="form-control" name="eje_id">
                        
                        @foreach ($ejes as $eje)
                            <option value="{{$eje->id}}" {{$grupo->eje_id==$eje->id ? "selected" : ""}}>{{$eje->name}}</option>
                        @endforeach
                    </select>
                    @error('eje_id')
                    <small id="ejeid" class="form-text text-danger">*{{$message}}</small>    
                @enderror
                </div>

                <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($grupo->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.grupos.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 







{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


