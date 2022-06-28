@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="logo-OGJ-2019.jpg" alt="Card image cap">
            {{-- <object data="certificadoesp.pdf" type="application/PDF" width="850px" height="850px" align="right"></object> --}}
            <a href="certificadoesp.pdf" target="_blank"><img src="logoiso.png" title="IRAM" width="10%" style="position:absolute; z-index: 1; right: 60px; bottom: -5px;"></a>
            <a href="certificadoeng.pdf" target="_blank"><img src="logoisoeng.png" title="IQNET" width="7%" style="position:absolute; z-index: 1; right: 0px; bottom: 0px;"></a>
        {{-- <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div> --}}
    </div>

    <div class="card">
        <div class="card-body">
            <h2><strong>POLÍTICA DE CALIDAD</strong></h2>
            <p>La Oficina de Gestión Judicial tiene como misión mejorar la gestión de los diversos órganos del Poder Judicial de la Provincia de Tucumán mediante la implementación de políticas judiciales establecidas por la Excma. Corte.</p>
            <p>La Oficina de Gestión Judicial manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento.</p>
    
    
    
            <p>En este marco, la Coordinación de la Oficina de Gestión Judicial se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la OGJ en base a procesos.</p>
            
            
            
            <h2><strong> OBJETIVOS DE CALIDAD</strong></h2>
            
            <ol><li>Implementar y mantener el sistema de gestión de calidad ISO 9001:2015.</li><li>Incorporar la medición de la satisfacción de los usuarios en el 70% de los proyectos.</li><li>Lograr la satisfacción de los usuarios en el 70% de los proyectos con medición de satisfacción.</li></ol>
            
        </div>

        <div class="card-body">
            <h2><strong> NOVEDADES </strong></h2>
            @foreach ($blogs as $blog)
                <div class="card">
                    <div class="card-header" style="background-color: firebrick; color: white;">
                        {{$blog->name}}
                    </div>
                    <div class="card-body">
                        <blockquote class="blockquote mb-0" style="text-align: justify;">
                        <p>{{$blog->description}}</p>
                        <footer class="blockquote-footer">Fecha: {{date('d/m/Y', strtotime($blog->created_at))}} <cite title="Source Title"> - OGJ</cite></footer>
                        </blockquote>
                    </div>
                </div> <br>
            @endforeach

        </div>
    </div> 


   
</div>

@endsection

@section('content')
<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="logo-OGJ-2019.jpg" alt="Card image cap">
        {{-- <div class="card-body">
          <h5 class="card-title">Card title</h5>
          <p class="card-text">This is a wider card with supporting text below as a natural lead-in to additional content. This content is a little bit longer.</p>
          <p class="card-text"><small class="text-muted">Last updated 3 mins ago</small></p>
        </div> --}}
    </div>

    @foreach ($blogs as $blog)
        <div class="card">
            <div class="card-header">
                {{$blog->name}}
            </div>
            <div class="card-body">
                <blockquote class="blockquote mb-0">
                <p>{{$blog->description}}</p>
                <footer class="blockquote-footer">Fecha: {{date('d/m/Y', strtotime($blog->created_at))}} <cite title="Source Title"> - OGJ</cite></footer>
                </blockquote>
            </div>
        </div> <br>
    @endforeach
</div>

@endsection