@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Objetivos')

@section('content_header')
    <h1>Objetivo - {{$objetivo->name}}</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{$objetivo->name}}" readonly>
                </div>

                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" readonly>{{$objetivo->description}}</textarea>
                </div>

                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="text" class="form-control" id="begin" name="begin" aria-describedby="begin" value="{{$objetivo->begin != null ? date('Y-m-d', strtotime($objetivo->begin)):""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="text" class="form-control" name="end" aria-describedby="end" value="{{$objetivo->end != null ? date('Y-m-d', strtotime($objetivo->end)):""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="end">Planificaci&oacute;n Operativa</label>
                    <input type="text" class="form-control" name="operativa" aria-describedby="operativa"  value="{{App\Models\Operativa::find($objetivo->operativa_id) != null ? App\Models\Operativa::find($objetivo->operativa_id)->name : ""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Tipo</label>
                    <input type="text" class="form-control" name="tipoobjetivo_id" aria-describedby="tipoobjetivo_id" value="{{App\Models\TipoObjetivo::find($objetivo->tipoobjetivo_id) != null ? App\Models\TipoObjetivo::find($objetivo->tipoobjetivo_id)->name : ""}}" readonly>
                </div>


                <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="number" class="form-control" name="meta" aria-describedby="meta" value="{{$objetivo->meta}}" readonly>
                </div>

                <div class="form-group">
                    <label for="end">Estado</label>
                    <input type="text" class="form-control" name="estado" aria-describedby="estado" value="{{App\Models\EstadoObjetivo::find($objetivo->estadoobjetivo_id) != null ? App\Models\EstadoObjetivo::find($objetivo->estadoobjetivo_id)->name : ""}}" readonly>
                </div>
                <div class="form-group">
                    <label for="user">Responsable</label>
                    <input type="text" class="form-control" name="user" aria-describedby="user" value="{{App\Models\User::find($objetivo->user_id) != null ? App\Models\User::find($objetivo->user_id)->name : ""}}" readonly>
                </div>

                <div class="form-group">
                    <label for="desarrollos">ODS</label>
                        @foreach ($odses as $ods)
                                <div class="form-check">
                                    <input disabled class="form-check-input" type="checkbox" id="flexCheckDefault{{$ods->id}}"  value="{{$ods->id}}" {{ in_array($ods->id, collect($objetivo->desarrollos)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$ods->id}}">
                                        {{$ods->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>
                <div class="form-group">
                    <a href="{{route('admin.objetivos.edit', $objetivo)}}" class="btn btn-primary">Editar</a>
                    <a href="{{route('admin.objetivos.index')}}" class="btn btn-danger">Volver</a>
                </div>
                <form action="{{route('admin.objetivos.destroy', $objetivo)}}" method="POST">
                    @csrf
                    @method("delete")
                    <button type="submit">Eliminar</button>
                </form>
        </div>
    </div> 
@endsection 


{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


