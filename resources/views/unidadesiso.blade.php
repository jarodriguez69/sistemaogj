


<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Oficina de Gesti&oacute;n Judicial</title>
        <link rel="shortcut icon" href="http://sistemaogj.com/favicons/favicon.ico">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
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

      <div class="container">
        
      
        <div class="row">
          <div class="col-md-3"><img class="card-img-top" src="logo-corte-2019.png" alt="Card image cap"></div>
          <div class="col-md-6"><img class="card-img-top" src="cabecera.jpg" alt="Card image cap"></div>
          <div class="col-md-3"><img class="card-img-top" src="logo-ogj2.png" alt="Card image cap"></div>
        </div>
        <br />
        <table class="table table-bordered">
          <thead>
            <tr>
              <th scope="col" style="text-align:center">Unidades Certificadas</th>
              <th scope="col" style="text-align:center">Procesos Certificados</th>
            </tr>
          </thead>
          <tbody>
            <tr style="text-align:center">
              <td>35</td>
              <td>137</td>
            </tr>
          </tbody>
        </table>


          <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col" style="text-align: center;">UNIDAD</th>
                  <th scope="col" style="text-align: center;">CENTRO JUDICIAL</th>
                  <th scope="col" style="text-align: center;">POL&Iacute;TICA DE LA CALIDAD</th>
                  <th scope="col" style="text-align: center;">ALCANCE</th>
                  <th scope="col" style="text-align: center;">CERTIFICADOS</th>

                </tr>
              </thead>
              <tbody  style="text-align: justify;">
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td>CORTE SUPREMA DE JUSTICIA - PODER JUDICIAL DE TUCUMÁN</td>
                      <td>Capital</td>
                      <td>Administrar e impartir un servicio de justicia accesible y oportuno a toda la ciudadanía; velando por los derechos y garantías fundamentales consagrados en todo el ordenamiento jurídico vigente; fortaleciendo la calidad en los procesos de trabajo y el desarrollo del factor humano; para así garantizar la efectiva tutela judicial y aportar al mantenimiento de la paz social de nuestra provincia.</td>
                      <td>Diseño e implementación de políticas judiciales como soporte a los procesos jurisdiccionales para asegurar el acceso a justicia y garantizar la tutela judicial efectiva a los ciudadanos de los sub-alcances listados a continuación.</td>
                      <td style="text-align: center;"><a href="csjt iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="csjt iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td>Excma. Cámara en Documentos y Locaciones Salas I, II y III </td>
                      <td>Capital</td>
                      <td>La Cámara Civil en Documentos y Locaciones tiene como misión entender y resolver como Tribunal de Apelación en los recursos que se interponen contra las decisiones tomadas por los jueces de primera instancia en lo Civil en Documentos y Locaciones y los jueces de Cobros y Apremios del Centro Judicial Capital. Entiende, además, en las cuestiones de competencia que surgen entre los jueces de primera instancia, en las recusaciones e inhibiciones de sus propios vocales y en las recusaciones deducidas contra los jueces de primera instancia. Asimismo, resuelve en las regulaciones de honorarios, en los incidentes de nulidad y de caducidad de instancia y en las revocatorias por actuaciones cumplidas por ante ella misma como Tribunal originario. La Cámara Civil en Documentos y Locaciones  manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001/2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Cámara Civil en Documentos y Locaciones del Centro Judicial Capital se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios; y a la sistematización de las actividades de la organización en base a procesos.</td>
                      <td>Recepción de expedientes, escritos, oficios entre unidades jurisdiccionales, consultas, pagos, cédulas diligenciadas, dictámenes, informes, oficios provenientes de entidades externas al poder judicial, documentación original y expedientes a la vista. Recepción, control y devolución del Informe de la Dirección de Estadísticas de la Corte Suprema de Justicia de Tucumán.</td>
                      <td style="text-align: center;"><a href="camara documento capital iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">2</th> -->
                      <td>Excma. Cámara en lo Contencioso Administrativo - Sala 1</td>
                      <td>Capital</td>
                      <td>La Sala I de la Cámara en lo Contencioso Administrativo tiene como misión resolver los conflictos de naturaleza administrativa - tributaria, en un plazo razonable a través de un equipo de trabajo coordinado; empleando las herramientas provistas por el SAE y las características propias del expediente digital. Esta unidad manifiesta su compromiso con la Calidad respetando los estándares internacionales que exigen, a partir de la garantía de tutela judicial efectiva, que las decisiones sean dictadas en un tiempo razonable; empleando herramientas tendientes a que las controversias se diriman con celeridad e implementando un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, esta Sala se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los justiciables, ; a través de la sistematización de las actividades de la organización en base a procesos.</td>
                      <td>Confección y control de proyectos de sentencias definitivas e interlocutorias; firma, registro y notificación de dichas sentencias. Confección y control de proyectos de providencias simples; firma y notificación de dichas providencias. Recepción, control y devolución del Informe de la Dirección de Estadísticas de la Corte Suprema de Justicia de Tucumán.</td>
                      <td style="text-align: center;"><a href="camara contencioso iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">3</th> -->
                      <td>Excma. Cámara de Apelaciones en lo Civil en Documentos, Locaciones, Familia y Sucesiones.</td>
                      <td>Concepci&oacute;n</td>
                      <td>La Excma. Cámara en Doc. y Loc. Flia. y Suc. tiene como misión revisar, con motivo de recursos de apelación planteados, el contenido de las resoluciones judiciales dictadas por los Jueces de primera instancia de los fueros: Civil en Documentos y Locaciones, de Cobros y Apremios, en lo Civil en Familia y Sucesiones, tanto del Centro Judicial Concepción como del Centro Judicial Monteros, dentro de los plazos establecidos por el Código Procesal Civil y Comercial de Tucumán, (C.P.C.C.T.); también en las cuestiones de competencia entre los jueces de primera instancia; en las recusaciones o inhibiciones de sus propios miembros; a través del trabajo en equipo, brindando un servicio de justicia eficaz y transparente para los usuarios. La Excma. Cámara en Doc. y Loc. Flia. y Suc. manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, siendo promotores de la gestión judicial, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Excma. Cámara en Doc. y Loc. Flia. y Suc. se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la Excma. Cámara en Doc. y Loc. Flia. y Suc. en base a procesos, procurando su optimización.</td>
                      <td>Atención al Público. Recepción de expedientes, escritos y otras actuaciones (cédulas, oficios, informes, documentación original, notas, pagos, licencias de abogados). Confección de proyectos de providencias simples, decretos, sentencias definitivas e interlocutorias. Asignación para control y firma de proyectos de providencias simples, decretos y sentencias definitivas e interlocutorias. Protocolización y registro de protocolos de sentencias definitivas e interlocutorias. Preparación, toma de audiencia y dictado de resoluciones en audiencia. Confección y envío de cédulas, oficios, mandamientos, elevación de expedientes a la Corte, Devolución de expedientes a origen.</td>
                      <td style="text-align: center;"><a href="camara doc flia concepcion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">3</th> -->
                      <td>Excma. Cámara en lo Civil y Comercial Común.</td>
                      <td>Concepci&oacute;n</td>
                      <td>La Cámara de Apelaciones en lo Civil y Comercial Común Sala I y II del Centro Judicial de Concepción tiene como misión asumir el compromiso de resolver  los asuntos de su competencia civil y comercial (arts. 46, 84, 85 inc. 3, 86 y 889 LOT) conforme el ordenamiento jurídico, impartiendo justicia de manera celera, eficiente, oportuna y de calidad con miras a restaurar la paz social, el desarrollo sostenible, fortaleciendo el Estado de Derecho, pluralista, democrático, de manera indepndiente e imparcial.                                                                                        La Cámara de Apelaciones en lo Civil y Comercial Común Sala I y II del Centro Judicial de Concepción manifiesta su compromiso con la calidad mediante la implementación de un Sistema de Justicia de Calidad basado en la Norma Internacional ISO 9001:2015, conforme invitación de la Corte por Acordada 125/22, y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento.                                                                                                                    En este sentido, la Coordinación de la Cámara de Apelaciones en lo Civil y Comercial Común Sala I y II del Centro Judicial de Concepción se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y a atender los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción, a través de la sistematización de la organización de la Cámara en base a procesos.</td>
                      <td>Confección y control de proyectos de sentencias definitivas e interlocutorias, firma y registro de dichas sentencias. Confección y control de proyectos de providencias simples y firma de dichas providencias. Elevación de expedientes y documentación a la Excma. Corte Suprema de Justicia de Tucumán.</td>
                      <td style="text-align: center;"><a href="camara civil concepcion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">3</th> -->
                      <td>Tribunal De Impugnaci&oacute;n - Vocal&iacute;a 4 - DR. Maggio</td>
                      <td>Capital</td>
                      <td>El Tribunal de Impugnación TIP4 tiene como misión construir una unidad jurisdiccional que brinde respuestas útiles a los conflictos penales traídos a su conocimiento y emitir resoluciones que garanticen el debido proceso legal en resguardo de los principios y garantías constitucionales vigentes, a todos los habitantes de la provincia. Garantizar la máxima celeridad, en la prestación del servicio de justicia dentro del marco de la estructura pública,  a través de una herramienta de comunicación basada en la oralidad. El Tribunal de Impugnación TIP4 manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, el Vocal a cargo de la unidad jurisdiccional y el Equipo, se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y buscando respuestas útiles y ajustadas a derecho; a través de la emisión de sentencias orales claras y la sistematización de la organización del TIP4 en base a procesos accesibles y transparentes.</td>
                      <td>Análisis y resolución de legajos remitidos por OGA para su tratamiento o rechazo; atención a las partes. Preparación de proyectos de sentencias orales y realización de audiencias del tribunal de impugnación y colegio de jueces y juezas penales. Confección de proyectos de decretos, sentencias y comunicación de las resoluciones adoptadas.</td>
                      <td style="text-align: center;"><a href="impugnacion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">4</th> -->
                      <td>Juzgado Civil en Familia y Sucesiones de la IV Nominación</td>
                      <td>Capital</td>
                      <td>El Juzgado Civil en Familia y Sucesiones de la IVa. Nominación tiene como misión intervenir y buscar soluciones concretas en todos aquellos casos donde surjan conflictos en las relaciones de familias, en aquellos que intervengan niños, niñas y adolescentes o personas con capacidades restringidas así como también en los casos que se encuentren alcanzados en la ley de violencia familiar y de género; garantizando los derechos de las personas involucradas de acuerdo al ordenamiento jurídico provincial, nacional y a los tratados internacionales. La unidad manifiesta su compromiso con la calidad mediante la implementación de un Sistema de Gestión de la Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la magistrada y los funcionarios del Juzgado de Familia y Sucesiones de la IVa. Nominación se comprometen a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, los requerimientos pertinentes de los justiciables; y a la sistematización de las actividades de la organización en base a procesos.</td>
                      <td>Registración de sentencias pendientes. Confección, notificación y control de proyectos de sentencias definitivas e interlocutorias. Apertura del registro de protocolo. Control de informes de pendencias.</td>
                      <td style="text-align: center;"><a href="flia 4 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">6</th> -->
                      <td>Juzgado de Instrucción Conclusional 1</td>
                      <td>Capital</td>
                      <td>Este Juzgado de Instrucción  Conclusional tiene como misión finalizar todas las causas penales asignadas a esta oficina en el marco del denominado ""Período de Resolución de Causas Pendientes "", priorizando la resolución de causas establecidas en la ley para dar una respuesta eficaz a la sociedad. Esta oficina jurisdiccional manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, este juzgado se compromete a lograr el cumplimiento de los requisitos legales y reglamentarios y la satisfacción de los requisitos pertinentes de los usuarios.</td>
                      <td>Tramitación de escritos, expedientes y documentación en general. Dictado de decretos, resoluciones interlocutorias, sentencias y notificación de las mismas. Celebración de comparecencias. Registro de protocolo de sentencias.</td>
                      <td style="text-align: center;"><a href="instruccion conclusional 1 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">7</th> -->
                      <td>Juzgado de Instrucción Conclusional 2</td>
                      <td>Capital</td>
                      <td>Este Juzgado de Instrucción Conclusional 2 tiene como misión finalizar todas las causas penales asignadas a esta oficina en el marco del ""régimen conclusional de causas"", priorizando la resolución de causas establecidas en la ley para dar una respuesta eficaz a la sociedad. Esta oficina jurisdiccional manifiesta su compromiso con la calidad mediante la implementación de un sistema de gestión de calidad basado en los principios de la norma ISO 9001-2015 y la promoción de su mejora continua. En este marco, el Juzgado se compromete al cumplimiento de los requisitos legales y reglamentarios y la satisfacción de los requisitos pertinentes de los usuarios.</td>
                      <td>Recepción de escritos, expedientes y documentación en general. Realización de audiencias y otras comparecencias. Dictado de decretos y resoluciones. Registración y protocolización de resoluciones. Notificación de decretos y resoluciones y remisión de expedientes y comunicaciones.</td>
                      <td style="text-align: center;"><a href="instruccion conclusional 2 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">7</th> -->
                      <td>Juzgado del Trabajo III</td>
                      <td>Capital</td>
                      <td>El JT3 brinda un servicio de justicia eficiente, conocedor de las necesidades de calidad y expectativas de nuestros usuarios, agregando valor en cada una de las actividades a realizar. El JT3 manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento, con el propósito de llevar a cabo una justicia de calidad. En este marco, el JT3 se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios a través de la sistematización de la organización del JT3 en base a procesos.</td>
                      <td>Recepción de expedientes para la confección de sentencias definitivas. Confección y control de proyectos de sentencias definitivas y su firma. Confección y control de proyectos de providencias simples, firma y notificación. Control de proyectos de providencias simples confeccionados por la Oficina de Gestión Asociada del Trabajo N° 3 y su firma.</td>
                      <td style="text-align: center;"><a href="juzgado trabajo 3 capital iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">8</th> -->
                      <td>Juzgado Cobros y Apremios II Concepción</td>
                      <td>Concepci&oacute;n</td>
                      <td>El Juzgado de Cobros y Apremios II Nominación tiene como misión lograr eficacia, eficiencia y celeridad en los procesos de todas las causas que ingresan a esta unidad judicial respetando y asegurando los Derechos y Garantías de naturaleza contitucional y convencional. Nuestra oficina manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la dirección de la Oficina se compromete a enfocar las acciones al cumplimiento de los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización del Juzgado en base a procesos.</td>
                      <td>Confección, control de proyectos, cargas y registros de sentencias definitivas e interlocutorias. Diseño y presentación de proyectos innovadores para mejorar el servicio de justicia.</td>
                      <td style="text-align: center;"><a href="cobros 2 concepcion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">10</th> -->
                      <td>Juzgado Civil en Documentos y Locaciones </td>
                      <td>Monteros</td>
                      <td>Este Juzgado tiene la misión de garantizar la solución de los conflictos traídos a su conocimiento, en el marco de la paz social y legalidad, en cuanto a la materia establecida por la ley orgánica. En tal sentido, nos comprometemos a prestar un servicio eficiente a nuestros usuarios, mediante el cumplimiento de sus requisitos pertinentes y la mejora continua del Sistema de Gestión de Calidad.  En línea con tal deber, las autoridades de esta oficina, asumen la responsabilidad de evaluar los procesos planificados e implementados midiendo su eficiencia . Así, como de realizar acciones para incrementar la satisfacción de nuestros usuarios internos y externos.</td>
                      <td>Emisión de resoluciones judiciales: sentencias definitivas e interlocutorias. Planificación y ejecución de audiencias.</td>
                      <td style="text-align: center;"><a href="doc monteros iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">11</th> -->
                      <td>Juzgado Civil y Comercial Común - CJM</td>
                      <td>Monteros</td>
                      <td>El Juzgado Civil y Comercial de Monteros tiene como misión tramitar y resolver todos los asuntos en los que es competente en su jurisdicción de forma eficiente, imparcial, oportuna, transparente, comprensible y accesible con el objetivo de satisfacer las necesidades de sus usuarios. El Juzgado manifiesta su compromiso con la calidad mediante la implementación de un plan de gestión estratégica coordinado y supervisado por la Oficina de Gestión Judicial de la CSJT, orientado al cumplimiento de la Norma Internacional ISO 9001:2015 para lograr una mejora continua, asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, el Juzgado se compromete a enfocar sus acciones al cumplimiento de los requisitos legales y reglamentarios y a los requerimientos de los usuarios, identificándolos y midiendo su nivel de satisfacción a través de la sistematización de la organización de la oficina en base a procesos.</td>
                      <td>Control previo, realización y protocolización de sentencias.</td>
                      <td style="text-align: center;"><a href="juzgado civil monteros iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">11</th> -->
                      <td>Juzgado del Trabajo - CJM</td>
                      <td>Monteros</td>
                      <td>Administrar justicia en los conflictos jurídicos derivados de las relaciones del trabajo, garantizando la vigencia, respeto y cumplimiento de los principios, derechos y garantías constitucionales y convencionales.</td>
                      <td>Resolución de sentencias interlocutorias y definitivas. Notificaciones de sentencias. Registro de protocolo de sentencias.</td>
                      <td style="text-align: center;"><a href="juzgado trabajo monteros iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">11</th> -->
                      <td>Secretar&iacute;a de Superintendencia de la Corte Suprema de Justicia de Tucumán</td>
                      <td>Capital</td>
                      <td>La Secretaría de Superintendencia manifiesta su compromiso con la calidad a través de la implementación de un Sistema de Gestión de Calidad basado en la Norma ISO 9001 vigente  y, como consecuencia de ello, el cumplimiento de los requisitos necesarios para lograr la mejora continua de los procesos en los que interviene la secretaría, realizando su seguimiento  y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En esa línea, la alta Dirección se compromete a diagramar las acciones necesarias enfocadas a la mejora continua del SGC y al cumplimiento de los requerimientos pertinentes de los usuarios, por intermedio de  la revisión y sistematización de todos los procesos de la secretaría.</td>
                      <td>Recepción, registración y asignación para tramitación, de las presentaciones, escritos, proyectos, licencias y legalizaciones. Confección y notificación del acto administrativo de las licencias recepcionadas. Tramitación de las legalizaciones. Control, confección, notificación y publicación de acordadas y resoluciones. Recepción, tramitación y realización de juramentos de abogados y procuradores, magistrados y funcionarios.</td> 
                      <td style="text-align: center;"><a href="superintendencia iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">11</th> -->
                      <td>Secretar&iacute;a Contravencional</td>
                      <td>Capital</td>
                      <td>Resolver en forma expeditiva y fundada, las causas derivadas de los Juzgados Penales de Instrucción con competencia Contravencional. Y las nuevas causas Contravencionales ingresadas por la Policía de Tucumán y  las multas emanadas por las resoluciones definitivas de carácter punitorio de la Provincia, de las Municipalidades y Tribunales de Faltas.. La Secretaria Contravencional  manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Coordinación de la Secretaria Contravencional se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la OGJ en base a procesos.</td>
                      <td>Recepción de cédulas, escritos, expedientes, oficios y mandamientos. Confección de decretos, cedulas, oficios y mandamientos, proyectos de resoluciones interlocutorias y definitivas. Control, firma y distribución del despacho. Realización de audiencias. Protocolización de sentencia y remisión de expedientes.</td>
                      <td style="text-align: center;"><a href="contravencional iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">12</th> -->
                      <td>&Aacute;rea de Coordinación de Oficinas de Gestión de Audiencias</td>
                      <td>Capital</td>
                      <td>El &Aacute;rea de Coordinación de Oficinas de Gestión de Audiencias manifiesta su compromiso a proporcionar servicios que cumplen con los estándares de calidad necesarios para contribuir al eficiente funcionamiento de las Oficinas de Gestión de Audiencias Penales mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente, cumplimentando con todos sus requisitos y buscando la mejora continua del mismo. Nuestra política se basa en los principios de transparencia, eficacia y responsabilidad, con el objetivo de satisfacer las expectativas de la Corte Suprema de Justicia. En este marco, la Coordinación de la Oficina de Gestión de Audiencias  se compromete a enfocar las acciones necesarias para el cumplimiento de los requisitos legales, reglamentarios y los pertinentes de los usuarios, a través de la sistematización de la organización de la OGA en base a procesos.</td>
                      <td>Recopilación, procesamiento y análisis de datos, para la elaboración del tablero de comando de las oficinas de gestión de audiencias del fuero penal de Tucumán, para ser presentados ante la corte suprema de justicia, otras unidades judiciales y dirección de estadísticas para su publicación en sitio web institucional. Confección y presentación de otros informes especiales a otras entidades externas al poder judicial.</td>
                      <td style="text-align: center;"><a href="coordinacion oga iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">12</th> -->
                      <td>OGA Capital</td>
                      <td>Capital</td>
                      <td>La Oficina de Gestión de Audiencias tiene como misión gerenciar los recursos humanos, técnicos y administrativos, con el propósito de optimizar y agilizar el funcionamiento del fuero penal del Poder Judicial de Tucumán. La Oficina de Gestión de Audiencias manifiesta su compromiso con la Calidad, mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 en su versión vigente, buscando cumplir con sus requisitos y lograr la mejora continua del mismo, realizando un seguimiento en forma permanente asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Coordinación de la Oficina de Gestión de Audiencias  se compromete a enfocar las acciones necesarias para el cumplimiento de los requisitos legales, reglamentarios y los pertinentes de los usuarios, a través de la sistematización de las actividades de la organización de la OGA en base a procesos.</td>
                      <td>Recepción de solicitudes de audiencia y evaluación para su aprobación o rechazo. Agendamiento de solicitudes de audiencias aprobadas y notificación a las partes correspondientes; ordenamiento de las comunicaciones, emplazamientos y recordatorios para garantizar la realización de las audiencias y documentación mediante audio, video y acta; comunicaciones posteriores que surjan de las mismas. Recepción, control y derivación de escritos de ejecución de condenas efectivas. Ingresos para la creación de incidentes de ejecución del sistema conclusional y radicación de incidentes del sistema adversarial de condenas efectivas, en el ámbito adversarial del fuero penal del Centro Judicial San Miguel de Tucumán</td>
                      <td style="text-align: center;"><a href="oga capital iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">13</th> -->
                      <td>OGA Concepci&oacute;n</td>
                      <td>Concepci&oacute;n</td>
                      <td>La Oficina de Gestión de Audiencias tiene como misión gerenciar los recursos humanos,técnicos y administrativos, con el propósito de optimizar y agilizar el funcionamiento del fuero penal del Poder Judicial de Tucumán. La Oficina de Gestión de Audiencias manifiesta su compromiso con la Calidad, mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001, buscando cumplir con sus requisitos y lograr la mejora continua del mismo, realizando un seguimiento en forma permanente asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Coordinación de la Oficina de Gestión de Audiencias  se compromete a enfocar las acciones necesarias para el cumplimiento de los requisitos legales, reglamentarios y los pertinentes de los usuarios, a través de la sistematización de la organización de la OGA en base a procesos.</td>
                      <td>Recepción de solicitudes de audiencia y evaluación para su aprobación o rechazo. Agendamiento de solicitudes de audiencias aprobadas y notificación a las partes correspondientes; ordenamiento de las comunicaciones, emplazamientos y recordatorios para garantizar la realización; realización y documentación mediante audio, video y acta; comunicaciones posteriores que surjan de las mismas. Recepción, control, derivación de escritos y otras actuaciones a la Oficina de Ejecución.</td>
                      <td style="text-align: center;"><a href="oga concepcion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">14</th> -->
                      <td>Dirección de Estadísticas</td>
                      <td>Capital</td>
                      <td>La D.E. manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. La D.E. se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, los requerimientos pertinentes de los usuarios; y a la sistematización de las actividades en base a procesos; además de producir información de calidad con el fin de satisfacer los requerimientos pertinentes de los distintos usuarios, mediante la aplicación de metodología innovadora y el desarrollo de estudios especializados, como también a implementar herramientas informáticas adecuadas para facilitar el acceso y el manejo oportuno de bases de datos, mediante automatización de procesos, tableros de comando y herramientas de gestión de calidad de datos.</td>
                      <td>Elaboración de informes cuatrimestrales de la actividad judicial en unidades jurisdiccionales del Poder Judicial de Tucumán. Elaboración de tableros de indicadores estadísticos para unidades del Poder Judicial de Tucumán.</td>
                      <td style="text-align: center;"><a href="estadisticas iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">16</th> -->
                      <td>Dirección Técnica</td>
                      <td>Capital</td>
                      <td>La Dirección Técnica tiene como misión abastecer de infraestructura al poder judicial y brindar asesoramiento a la Excma. Corte Suprema de Justicia acerca del diseño y distribución de espacios, equipamiento, diseño gráfico, instalaciones electromecánicas y de climatización, y la higiene y seguridad laboral como parte imprescindible para la organización y función jurisdiccional. La Dirección Técnica manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 en su versión vigente y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Dirección Técnica se compromete a enfocar las acciones al cumplimiento de los requisitos legales, reglamentarios y la satisfacción de los requerimientos pertinentes de los usuarios.</td>
                      <td>Recepción de solicitud de proyecto de la Excma. Corte Suprema de Justicia encuadrado en la ley de Obras Públicas. Diseño y desarrollo del proyecto con análisis de viabilidad, elaboración de anteproyecto y confección del pliego técnico de obra pública dentro del territorio de la Provincia de Tucumán. Solicitud de trabajo de mantenimiento en juzgados de paz, priorización del pedido, asignación y preparación del trabajo, informe final y cierre de solicitud.</td>
                      <td style="text-align: center;"><a href="tecnica iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">16</th> -->
                      <td>Dirección Técnica Sur</td>
                      <td>Capital</td>
                      <td>La Oficina Técnica Sur tiene como misión diseñar, materializar, equipar y mantener en el tiempo los espacios arquitectonicos que forman parte de los Centros Judiciales de las ciudades de Concepción y Monteros, buscando la satisfacción de todos sus usuarios. La Oficina Técnica Sur manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente  y el cumplimiento de sus requisitos para lograr la mejora continua del SGC.  La Dirección de la Oficina se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios y los requerimientos pertinentes de los usuarios, identificandolos y midiendo su nivel de satisfaccion a traves de la sistematizacion de las actividades de la oficina en base a procesos.</td>
                      <td>Elaboración de anteproyecto, proyecto y pliego licitatorio de obra pública para los centros judiciales de Monteros y Concepción. Diseño y elaboración de documentación técnica de bienes y servicios, para refacciones, mantenimiento y obras por Administración.</td>
                      <td style="text-align: center;"><a href="tecnica sur iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">17</th> -->
                      <td>Dirección de Obras Públicas</td>
                      <td>Capital</td>
                      <td>La Dirección de Obras Públicas tiene como misión llevar adelante el inicio, gestión y trámite de los procedimientos administrativos de Obra Pública para abastecer de infraestructura a la Corte Suprema en el ejercicio de su función jurisdiccional. Nuestra oficina manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Oficina se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios y la sistematización de los procesos de la organización.</td>
                      <td>Ingreso y egreso de documentación. Control y remisión para imputación presupuestaria del pliego técnico de obra pública. Confección de pliegos legales, dictamen jurídico y proyecto de Acordada de llamado a licitación pública.</td>
                      <td style="text-align: center;"><a href="obras publicas iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">18</th> -->
                      <td>Dirección de Sistemas</td>
                      <td>Capital</td>
                      <td>La Dirección de Sistemas del Poder Judicial de Tucumán tiene como misión ejecutar los trabajos que sean requeridos por los distintos sectores del organismo y asignados por la superioridad, para ser procesados o instrumentados para su desarrollo, proceso y control. Asesorar en la definición de políticas, toma de decisiones y determinación de estándares a aplicar y realizar el control en materia de su competencia. En cuanto al desarrollo y mantenimiento de software, la DDS crea nuevos sistemas y realiza de forma continua acciones para asegurar el normal funcionamiento de los mismos. La DDS despliega, mantiene y opera la Infraestructura tecnológica del Poder Judicial y asegura la disponibilidad e integridad de los servicios ofrecidos. La Dirección de Sistemas del Poder Judicial de Tucumán manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Dirección, se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios y a la sistematización de las actividades que realiza la organización en base a procesos.</td>
                      <td>Centralización de datos del SAE Jurisdiccional; disposición de los datos para las unidades del Poder Judicial y ciudadanía en general. Emisión de certificados digitales (plataforma de firma digital remota. Preparación y entrega de equipos informáticos (puestos de trabajo).</td>
                      <td style="text-align: center;"><a href="sistemas iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">19</th> -->
                      <td>Dirección de Recursos Humanos</td>
                      <td>Capital</td>
                      <td>La Dirección de Recursos Humanos tiene como misión incorporar, integrar, guiar y motivar a todos los miembros del Poder Judicial, fomentando el bienestar y la realización personal y profesional, para así lograr un aporte positivo al servicio de justicia. La Dirección de Recursos Humanos manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua, realizando su seguimiento y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. La Dirección de Recursos Humanos se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la Dirección en base a procesos.</td>
                      <td>Realización de convocatoria de concursos públicos, verificación de documentación y realización de concursos de aspirantes a cubrir cargos de empleados administrativos y funcionarios, dispuestos por acordadas de la Corte Suprema de Justicia del Poder Judicial de Tucumán, hasta la publicación del orden de mérito. Convocatoria de ingresante, revisión de la documentación solicitada, gestión de trámites preocupacionales, realización de entrevista psicológica e informe, confección del legajo. Elaboración del proyecto de acordada de designación, elevación a la Excma. Corte, seguimiento, notificación y registro. Acompañamiento psicológico en el ingreso de personal. Registro de bajas de agentes.</td>
                      <td style="text-align: center;"><a href="rrhh iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">20</th> -->
                      <td>Superintendencia de Juzgados de Paz</td>
                      <td>Capital</td>
                      <td>La Superintendencia de Juzgados de Paz tiene como misión administrar y fortalecer a los Juzgados de Paz, conforme las funciones establecidas por la Excma. Corte Suprema de Justicia Tucumán, a fin de garantizar el acceso a la justicia. Accionar como nexo en la relación entre la justicia de paz y otros organismos públicos o privados. La oficina de SJP manifiesta su compromiso con la calidad mediante la implementación de un sistema de gestión de calidad basado en la Norma Internacional ISO 9001 vigente y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. Comprometiéndose a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios; a través de la sistematización de la organización de la SJP en base a procesos. La política de calidad está expuesta y habilitada a través de nuestros canales de comunicación.</td>
                      <td>Recepción y asignación para trámite de notas, documentos, mandas judiciales, oficios remitidos por Unidades del Ministerio Público Fiscal, expedientes del Registro Civil, Oficios Ley 22.172, Amparos a la simple tenencia, acordadas de designación, traslados, ascensos y renuncias, tomas de cargo, certificados de examen, certificados de alta médica y pedidos de licencias ingresados por correo electrónico; recepción, tramitación y devolución de actas. Recepción y tramitación de pedidos de licencia art. Nº 27 y 33 de la Acordada 234/91. Recepción, tramitación y respuesta al empleado judicial en pedidos de licencia art. Nº 40 y 46 de la Acordada 234/91. Recepción del ingresante a la Justicia de Paz y armado de legajo. Recepción, tramitación y elevación de solicitudes de pagos de movilidad a Jueces de Paz.</td>
                      <td style="text-align: center;"><a href="superintendencia paz iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">21</th> -->
                      <td>Sala de Audiencia Multifuero</td>
                      <td>Capital</td>
                      <td>La Sala de Audiencias Multifuero tiene como misión asistir con la correcta celebración de las audiencias presenciales, semipresenciales y virtuales, administrando y coordinando  todo lo inherente a ellas. Manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Coordinación de la Sala de Audiencias Multifuero, se compromete a enfocar las acciones, dirigidas al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción.</td>
                      <td>Preparación de las salas de audiencias, recepción de las unidades jurisdiccionales, unidades no jurisdiccionales y usuarios externos (abogados, testigos, justiciables, peritos, etc.), verificación de la sala asignada en el sistema de agendamiento unificado, asistencia técnica para el uso de la plataforma tecnológica y registro de audiencias para su publicación en el tablero de control.</td>
                      <td style="text-align: center;"><a href="sala multifuero iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Oficina de Gestión Judicial</td>
                      <td>Capital</td>
                      <td>La Oficina de Gestión Judicial tiene como misión mejorar la gestión de los diversos órganos del Poder Judicial de la Provincia de Tucumán mediante la implementación de políticas judiciales establecidas por la Excma. Corte y coordinar el funcionamiento de las Oficinas de Gestión Asociada de todos los fueros y Centros Judiciales. La Oficina de Gestión Judicial manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Coordinación de la Oficina de Gestión Judicial se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la OGJ en base a procesos.</td>
                      <td>Planificación estratégica, diagnóstico, diseño de proyectos y actividades en unidades judiciales y otros organismos. Elaboración y presentación del informe anual a la Excelentísima Corte Suprema de Justicia del Poder Judicial de Tucumán. Dictado de talleres de capacitación. Coordinación, diagnóstico, diseño, implementación, mantenimiento, de sistemas de gestión de la calidad de unidades judiciales. Control de tableros de unidades judiciales, realización de Informes, asistencia, implementación de planes. Planificación y realización de auditorías internas del sistema de gestión de la calidad. Medición del clima laboral e implementación de planes de acción en unidades judiciales. Monitoreo de la publicación de los edictos judiciales en el Boletín Oficial Judicial.</td> 
                      <td style="text-align: center;"><a href="ogj iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Área de Gestión del Período de Resolución de Causas</td>
                      <td>Capital</td>
                      <td>La Oficina de Gestión del Periodo de Resolucion  de Causas Pendientes tiene como misión gestionar mecanismos ágiles y convenientes para colaborar con la organización de las unidades jurisdiccionales conclusionales tanto en la etapa previa a la puesta en marcha del nuevo código procesal penal, como durante el tiempo que dure el periodo de resolución de causas pendientes, mediante la elaboración de instructivos de trabajo, cronogramas de finalización de causas pendientes, indicadores estadísticos y de seguimiento, en un marco de mejora continua, bajo las reglas de celeridad, eficiencia, y economía procesal. La OGPRCP manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Oficina de Gestión del Periodo de Resolucion  de Causas Pendientes se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, a través de la sistematización de las actividades de la organización de la OGPRCP en base a procesos.</td>
                      <td>Control y seguimiento para la resolución de causas pendientes del fuero penal.</td>
                      <td style="text-align: center;"><a href="gestion causas pendientes iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Centro de Mediación</td>
                      <td>Capital</td>
                      <td>El Centro de Mediación Judicial de la jurisdicción Capital de Tucumán tiene como misión organizar, gestionar, y fiscalizar el desarrollo de los procesos de mediación previa y obligatoria a todo juicio como método alternativo de solución de controversias; y dirigir el registro de Mediadores/as y Co Mediadores/as del Poder Judicial de Tucumán. Nuestra oficina manifiesta su compromiso con la calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001 vigente y la mejora continua del sistema de gestión de calidad y el cumplimiento de los requisitos legales y reglamentarios aplicables, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Dirección de la Oficina se compromete a enfocar las acciones al cumplimiento de los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización del Centro de Mediación Judicial en base a procesos.</td>
                      <td>Recepción de documentación, asignación del trámite, admisión de causas y sorteo de mediadores. Notificación de audiencias de mediaciones. Distribución de trámites Aplicación, ejecución y remisión de multa.</td>
                      <td style="text-align: center;"><a href="mediacion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Gabinete Psicosocial de los Juzgados Civil en Familia y Sucesiones</td>
                      <td>Capital</td>
                      <td>El Gabinete tiene como misión brindar asesoramiento profesional desde la Psicología y el Trabajo Social a la Autoridad Jurisdiccional del Fuero en Familia y Sucesiones que lo requiera, en el contexto de un proceso judicial a fin de agilizar y contribuir a la prestación de un servicio de justicia efectivo y de calidad. Nuestra oficina manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9000:2015 y 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma periodica y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, el Gabinete se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción.</td>
                      <td>Recepción, análisis y asignación de actuaciones. Realización de informes psicológicos y sociales. Participación en audiencia con o sin emisión de dictamen. Participación en audiencias sin notificar.</td>
                      <td style="text-align: center;"><a href="gabinete psicosocial capital iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Oficina de Digitalización</td>
                      <td>Capital</td>
                      <td>La Oficina de Digitalización manifiesta su compromiso con la calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015, con el cumplimiento de sus requisitos en busca de la mejora continua del mismo optimizando los recursos. En este sentido, la Dirección de la Oficina de Digitalización se compromete a dirigir las acciones al cumplimiento de los requisitos legales y reglamentarios y los de las distintas oficinas del Poder Judicial;  sistematizando los procesos en las distintas sedes que forman parte de la misma.</td>
                      <td>Recepción y control de listados, acondicionamiento y digitalización del expediente, control de lo digitalizado, firma digital del fedatario. Carga, control del archivo y firma electrónica de la actuación en el SAE.</td>
                      <td style="text-align: center;"><a href="digitalizacion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Oficina de la Mujer</td>
                      <td>Capital</td>
                      <td>La Oficina de la Mujer tiene como misión promover la igualdad de género en los diversos órganos del poder judicial de la Provincia de Tucumán mediante, el establecimiento de Políticas con la Oficina de la Mujer de la CSJN; la coordinación de acciones con los restantes poderes del estado; el desarrollo de actividades de formación e investigación en perspectiva de género; la organización de actividades de capacitación para todo el personal judicial; la elaboración de estadísticas y la colaboración con las actividades de las oficinas judiciales. La Oficina de la Mujer manifiesta su compromiso con la calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma ISO 9001:2015 y el cumplimiento de los requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la Oficina de la Mujer de la CSJT se compromete a enfocar las acciones al cumplimiento de los requisitos legales y reglamentarios; y a la sistematización de la organización de la oficina, en base a procesos.</td>
                      <td>Diseño y desarrollo de actividades de capacitación para promover la igualdad de género en los diversos órganos del poder judicial de la Provincia de Tucumán. Diseño de capacitaciones dictadas por docente externo. Diseño y desarrollo de capacitaciones autogestionadas mediante plataforma virtual por mandamiento judicial.</td> 
                      <td style="text-align: center;"><a href="oficina mujer iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Oficina de Servicios Judiciales</td>
                      <td>Capital</td>
                      <td>La Oficina de Servicios Judiciales tiene como misión Organizar eficientemente los servicios del Poder Judicial para lograr celeridad, accesibilidad, seguridad, transparencia en la Administración de Justicia. La Oficina de Servicios Judiciales manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la responsable de la Oficina de Servicios Judiciales se compromete a enfocar las acciones necesarias para el cumplimiento de los requisitos legales, reglamentarios y los pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la OSJ en base a procesos.</td>
                      <td>Recepción de oficios, búsqueda de sentencias en libros de protocolo, digitalización de sentencias, remisión del oficio por Portal del SAE. Otorgamiento de clave para el Portal del SAE. Otorgamiento de la inscripción en el registro de postor para subastas electrónicas. Publicación, parametrización de la plataforma de las subastas y remisión del Acta de cierre en el Portal del SAE, para subastas decretadas en las distintas OGAs. Recepción de oficios de solicitud de pericia genética y respuesta. Procesos preanalíticos de pericia genética de muestras en personas vivas en sede capital. Procesos analíticos y post analíticos de pericia genética de muestras en personas vivas de sede Capital y Concepción. Remisión de Resultado pericial de estudio genético por Portal del SAE.</td>  
                      <td style="text-align: center;"><a href="servicios judiciales iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">21</th> -->
                      <td>Oficina de Coordinación Estratégica de Planificación y Gestión</td>
                      <td>Capital</td>
                      <td>La Oficina de Coordinación Estratégica de Planificación y Gestión tiene como misión coordinar de manera organizada las actividades específicas, que deben llevarse a cabo para alcanzar un objetivo o resolver un problema, vinculadas a la planificación, gestión y comunicación estratégica, proponiendo y ejecutando políticas públicas de mejora continua y de innovación en el Poder Judicial de Tucumán. La Oficina de Coordinación Estratégica de Planificación y Gestión manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo. La Coordinación de esta Oficina y su Equipo se compromete a realizar las acciones necesarias que garanticen el compromiso de todo el equipo para trabajar en pos del cumplimiento de los objetivos de calidad, buscando que los resultados de la ejecución de las tareas sean beneficiosos para sus usuarios y en cumplimiento de los requisitos legales y reglamentarios.</td>
                      <td>Diseño de la planificación, con desarrollo en determinados proyectos. Coordinación y seguimiento de la implementación de los proyectos institucionales, de mejora e innovación del servicio de justicia. Recepción y tramitación de solicitudes.</td>
                      <td style="text-align: center;"><a href="coordinacion iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">21</th> -->
                      <td>Oficina de Derechos Humanos y Justicia</td>
                      <td>Capital</td>
                      <td>A partir de procesos de reflexión sobre las prácticas institucionales del Poder Judicial, la Oficina de Derechos Humanos y Justicia tiene como misión fortalecer la protección y el pleno goce de los Derechos Humanos en general y el acceso a justicia en particular, a fin de mejorar el vínculo entre las personas y el Poder Judicial. Por ello, a los fines de lograr la mejora continua de nuestra organización, nos comprometemos a: 1) cumplir con  los requisitos de capacitación, legales y reglamentarios aplicables a nuestra Oficina; 2) cumplir con los requisitos de calidad establecidos por la Norma ISO 9001:2015, para asegurar la implementación y mantenimiento de un sistema de gestión de la calidad eficaz; y 3) fomentar la cultura de la mejora continua para optimizar nuestros procesos y servicios. La coordinación se compromete a generar espacios participativos, de intercambio y reflexión a fin de repensar prácticas organizacionales internas de cara al bienestar laboral y su impacto en nuestras tareas cotidianas y objetivos futuros.</td>
                      <td>Recopilación, análisis y elaboración de Gacetilla de estándares internacionales de derechos humanos.</td>
                      <td style="text-align: center;"><a href="ddhh iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">21</th> -->
                      <td>Oficina de Atención al Ciudadano</td>
                      <td>Capital</td>
                      <td>La Oficina de Atención al Ciudadano tiene como Política de la Calidad fortalecer y facilitar el acceso a la Justicia a los ciudadanos, especialmente a personas vulnerables. Nuestra oficina manifiesta su compromiso con la Calidad mediante la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001/2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la dirección de la Oficina de Atención al Ciudadano  se compromete a enfocar las acciones necesarias para el cumplimiento de los requisitos legales, reglamentarios y los pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de la organización de la Oficina en base a procesos.</td>
                      <td>Control de ingreso y respuesta de consultas recibidas por correo electrónico, celular y en forma presencial. Control de recepción, confección y depósito de los oficios ley 22172.</td>
                      <td style="text-align: center;"><a href="ciudadano iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">21</th> -->
                      <td>Oficina de Asistencia a la Victima de Delitos</td>
                      <td>Capital</td>
                      <td>La OAVD tiene como misión brindar atención integral mediante: información adecuada, contención, orientación y acompañamiento a personas que hayan sido víctimas de delitos y a sus familiares, durante su tránsito por el proceso penal. El fin es el de contribuir a garantizar sus derechos en el proceso, a mitigar las consecuencias del impacto del delito y a evitar situaciones de revictimización, incorporando la figura de la víctima como parte activa de los mecanismos de protección de derechos y garantías en el sistema de justicia. La OAVD manifiesta su compromiso con la Calidad mediante: 1) reuniones periodicas para reflexionar sobre la organización interna y continuar con los espacios de ateneos y capacitación; 2) la implementación de un Sistema de Gestión de Calidad basado en la Norma Internacional ISO 9001:2015 y el cumplimiento de sus requisitos para lograr la mejora continua del mismo, realizando su seguimiento en forma continua y asegurando la disponibilidad de los recursos necesarios para su funcionamiento. En este marco, la OAVD se compromete a enfocar las acciones en la optimización de nuestra organización y en el cumplimiento de los requisitos legales y reglamentarios, y los requerimientos pertinentes de los usuarios, identificándolos y midiendo su nivel de satisfacción; a través de la sistematización de los procesos de la organización de la OAVD</td>
                      <td>Información sobre la factibilidad y conveniencia de la realización de la entrevista de declaración testimonial de niñas, niños, adolescentes o personas que padecieren una disminución de su capacidad mental o intelectual, víctimas o testigos y víctimas de delitos contra la integridad sexual, a través de un informe que dé cuenta de su estado emocional y las eventuales características que posee a los fines de evitar la generación de victimización secundaria.</td>
                      <td style="text-align: center;"><a href="asistencia iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a></td>
                    </tr>
                    <!-- glyphicon glyphicon-certificate -->
              </tbody>
          </table>
      </div>

       
    </body>

</html>


