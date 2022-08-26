@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Agenda')

@section('content_header')
    <h1>Contacto - {{$agenda->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Contacto</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$agenda->name}}" readonly>
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" readonly>{{$agenda->description}}</textarea>
                </div>
                <div class="form-group">
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" name="email" id="email" value="{{$agenda->email}}" readonly>
                </div>
                <div class="form-group">
                    <label for="cellphone">Celular</label>
                    <input type="text" class="form-control" name="cellphone" id="cellphone" value="{{$agenda->cellphone}}" readonly>
                </div>
                <div class="form-group">
                    <label for="phone">Tel&eacute;fono</label>
                    <input type="text" class="form-control" name="phone" id="phone" value="{{$agenda->phone}}" readonly>
                </div>
                <div class="form-group">
                    <a href="{{route('admin.agendas.edit', $agenda)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.agendas.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.agendas.destroy', $agenda)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


