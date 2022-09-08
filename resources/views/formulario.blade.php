@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
      <div class="card mb-3">
        <img class="card-img-top" src="logo-OGJ-2019.jpg" alt="Card image cap">
        <a href="certificadoesp.pdf" target="_blank"><img src="logoiso.png" title="IRAM" width="10%" style="position:absolute; z-index: 1; right: 60px; bottom: -5px;"></a>
        <a href="certificadoeng.pdf" target="_blank"><img src="logoisoeng.png" title="IQNET" width="7%" style="position:absolute; z-index: 1; right: 0px; bottom: 0px;"></a>
      </div>
        

        <div class="card-body">
          <h5 class="card-title">Formularios para Descargar</h5>
          <p class="card-text">Instrucciones <br>
            1. Buscar el formulario que necesita en el listado.<br>
            2. Descargar y completar.<br>
            3. Guardar en su PC o Drive.<br>
            4. Adjuntar a la Tarea dentro del Proyecto que corresponde.</p>
          <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>

    <table class="table">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th scope="col">OPCIÓN</th>
            <th scope="col">DESCRIPCIÓN</th>
          </tr>
        </thead>
        <tbody>
          <label for="" style="display: none">{{$i=0}}</label>
            @foreach ($formularios as $formulario)
                <tr>
                  <th scope="row">{{$i = $i+1}}</th>
                    <td><a href="{{$formulario->url}}" target="_blank">{{$formulario->name}}</a></td>
                    <td>{{$formulario->description}}</td>
                    
                </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection

