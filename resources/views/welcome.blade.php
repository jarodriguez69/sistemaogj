@extends('layouts.app')

@section('content')
<div class="container">
    <div class="card mb-3">
        <img class="card-img-top" src="logo-OGJ-2019.jpg" alt="Card image cap">
    </div>

    @if (Route::has('login'))
        @auth
        <div class="d-grid gap-2 d-md-flex justify-content-md-end">
            <a href="https://drive.google.com/drive/folders/1kOWEzEMnqIXt25fCzrMOikPYQ56JRLH3" target="_blank" class="btn btn-primary me-md-2">Oficinas de Gesti&oacute;n Asociada</a>
            <a href="https://docs.google.com/spreadsheets/d/1vE23HvN8RIjJoaIZKsAYqxswxPxGAxAl/edit?usp=sharing&ouid=107937385033588463714&rtpof=true&sd=true" target="_blank" class="btn btn-secondary">Planificaci&oacute;n de Gesti&oacute;n Asociada</a>
        </div>
        @endauth
    @endif
    <br>
    <div class="card">
        <div class="card-body" style="text-align: justify;">
            <h2><strong>POLÍTICA DE CALIDAD</strong></h2>
            <p>La Oficina de Gestión Judicial tiene como misión mejorar la gestión de los diversos órganos del Poder Judicial de la Provincia de Tucumán mediante la implementación de políticas judiciales establecidas por la Excma. Corte.</p>
            <p>La Oficina de Gestión Judicial manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento.</p>
    
    
    
            <p>En este marco, la Coordinación de la Oficina de Gestión Judicial se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la OGJ en base a procesos.</p>
            
            
            
            <h2><strong> OBJETIVOS DE CALIDAD</strong><a target="_blank" href="https://docs.google.com/document/d/1brymCVzHZXBDuYOR6p5dPvC2N1k58mmP/edit?usp=sharing&ouid=115910062807870671157&rtpof=true&sd=true" style="font-size: small; font-weight: bold;"> (Minuta de aprobación) </a>  </h2>  
            <ol>
                <li>Implementar y mantener el sistema de gestión de calidad ISO 9001:2015.</li>
                <li>Incorporar la medición de la satisfacción de los usuarios de los proyectos.</li>
                <li>Lograr la satisfacción de los usuarios de los proyectos con medición de satisfacción.</li>
                <li>Lograr la aprobación del SGC de las Unidades Judiciales del PJT que participan de la implementación de la Norma ISO 9001:2015 bajo la coordinación, asistencia técnica y asesoramiento de la OGJ.</li>
                <li>Implementar planes de mejora en unidades no penales del PJT - *Abarca la implementación de PO, Asistencias y Control de Procesos para la mejora de unidades del PJT*.</li>
                <li>Incorporar el monitoreo y control de los edictos publicados en el Boletín Oficial Judicial conforme a los plazos definidos.</li>
                <li>Medir el clima laboral dentro de los plazos establecidos (para las unidades que corresponda**)</li>
                <li>Planificar y realizar las auditorías internas a las Unidades Judiciales del PJT que cumplan los requisitos dentro de los plazos establecidos.</li>
            </ol>
            ** Unidades certificadas que aceptaron la medición de clima laboral.
           
        </div>

        <div class="card-body" style="text-align: center;">
        <a target="_blank" href="https://sites.google.com/view/odsoficina-de-gestion-judicial/inicio?authuser=1">
            <img src="ods-circular.jpg" alt="" style="max-width: 70%;">
        </a>   
        </div>

        @if (Route::has('login'))
            @auth
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
            @endauth
        @endif
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