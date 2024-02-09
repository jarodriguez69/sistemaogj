@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Programas')

@section('content_header')
    <h1>Programa - {{$grupo->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$grupo->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$grupo->description}}</textarea>
                </div>

                
                <div class="form-group">
                    <label for="end">Eje</label>
                    <input type="text" class="form-control" name="eje" aria-describedby="eje"  value="{{App\Models\Eje::find($grupo->eje_id) != null ? App\Models\Eje::find($grupo->eje_id)->name : ""}}" readonly>
                </div>
                
                <div class="form-group">
                    <label for="user_id">Responsables</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($grupo->users)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$user->id}}">
                                        {{$user->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>


                <div class="form-group">
                    <a href="{{route('admin.grupos.edit', $grupo)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.grupos.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.grupos.destroy', $grupo)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


