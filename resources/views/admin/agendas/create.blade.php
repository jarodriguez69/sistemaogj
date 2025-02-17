@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Agenda')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Crear Contacto</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.agendas.store')}}" method="POST">
                @csrf
                <div class="form-group">
                    <label for="name">Contacto</label>
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
                    <label for="email">Correo</label>
                    <input type="text" class="form-control" name="email" id="email" aria-describedby="email" placeholder="Ingrese Correo" value={{old('email')}}>
                    @error('email')
                        <small id="emailHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="cellphone">Celular</label>
                    <input type="number" class="form-control" name="cellphone" id="cellphone" aria-describedby="cellphone" placeholder="Ingrese Celular" value={{old('cellphone')}}>
                    @error('cellphone')
                        <small id="cellphoneHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="phone">Tel&eacute;fono</label>
                    <input type="number" class="form-control" name="phone" id="phone" aria-describedby="phone" placeholder="Ingrese Teléfono" value={{old('phone')}}>
                    @error('phone')
                        <small id="phoneHelp" class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.agendas.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


