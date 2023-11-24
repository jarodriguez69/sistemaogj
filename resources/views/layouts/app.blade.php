<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oficina de Gesti&oacute;n Judicial</title>
        <link rel="shortcut icon" href="http://sistemaogj.info/favicons/favicon.ico">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <!-- Styles -->
        <style>
            /*! normalize.css v8.0.1 | MIT License | github.com/necolas/normalize.css */html{line-height:1.15;-webkit-text-size-adjust:100%}body{margin:0}a{background-color:transparent}[hidden]{display:none}html{font-family:system-ui,-apple-system,BlinkMacSystemFont,Segoe UI,Roboto,Helvetica Neue,Arial,Noto Sans,sans-serif,Apple Color Emoji,Segoe UI Emoji,Segoe UI Symbol,Noto Color Emoji;line-height:1.5}*,:after,:before{box-sizing:border-box;border:0 solid #e2e8f0}a{color:inherit;text-decoration:inherit}svg,video{display:block;vertical-align:middle}video{max-width:100%;height:auto}.bg-white{--bg-opacity:1;background-color:#fff;background-color:rgba(255,255,255,var(--bg-opacity))}.bg-gray-100{--bg-opacity:1;background-color:#f7fafc;background-color:rgba(247,250,252,var(--bg-opacity))}.border-gray-200{--border-opacity:1;border-color:#edf2f7;border-color:rgba(237,242,247,var(--border-opacity))}.border-t{border-top-width:1px}.flex{display:flex}.grid{display:grid}.hidden{display:none}.items-center{align-items:center}.justify-center{justify-content:center}.font-semibold{font-weight:600}.h-5{height:1.25rem}.h-8{height:2rem}.h-16{height:4rem}.text-sm{font-size:.875rem}.text-lg{font-size:1.125rem}.leading-7{line-height:1.75rem}.mx-auto{margin-left:auto;margin-right:auto}.ml-1{margin-left:.25rem}.mt-2{margin-top:.5rem}.mr-2{margin-right:.5rem}.ml-2{margin-left:.5rem}.mt-4{margin-top:1rem}.ml-4{margin-left:1rem}.mt-8{margin-top:2rem}.ml-12{margin-left:3rem}.-mt-px{margin-top:-1px}.max-w-6xl{max-width:72rem}.min-h-screen{min-height:100vh}.overflow-hidden{overflow:hidden}.p-6{padding:1.5rem}.py-4{padding-top:1rem;padding-bottom:1rem}.px-6{padding-left:1.5rem;padding-right:1.5rem}.pt-8{padding-top:2rem}.fixed{position:fixed}.relative{position:relative}.top-0{top:0}.right-0{right:0}.shadow{box-shadow:0 1px 3px 0 rgba(0,0,0,.1),0 1px 2px 0 rgba(0,0,0,.06)}.text-center{text-align:center}.text-gray-200{--text-opacity:1;color:#edf2f7;color:rgba(237,242,247,var(--text-opacity))}.text-gray-300{--text-opacity:1;color:#e2e8f0;color:rgba(226,232,240,var(--text-opacity))}.text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.text-gray-500{--text-opacity:1;color:#a0aec0;color:rgba(160,174,192,var(--text-opacity))}.text-gray-600{--text-opacity:1;color:#718096;color:rgba(113,128,150,var(--text-opacity))}.text-gray-700{--text-opacity:1;color:#4a5568;color:rgba(74,85,104,var(--text-opacity))}.text-gray-900{--text-opacity:1;color:#1a202c;color:rgba(26,32,44,var(--text-opacity))}.underline{text-decoration:underline}.antialiased{-webkit-font-smoothing:antialiased;-moz-osx-font-smoothing:grayscale}.w-5{width:1.25rem}.w-8{width:2rem}.w-auto{width:auto}.grid-cols-1{grid-template-columns:repeat(1,minmax(0,1fr))}@media (min-width:640px){.sm\:rounded-lg{border-radius:.5rem}.sm\:block{display:block}.sm\:items-center{align-items:center}.sm\:justify-start{justify-content:flex-start}.sm\:justify-between{justify-content:space-between}.sm\:h-20{height:5rem}.sm\:ml-0{margin-left:0}.sm\:px-6{padding-left:1.5rem;padding-right:1.5rem}.sm\:pt-0{padding-top:0}.sm\:text-left{text-align:left}.sm\:text-right{text-align:right}}@media (min-width:768px){.md\:border-t-0{border-top-width:0}.md\:border-l{border-left-width:1px}.md\:grid-cols-2{grid-template-columns:repeat(2,minmax(0,1fr))}}@media (min-width:1024px){.lg\:px-8{padding-left:2rem;padding-right:2rem}}@media (prefers-color-scheme:dark){.dark\:bg-gray-800{--bg-opacity:1;background-color:#2d3748;background-color:rgba(45,55,72,var(--bg-opacity))}.dark\:bg-gray-900{--bg-opacity:1;background-color:#1a202c;background-color:rgba(26,32,44,var(--bg-opacity))}.dark\:border-gray-700{--border-opacity:1;border-color:#4a5568;border-color:rgba(74,85,104,var(--border-opacity))}.dark\:text-white{--text-opacity:1;color:#fff;color:rgba(255,255,255,var(--text-opacity))}.dark\:text-gray-400{--text-opacity:1;color:#cbd5e0;color:rgba(203,213,224,var(--text-opacity))}.dark\:text-gray-500{--tw-text-opacity:1;color:#6b7280;color:rgba(107,114,128,var(--tw-text-opacity))}}
        </style>

        <style>
            body {
                font-family: 'Nunito', sans-serif;
            }
        </style>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
    </head>
    
    <body class="antialiased" style="max-height: 100%;">
        
        
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="{{route('home.welcome')}}">
                <img src="logohome.png" alt="">
            </a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
              <span class="navbar-toggler-icon"></span>
            </button>
          
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
                <ul class="navbar-nav mr-auto">
                
                    <li class="nav-item active">
                        <a class="nav-link " href="{{route('home.welcome')}}">Novedades <span class="sr-only">(current)</span></a>
                    </li>
                    @can('admin.home')
                        <li class="nav-item">
                            <a class="nav-link" href="https://sites.google.com/view/gestion-documental-ogj-2019/sgc-4-o" target="_blank">Documentaci&oacute;n del SGC</a>
                        </li>
                    @endcan
                    @can('admin.home')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home.registros')}}">Registros</a>
                        </li>
                    @endcan
                    @can('admin.home')
                        <li class="nav-item">
                            <a target="_blank" class="nav-link" href="{{route('admin.tareas.createnc')}}"><strong>No Conformidades</strong></a>
                        </li>
                    @endcan
                    @can('admin.home')
                        <li class="nav-item">
                            <a target="_blank" class="nav-link" href="https://docs.google.com/forms/d/e/1FAIpQLScPgF94K0igcsRatIn-4ZNWJ0y5ZOTw60KlFLus8UsmmP3m6Q/viewform"><strong>Propuestas del Equipo</strong></a>
                        </li>
                    @endcan
                    @can('admin.home')
                        <li class="nav-item">
                            <a class="nav-link" href="{{route('home.formularios')}}">Formularios para Descargar</a>
                        </li>
                    @endcan
                    @can('admin.home')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Resultados e Indicadores
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="https://docs.google.com/spreadsheets/d/1ruv2dVaV8ui7ENrdZvTVmoqdTqEG7nww/edit#gid=1303784504" target="_blank">Resultados Históricos 2014-2021</a>
                            <a class="dropdown-item" href="https://drive.google.com/drive/folders/13wvfOAfkhFZWMmaWVyVOKxT7LPioFl5d" target="_blank">Resultados 2019</a>
                            <a class="dropdown-item" href="https://datastudio.google.com/reporting/626f431b-cf4e-4f7a-b570-73373f211247/page/TB3dB" target="_blank">Resultados 2020</a>
                            <a class="dropdown-item" href="https://datastudio.google.com/reporting/140b9e6a-b3d2-4cd7-813e-f761568417da/page/TB3dB" target="_blank">Resultados 2021</a>
                            <a class="dropdown-item" href="https://datastudio.google.com/reporting/140b9e6a-b3d2-4cd7-813e-f761568417da/page/TB3dB" target="_blank">Resultados 2022</a>
                            <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="http://sistemaogj.info/admin" target="_blank">Resultados Parciales 2023</a> -->
                            </div>
                        </li>
                    @endcan
                    @can('admin.home')
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            Certificados
                            </a>
                            <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="iram-2022.pdf" target="_blank">IRAM - 2022</a>
                            <a class="dropdown-item" href="iqnet-2022.pdf" target="_blank">IQ Net - 2022 </a>
                            <a class="dropdown-item" href="certificadoesp.pdf" target="_blank">IRAM - 2021</a>
                            <a class="dropdown-item" href="certificadoeng.pdf" target="_blank">IQ Net - 2021 </a>
                            <div class="dropdown-divider"></div>
                                <!-- <a class="dropdown-item" href="http://sistemaogj.info/admin" target="_blank">Resultados Parciales 2023</a> -->
                            </div>
                        </li>
                    @endcan

                    @if (Route::has('login'))
                            @auth
                                @can('admin.home')
                                    <li class="nav-item">
                                        <a href="{{ url('/admin') }}" class="nav-link">Gestor de Proyectos</a>    
                                    </li>
                                @endcan

                                <li class="nav-item">
                                    <a class="nav-link" href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                        Salir
                                    </a>
                                    <form id="logout-form" action="{{ url('/logout') }}" method="POST" style="display: none;"> 
                                        @csrf
                                    </form>
                                </li>
                            @else
                                <li class="nav-item">
                                    <a href="{{ route('login') }}" class="nav-link">Iniciar Sesi&oacute;n</a>
                                </li>
                                
                                @if (Route::has('register'))
                                    <li class="nav-item">
                                        <a href="{{ route('register') }}" class="nav-link">Registrar</a>
                                    </li>
                                @endif
                            @endauth
                    @endif
                    <li class="nav-item">
                        <a class="nav-link " href="{{route('home.unidadesiso')}}">Unidades ISO</a>
                    </li>
              </ul>
             
            </div>
        </nav>



        @yield('content')

       
    </body>
    
    <footer class="footer">
        <div class="ml-4 text-sm text-gray-500 sm:text-right sm:ml-0">
            Sistema de Gestión OGJ {{ Illuminate\Foundation\Application::VERSION }} (PHP v{{ PHP_VERSION }})
        </div>
      </footer>



</html>
