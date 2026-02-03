@extends('layouts.app')

@section('content')
<style>
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #f8f9fa;
    }

    /* Hero */
    .hero {
        position: relative;
        background: url('{{ asset('palacio.jpg') }}') center/cover no-repeat;
        height: 70vh;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        text-align: center;
    }

    .hero::after {
        content: "";
        position: absolute;
        top: 0; left: 0; width: 100%; height: 100%;
        background: linear-gradient(rgba(0,0,0,0.4), rgba(0,0,0,0.6));
    }

    .hero-content {
        position: relative;
        z-index: 2;
    }

    .hero h1 {
        font-size: 3rem;
        font-weight: bold;
    }

    /* Botones */
    .btn-custom {
        background-color: #6c757d;
        border: none;
        color: white;
        padding: 12px 25px;
        font-size: 1rem;
        border-radius: 50px;
        transition: all 0.3s ease;
        margin: 5px;
    }

    .btn-custom:hover {
        background-color: #5a6268;
        transform: translateY(-2px);
    }

    /* Secciones */
    .section-title {
        font-size: 2rem;
        font-weight: bold;
        margin-bottom: 20px;
        color: #800000; /* Bordó */
    }

    .icon-box {
        text-align: center;
        padding: 20px;
        background: white;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
        height: 100%;
    }

    .icon-box:hover {
        transform: translateY(-5px);
    }

    .icon-box i {
        font-size: 40px;
        color: #800000;
        margin-bottom: 10px;
    }

    /* Tarjetas */
    .card-custom {
        border: none;
        border-radius: 10px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .card-custom:hover {
        transform: translateY(-5px);
    }

    .ods-img {
        max-width: 100%;
        display: block;
        margin: auto;
    }
</style>

<!-- Hero -->
<div class="hero">
    <div class="hero-content">
        <h1>Oficina de Gestión Judicial</h1>
        <p class="mb-4">Excma. Corte Suprema de Justicia de Tucumán</p>
        @if (Route::has('login'))
            @auth
                <div class="d-flex flex-wrap justify-content-center gap-2">
                    <a href="https://sgp.justucuman.gov.ar" target="_blank" class="btn btn-custom">Plan Estratégico CSJT</a>
                    <a href="https://drive.google.com/drive/folders/1kOWEzEMnqIXt25fCzrMOikPYQ56JRLH3" target="_blank" class="btn btn-custom">OGAS</a>
                    <a href="https://docs.google.com/spreadsheets/d/1TmD0Z4sbirdefI-7deqOP7jFINfT-P-o89x4a7gVP5E/edit?gid=1677287769#gid=1677287769" target="_blank" class="btn btn-custom">Planificación OGAS</a>
                    <a href="https://sites.google.com/view/ofijus/etapa-seguimiento" target="_blank" class="btn btn-custom">Site OGAS</a>
                    <a href="https://drive.google.com/drive/folders/1GxFw5MkKl1FkV3Hlf643oR5p3FqzATvO" target="_blank" class="btn btn-custom">Personal OGAS</a>
                    <a href="https://drive.google.com/drive/folders/1jLJe7-dhnIaTz27p0-oNfEl7FJozlLZ4?usp=sharing" target="_blank" class="btn btn-custom">SGC Integrado CSJT</a>
                    <a href="https://app.powerbi.com/groups/19255cfa-f357-4814-abc3-4264df70355f/reports/4f15daf3-90ef-4576-a0ef-4afdfa79a753/ReportSection" target="_blank" class="btn btn-custom">Tableros</a>
                    <a href="https://drive.google.com/drive/folders/1WbgO2A8KWs-xcBkTCUaO6d7Z8pHXUKIX?usp=sharing" target="_blank" class="btn btn-custom">Manuales OGA</a>
                    <a href="https://docs.google.com/spreadsheets/d/1axgQgm9U-lUN81V4Fi7NGa6E2XfmLgX-A49BCBFBcgw/edit?usp=sharing" target="_blank" class="btn btn-custom">Coordinadores OGA</a>
                </div>
            @endauth
        @endif
    </div>
</div>

<div class="container py-5">

    <!-- Misión, Visión, Política -->
    <div class="row text-center mb-5">
        <div class="col-md-4">
            <div class="icon-box" id="mision">
                <i class="fas fa-balance-scale"></i>
                <h4>Misión</h4>
                <p>La Oficina de Gestión Judicial tiene como misión mejorar la gestión de los diversos órganos del Poder Judicial de la Provincia de Tucumán mediante la implementación de políticas judiciales establecidas por la Excma. Corte y coordinar el funcionamiento de las Oficinas de Gestión Asociada de todos los fueros y Centros Judiciales.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box" id="vision">
                <i class="fas fa-eye"></i>
                <h4>Visión</h4>
                <p>Ser en 2030 un organismo líder en implementación de políticas judiciales a nivel nacional y de referencia internacional, reconocido por su compromiso con la innovación y la generación de herramientas que aporten al logro de un servicio de justicia oportuno, eficaz y transparente.</p>
            </div>
        </div>
        <div class="col-md-4">
            <div class="icon-box" id="politica">
                <i class="fa-solid fa-heart"></i>
                <h4>Valores</h4>
                <ul style="text-align: justify;">
                    <li>Compromiso</li>
                    <li>Trabajo en equipo</li>
                    <li>Aprendizaje continuo</li>
                    <li>Respeto</li>
                    <li>Honestidad</li>
                    <li>Empatia</li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Valores y Objetivos -->
    
    <div class="row g-4">
        <div class="col-md-12">
            <div class="icon-box">
                <i class="fas fa-gavel"></i>
                <h4>Política de la Calidad</h4>
                <p>La Oficina de Gestión Judicial tiene como misión mejorar la gestión de los diversos órganos del Poder Judicial de la Provincia de Tucumán mediante la implementación de políticas judiciales establecidas por la Excma. Corte y  coordinar el funcionamiento de las Oficinas de Gestión Asociada de todos los fueros y Centros Judiciales.</p>
                <br>
                <p>La Oficina de Gestión Judicial manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento.</p>
                <br>
                <p>En este marco, la Coordinación de la Oficina de Gestión Judicial se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la OGJ en base a procesos.</p>
                <br>
            </div>
        </div>
    </div>
    <br>
    <div class="row g-4">
        <div class="col-md-6">
            <div class="icon-box">
                <i class="fa-solid fa-bullseye"></i>
                <h4>Objetivos de la Calidad</h4>
                <ol style="text-align: justify;">
                    <li>Mantener el sistema de gestión de calidad ISO 9001:2015.</li>
                    <li>Incorporar la medición de la satisfacción de los usuarios de los proyectos.</li>
                    <li>Lograr la satisfacción de los usuarios de los proyectos con medición de satisfacción.</li>
                    <li>Lograr la aprobación del SGC de las Unidades Judiciales del PJT que participan de la implementación de la Norma ISO 9001:2015 bajo la coordinación, asistencia técnica y asesoramiento de la OGJ.</li>
                    <li>Implementar planes de mejora en las unidades no penales del PJT- *Abarca la implementación de PO, Aistencias y Control de procesos para la mejora de unidades del PJT*.Abarca la implementación de planes de mejoras en las Unidades Judiciales.</li>
                    <li>Incorporar el monitoreo y control de los edictos publicados en el Boletín Oficial Judicial conforme a los plazos definidos.</li>
                    <li>Presentar propuestas de medición de clima laboral a todos las/os Titulares de las unidades que correspondan según lo establecido en el P04_05 Medición de Clima Laboral e implementacíon de Planes de Acción en Unidad del PJT.</li>
                    <li>Planificar y realizar las auditorías internas a las Unidades Judiciales del PJT que cumplan los requisitos dentro de los plazos establecidos.</li>
                    <li>Coordinar el funcionamiento de las Oficinas del PJT dependientes de la OGJ</li>
                    <li>Lograr el dictado de las providencias conforme a los plazos procesales</li>
                </ol>
                ** Unidades certificadas que aceptaron la medición de clima laboral.
            </div>
        </div>
        <div class="col-md-6">
            <div class="icon-box">
                <a target="_blank" href="https://sites.google.com/view/odsoficina-de-gestion-judicial/inicio?authuser=1">
                    <img src="ods-circular.jpg" alt="ODS" class="ods-img" style="margin-top: 15%;">
                </a>  
            </div>
        </div>
        
    </div>
    
    <br>
    <div class="row g-4">
        <div class="col-md-12">
            <div class="icon-box">
                <i class="fa-solid fa-certificate"></i>
                <h4>Certificados</h4>
                <div class="row justify-content-center">
                    <div class="col-auto">
                        <a href="ogj iram.pdf" class="download-icon text-center" target="_blank">
                        <i class="fa-solid fa-file-pdf"></i>
                        <p class="mt-2 mb-0 small">IRAM</p>
                        </a>
                    </div>
                    <div class="col-auto">
                        <a href="ogj iqnet.pdf" class="download-icon text-center" target="_blank">
                        <i class="fa-solid fa-file-pdf"></i>
                        <p class="mt-2 mb-0 small">IQNET</p>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br>
    <!-- Novedades -->
      @if (Route::has('login'))
            @auth        
                <h2 class="section-title text-center mb-4">Novedades</h2>
                <div class="row g-4">
                    @foreach ($blogs as $blog)
                        <div class="col-md-4">
                            <div class="card card-custom p-3">
                            <i class="fas fa-bullhorn"></i>
                            <div class="card-body">
                                <h5 class="card-title">{{$blog->name}}</h5>
                                <p class="card-text">{{$blog->description}}</p>
                                <footer class="blockquote-footer">Fecha: {{date('d/m/Y', strtotime($blog->created_at))}} <cite title="Source Title"> - OGJ</cite></footer>
                            </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            @endauth
        @endif


</div>

<!-- FontAwesome -->
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
@endsection
