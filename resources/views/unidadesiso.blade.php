


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
              <td>22</td>
              <td>64</td>
            </tr>
          </tbody>
        </table>


          <table class="table table-bordered table-striped table-hover">
              <thead>
                <tr>
                  <!-- <th scope="col">#</th> -->
                  <th scope="col">UNIDAD</th>
                  <th scope="col">CENTRO JUDICIAL</th>
                  <th scope="col">ALCANCE</th>
                  <th scope="col">CERTIFICADOS</th>
                </tr>
              </thead>
              <tbody>
                    <tr>
                      <!-- <th scope="row">1</th> -->
                      <td>Excma. Cámara en Documentos y Locaciones Salas I, II y II </td>
                      <td>Capital</td>
                      <td>Recepción de expedientes, escritos, oficios entre unidades jurisdiccionales, consultas, pagos, cédulas diligenciadas, dictámenes, informes, oficios provenientes de entidades externas al poder judicial, documentación original y expedientes a la vista.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15585 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15585 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">2</th> -->
                      <td>Excma. Cámara en lo Contencioso Administrativo - Sala 1</td>
                      <td>Capital</td>
                      <td>Confección y control de proyectos de sentencias definitivas e interlocutorias; firma, registro y notificaci&oacute;n de dichas sentencias.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-14960 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-14960 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">3</th> -->
                      <td>Excma. Cámara de Apelaciones en lo Civil en Documentos, Locaciones, Familia y Sucesiones.</td>
                      <td>Concepci&oacute;n</td>
                      <td>Confección de proyectos de providencias simples, decretos, sentencias definitivas e interlocutorias. Asignación para control y firma de proyectos de providencias simples, decretos y sentencias definitivas e interlocutorias. Protocolización y registro de protocolos de sentencias definitivas e interlocutorias.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-14955 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-14955 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">4</th> -->
                      <td>Juzgado Civil en Familia y Sucesiones de la IV Nominación</td>
                      <td>Capital</td>
                      <td>Registración de sentencias pendientes. Confección, notificación y control de proyectos de sentencias definitivas e interlocutorias. Firma y registración de protocolo.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15577 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15577 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">5</th> -->
                      <td>Juzgado Civil en Familia y Sucesiones de la V Nominación</td>
                      <td>Capital</td>
                      <td>Recepción y asignación de escritos, oficios y expedientes. Confección, control y firma de proyectos de providencias simples.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUÁN 9001-15578 FAMILIA V.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUÁN 9001-15578 iqnet FAMILIA V.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">6</th> -->
                      <td>Juzgado de Instrucción Conclusional 1</td>
                      <td>Capital</td>
                      <td>Tramitación de escritos, expedientes y documentación en general. Dictado de decretos, resoluciones interlocutorias, sentencias y notificación de las mismas. Celebración de comparecencias.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15584 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15584 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">7</th> -->
                      <td>Juzgado de Instrucción Conclusional 2</td>
                      <td>Capital</td>
                      <td>Recepción de escritos, expedientes y documentación en general. Realización de audiencias y otras comparecencias. Dictado y notificación de decretos, resoluciones interlocutorias y sentencias.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUÁN 9001-15579 iram - CONCLUSIONAL 2.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUÁN 9001-15579 iqnet CONCLUSIONAL 2 CAPITAL.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">8</th> -->
                      <td>Juzgado Cobros y Apremios II Concepción</td>
                      <td>Concepci&oacute;n</td>
                      <td>Recepción de expedientes, escritos, oficios, informes y documentación original; planificación y celebración de audiencias; confección y control de proyectos de sentencias definitivas e interlocutorias; firma, registro/ Protocolización y notificación de dichas sentencias; confección, control, firma y notificación de providencias simples.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15586 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15586 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">9</th> -->
                      <td>Juzgado Trabajo I Monteros</td>
                      <td>Monteros</td>
                      <td>Recepción de escritos, documentación, consultas, expedientes, informes de estadística, notas y contestaciones por mail, oficios entre unidades jurisdiccionales y pagos judiciales; asignación del trámite correspondiente y distribución para su tratamiento. Emisión de providencias simples, sentencias interlocutorias y sentencias definitivas. Planificación y ejecución de audiencias. Remisión de cédulas, oficios, mandamientos, expedientes, notas y demás actuaciones.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL 9001 iram TRABAJO MONTEROS.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICAL 9001 iqnet TRABAJO MONTEROS.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">10</th> -->
                      <td>Juzgado Civil en Documentos y Locaciones </td>
                      <td>Monteros</td>
                      <td>Recepción de expedientes, escritos, oficios, informes y documentación original. Emisión de providencias simples, sentencias interlocutorias y definitivas. Planificación y ejecución de audiencias. Remisiones y salidas de actuaciones.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUÁN 9001-15580_DOC Y LOC MONTEROS.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUÁN 9001-15580 DOC Y LOC MONTEROS.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">11</th> -->
                      <td>Juzgado Civil y Comercial Común - CJM</td>
                      <td>Monteros</td>
                      <td>Recepción de expedientes, escritos, oficios, informes y documentación original. Emisión de providencias simples, sentencias interlocutorias y definitivas. Planificación y ejecución de audiencias. Remisiones y salidas de actuaciones.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-14957 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-14957 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">12</th> -->
                      <td>OGA Capital</td>
                      <td>Capital</td>
                      <td>Recepción de solicitudes de audiencia y evaluación para su aprobación o rechazo. Agendamiento de solicitudes de audiencias aprobadas. Notificación de audiencias a las partes correspondientes.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-14961 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-14961 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">13</th> -->
                      <td>OGA Concepci&oacute;n</td>
                      <td>Concepci&oacute;n</td>
                      <td>Recepción de solicitudes de audiencia y evaluación para su aprobación o rechazo. Agendamiento de solicitudes de audiencias aprobadas. Notificación de audiencias a las partes correspondientes. Ordenamiento de las comunicaciones y emplazamientos y recordatorios para garantizar la realización de las audiencias y documentación mediante audio, video y acta en el ámbito del fuero penal del Centro Judicial Concepción.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-14917 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-14917 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">14</th> -->
                      <td>Dirección de Estadísticas</td>
                      <td>Capital</td>
                      <td>Elaboración de informes cuatrimestrales de actividad judicial en unidades jurisdiccionales del Poder Judicial de Tucumán.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15587 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15587 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">15</th> -->
                      <td>Dirección Técnica Sur</td>
                      <td>Capital</td>
                      <td>Recepción de solicitud de proyecto de la Excema Corte Suprema de Justicia y delegado Magistrado encuadrado en la ley de obra pública, elaboración de anteproyecto, proyecto y pliego licitatorio y visado de documentación hasta inicio de obra pública en los centros judiciales Monteros y Concepción.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15641 iram (1).pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15641 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">16</th> -->
                      <td>Dirección Técnica</td>
                      <td>Capital</td>
                      <td>Recepción de solicitud de proyecto de la Excma Corte Suprema de Justicia encuadrado en la ley de Obras Públicas, análisis de viabilidad, elaboración de anteproyecto y confección del pliego técnico de obra pública dentro del territorio de la Provincia de Tucumán.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9001-15642 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15642 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">17</th> -->
                      <td>Dirección de Obras Públicas</td>
                      <td>Capital</td>
                      <td>Recepción del pliego técnico. Control y remisión para imputación presupuestaria. Recepción de expediente con imputación, confección de pliegos legales, dictamen jurídico y proyecto de Acordada. Confección del proyecto de Acordada de llamado a Licitación Pública de obra pública.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15644 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15644 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">18</th> -->
                      <td>Dirección de Sistemas</td>
                      <td>Capital</td>
                      <td>Centralización de datos del SAE Jurisdiccional; disposición de los datos para las unidades del Poder Judicial y ciudadanía en general. Emisión de certificados digitales (plataforma de firma digital remota).</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15650 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15650 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">19</th> -->
                      <td>Dirección de Recursos Humanos</td>
                      <td>Capital</td>
                      <td>Realización de convocatoria de concursos públicos, verificación de documentación y realización de concursos de aspirantes a cubrir cargos de empleados administrativos y funcionarios, dispuestos por acordadas de la Corte Suprema de Justicia del Poder Judicial de Tucumán, hasta la publicación del orden de mérito.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-14956 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-14956 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">20</th> -->
                      <td>Superintendencia de Juzgados de Paz</td>
                      <td>Capital</td>
                      <td>Recepción y asignación para trámite de notas, documentos, mandas judiciales, oficios remitidos por Unidades del Ministerio Público Fiscal, expedientes del Registro Civil, Oficios Ley 22.172, Amparos a la simple tenencia, acordadas de designación, traslados, ascensos y renuncias, tomas de cargo, certificados de examen, certificados de alta médica y pedidos de licencias ingresados por correo electrónico; recepción, tramitación y devolución de actas.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15643 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15643 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">21</th> -->
                      <td>Sala de Audiencia Multifuero</td>
                      <td>Capital</td>
                      <td>Preparación de las salas de audiencias, recepción de las unidades judiciales y usuarios externos, corroborar en el sistema de agendamiento unificado la sala correspondiente e indicar la misma, asistencia técnica para el uso de la plataforma tecnológica y registro de audiencias.</td>
                      <td style="text-align: center;"><a href="Pder. J. Tucumán 9000-15575 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="Pder. J. Tucumán 9001-15575 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
                    <tr>
                      <!-- <th scope="row">22</th> -->
                      <td>Oficina de Gestión Judicial</td>
                      <td>Capital</td>
                      <td>Planificación estratégica, diagnóstico, diseño e implementación de proyectos, incluyendo la elaboración de procedimientos e instructivos. Elaboración y presentación de Informe Anual a la Excelentísima Corte Suprema de Justicia del Poder Judicial de Tucumán. Dictado de talleres de capacitación. Actividades desarrolladas en conformidad con las políticas judiciales establecidas por la Excelentísima Corte Suprema de Justicia del Poder Judicial de Tucumán. Coordinación, asistencia técnica y asesoramiento para la implementación del sistema de gestión de la calidad conforme a los requisitos de la Norma ISO 9001 vigente en Unidades Judiciales del Poder Judicial de Tucumán.</td>
                      <td style="text-align: center;"><a href="PODER JUDICIAL DE TUCUMÁN 9001-10372 iram.pdf" target="_blank"><span style="padding: 10px;" title="IRAM" class="glyphicon glyphicon-file"></span></a><a href="PODER JUDICIAL DE TUCUMÁN 9001-10372 iqnet.pdf" target="_blank"><span style="padding: 10px;" title="IQNET" class="glyphicon glyphicon-certificate"></span></a></td>
                    </tr>
              </tbody>
          </table>
      </div>

       
    </body>

</html>

