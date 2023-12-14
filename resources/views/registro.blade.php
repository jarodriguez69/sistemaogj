@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
      <div class="card mb-3">
        <img class="card-img-top" src="logo-OGJ-2019.jpg" alt="Card image cap">
          <!-- <img src="logoiso.png" title="IRAM" width="10%" style=" position: absolute; z-index: 1; right: 7%;bottom: 0%;height: 40%;width: 7%;">
          <img src="logoisoeng.png" title="IQNET" width="7%" style="position:absolute; z-index: 1; right: 0px; bottom: 0px;">-->
      </div> 
        <div class="card-body">
          <h5 class="card-title">Registros</h5>
          <p class="card-text">Instrucciones <br>
            Seleccione el botón que desee para continuar:</p>
          <p class="card-text"><small class="text-muted"></small></p>
        </div>
    </div>

    <h2>Registros Vigentes</h2>
    <div class="row">
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
            
              @foreach ($registros->where("enabled",1) as $registro)
                  <tr>

                      <th scope="row">{{$i = $i+1}}</th>
                      <td><a href="{{$registro->url}}" target="_blank">{{$registro->name}}</a></td>
                      <td>{{$registro->description}}</td>
                  </tr>
              @endforeach
          </tbody>
      </table>
    </div>
    
<h2>Registros Obsoletos</h2>
    <div class="row">
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
            
              @foreach ($registros->where("enabled",0) as $registro)
                  <tr>

                      <th scope="row">{{$i = $i+1}}</th>
                      <td><a href="{{$registro->url}}" target="_blank">{{$registro->name}}</a></td>
                      <td>{{$registro->description}}</td>
                      
                  </tr>
              @endforeach
          </tbody>
      </table>
    </div>
   
    
</div>

@endsection






