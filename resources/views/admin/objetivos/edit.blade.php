@extends('adminlte::page')
@section('title', 'Oficina de Gestión Judicial | Objetivos')
@section('plugins.Datatables', true)

@section('content_header')
    <h1>Editar Objetivo</h1>
@endsection

@section('content')
    
    <div class="card">
        <div class="card-body">
           <form action="{{route('admin.objetivos.update', $objetivo)}}" method="post">
            @csrf
            @method('put')
            {{-- <input type="hidden" name="enabled" value="{{$objetivo->enabled}}"> --}}
                <div class="form-group">
                    <label for="name">Nombre</label>
                    <input type="text" class="form-control" name="name" aria-describedby="name" placeholder="Ingrese Nombre" value="{{old('name',$objetivo->name)}}">
                    @error('name')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="description">Descripci&oacute;n</label>
                    <textarea name="description" class="form-control" cols="30" rows="5" placeholder="Ingrese Descripción">{{old('description',$objetivo->description)}}</textarea>
                    @error('description')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="begin">Inicio</label>
                    <input type="date" class="form-control" id="begin" name="begin" aria-describedby="begin" placeholder="Fecha de Inicio" value="{{old('begin', $objetivo->begin != null ? date('Y-m-d', strtotime($objetivo->begin)) : "")}}">
                    
                    @error('begin')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="end">Fin</label>
                    <input type="date" class="form-control" name="end" aria-describedby="end" placeholder="Fecha de Fin" value="{{old('end', $objetivo->end != null ? date('Y-m-d', strtotime($objetivo->end)) : "")}}">
                    @error('end')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="operativa_id">Planificaci&oacute;n Operativa</label>
                    <select class="form-control" name="operativa_id">
                        
                        @foreach ($operativas as $operativa)
                            <option value="{{$operativa->id}}" {{$objetivo->operativa_id==$operativa->id ? "selected" : ""}}>{{$operativa->name}}</option>
                        @endforeach
                    </select>
                    @error('operativa_id')
                    <small id="operativaid" class="form-text text-danger">*{{$message}}</small>    
                @enderror
                </div>

                <div class="form-group">
                    <label for="tipoobjetivo_id">Tipo</label>
                    <select class="form-control" name="tipoobjetivo_id">
                        
                        @foreach ($tipos as $tipo)
                            <option value="{{$tipo->id}}" {{$objetivo->tipo_id==$tipo->id ? "selected" : ""}}>{{$tipo->name}}</option>
                        @endforeach
                    </select>
                    @error('tipoobjetivo_id')
                    <small id="tipoobjetivo_id" class="form-text text-danger">*{{$message}}</small>    
                @enderror
                </div>

                <div class="form-group">
                    <label for="meta">Meta</label>
                    <input type="number" class="form-control" name="meta" aria-describedby="meta" placeholder="Ingrese Meta" value="{{old('meta',$objetivo->meta)}}">
                    @error('meta')
                        <small class="form-text text-danger">*{{$message}}</small>    
                    @enderror
                </div>

                <div class="form-group">
                    <label for="esporcentaje">¿Es Porcentaje?</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="esporcentaje" id="esporcentajesi" value="1" {{$objetivo->esporcentaje==true ? "checked":""}}>
                        <label class="form-check-label" for="flexRadioDefault1">
                          Si
                        </label>
                      </div>
                      <div class="form-check">
                        <input class="form-check-input" type="radio" name="esporcentaje" id="esporcentajeno" value="0" {{$objetivo->esporcentaje==false ? "checked":""}}>
                        <label class="form-check-label" for="flexRadioDefault2">
                          No
                        </label>
                      </div>
                </div>

                <div class="form-group">
                    <label for="estadoobjetivo_id">Estado</label>
                    <select class="form-control" name="estadoobjetivo_id">
                      
                        @foreach ($estados as $estado)
                            <option value="{{$estado->id}}" {{$objetivo->estadoobjetivo_id==$estado->id ? "selected" : ""}}>{{$estado->name}}</option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="user_id">Responsable</label>
                    <select class="form-control" name="user_id">
                      
                        @foreach ($users as $user)
                            <option value="{{$user->id}}" {{$objetivo->user_id==$user->id ? "selected" : ""}}>{{$user->name}}</option>
                        @endforeach
                    </select>
                </div>

                
                <div class="form-group">
                    <label for="desarrollos">ODS</label>
                        @foreach ($odses as $ods)
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="flexCheckDefault{{$ods->id}}" name="desarrollos[]" value="{{$ods->id}}" {{ in_array($ods->id, collect($objetivo->desarrollos)->pluck('id')->toArray()) ? "checked":""}}>
                                    <label class="form-check-label" for="flexCheckDefault{{$ods->id}}">
                                        {{$ods->name}}
                                    </label>
                                </div>
                        @endforeach
                </div>


                <div class="form-group">
                    <input type="button" class="btn btn-primary" value="Guardar" onclick="this.disabled=true; this.value='Guardando...'; this.form.submit()" />
                    <a href="{{route('admin.objetivos.index')}}" class="btn btn-danger">Cancelar</a>
                </div>
            </form>
        </div>
    </div> 
@endsection 







{{-- <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet"> --}}


