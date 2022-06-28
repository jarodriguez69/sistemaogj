@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Alertas')
@section('plugins.Datatables', true)


@section('content_header')
    <h1>Editar Alerta</h1>
@endsection

@section('content')
@if(session('info'))
<div class="alert alert-success alert-dismissible">
    <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
    <strong>{{session('info')}}</strong>
</div>
@endif
    <div class="card">
        <div class="card-body">
            
           

           <form id="form-submit" action="{{route('admin.alertas.update', $alerta)}}" method="post" enctype="multipart/form-data">
            @csrf
            @method('put')
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$alerta->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="10" placeholder="Ingrese Descripción">{{old('description',$alerta->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>
                <div class="form-group">
                    <label for="days">D&iacute;as</label>
                    <input type="number" class="form-control" id="days" name="days" aria-describedby="days" placeholder="D&iacute;as Antes" value="{{old('days', $alerta->days)}}">
                    
                    @error('days')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{old('end', $alerta->end != null ? date('Y-m-d', strtotime($alerta->end)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

               

                <div class="form-group">
                    <label for="user_id">Usuarios</label>
                        @foreach ($users as $user)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$user->id}}" name="users[]" value="{{$user->id}}" {{ in_array($user->id, collect($alerta->users)->pluck('id')->toArray()) ? "checked":""}}>
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

