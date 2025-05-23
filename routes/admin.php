<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ProyectoController;
use App\Http\Controllers\Admin\EjeController;
use App\Http\Controllers\Admin\EstadoProyectoController;
use App\Http\Controllers\Admin\EstadoTareaController;
use App\Http\Controllers\Admin\TareaController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\Admin\BlogController;
use App\Http\Controllers\Admin\AlertaController;
use App\Http\Controllers\Admin\GrupoController;
use App\Http\Controllers\Admin\EstrategicaController;
use App\Http\Controllers\Admin\OperativaController;
use App\Http\Controllers\Admin\ObjetivoController;
use App\Http\Controllers\Admin\ActividadController;
use App\Http\Controllers\Admin\AgendaController;
use App\Http\Controllers\Admin\ProcesoController;
use App\Http\Controllers\Admin\IndicadorController;
use App\Http\Controllers\Admin\HistoricoController;
use App\Models\Alerta;
//->middleware('can:admin.users') para una ruta en particular, por jejemplo el index del home
Route::get('', [HomeController::class,'index']);
Route::get('/calendar', [HomeController::class,'calendar']);
Route::get('/porprocesos', [HomeController::class, 'porprocesos'])->name('admin.porprocesos');
Route::get('/eje3', [HomeController::class, 'eje3'])->name('admin.eje3');
Route::get('/eje4', [HomeController::class, 'eje4'])->name('admin.eje4');




Route::resource('users', UserController::class)->names('admin.users');
// Route::resource('users', UserController::class)->only('index','update','edit')->names('admin.users');
Route::get('admin/users/{user}/enabled', [UserController::class, 'enabled'])->name('admin.users.enabled');
// Route::get('admin/ejes', [EjeController::class, 'index'])->name('ejes.index');
// Route::get('admin/ejes/create', [EjeController::class, 'create'])->name('ejes.create');
// Route::post('admin/ejes', [EjeController::class, 'store'])->name('ejes.store');
// Route::get('admin/ejes/{eje}', [EjeController::class, 'show'])->name('ejes.show');
// Route::get('admin/ejes/{eje}/edit', [EjeController::class, 'edit'])->name('ejes.edit');
// Route::put('admin/ejes/{eje}/update', [EjeController::class, 'update'])->name('ejes.update');
// Route::delete('admin/ejes/{eje}/destroy', [EjeController::class, 'destroy'])->name('ejes.destroy');
Route::resource('ejes', EjeController::class)->names('admin.ejes');
Route::get('ejes/{eje}/enabled', [EjeController::class, 'enabled'])->middleware('can:admin.ejes.enabled')->name('admin.ejes.enabled');
Route::post('ejes/getejecount', [EjeController::class, 'getejecount'])->name('admin.ejes.getejecount');

Route::resource('grupos', GrupoController::class)->names('admin.grupos');
Route::get('grupos/{grupo}/enabled', [GrupoController::class, 'enabled'])->middleware('can:admin.grupos.enabled')->name('admin.grupos.enabled');
Route::get('grupos/{eje}/indexeje', [GrupoController::class, 'indexeje'])->middleware('can:admin.grupos.index')->name('admin.grupos.indexeje');


Route::resource('proyectos', ProyectoController::class)->names('admin.proyectos');
Route::get('proyectos/{proyecto}/enabled', [ProyectoController::class, 'enabled'])->middleware('can:admin.proyectos.enabled')->name('admin.proyectos.enabled');
Route::post('proyectos/getprojectcount', [ProyectoController::class, 'getprojectcount'])->name('admin.proyectos.getprojectcount');
Route::post('proyectos/getinfoproyectos', [ProyectoController::class, 'getinfoproyectos'])->name('admin.proyectos.getinfoproyectos');
Route::get('proyectos/{grupo}/indexgrupo', [ProyectoController::class, 'indexgrupo'])->middleware('can:admin.proyectos.index')->name('admin.proyectos.indexgrupo');
Route::get('proyecto/indexhistory', [ProyectoController::class, 'indexhistory'])->middleware('can:admin.proyectos.index')->name('admin.proyectos.indexhistory');
Route::get('proyectos/{grupo}/indexgrupohistory', [ProyectoController::class, 'indexgrupohistory'])->middleware('can:admin.proyectos.index')->name('admin.proyectos.indexgrupohistory');
Route::get('proyecto/getproject', [ProyectoController::class, 'getproject'])->name('admin.proyectos.getproject');
Route::get('proyecto/getprojectbygroup', [ProyectoController::class, 'getprojectbygroup'])->name('admin.proyectos.getprojectbygroup');
Route::get('proyectos/{proyecto}/charts', [ProyectoController::class, 'charts'])->middleware('can:admin.proyectos.index')->name('admin.proyectos.charts');
Route::get('proyecto/setsession', [ProyectoController::class, 'setsession'])->name('proyectos.setsession');
Route::get('proyecto/getprojecthistory', [ProyectoController::class, 'getprojecthistory'])->name('admin.proyectos.getprojecthistory');
Route::get('proyecto/getprojectbygrouphistory', [ProyectoController::class, 'getprojectbygrouphistory'])->name('admin.proyectos.getprojectbygrouphistory');
Route::get('proyecto/{proyecto}/history', [ProyectoController::class, 'history'])->middleware('can:admin.proyectos.index')->name('admin.proyectos.history');
Route::get('proyectos/{proceso}/indexproceso', [ProyectoController::class, 'indexproceso'])->middleware('can:admin.proyectos.index')->name('admin.proyectos.indexproceso');
Route::get('proyecto/cargas', [ProyectoController::class, 'cargas'])->name('admin.proyectos.cargas');

Route::resource('estadosproyectos', EstadoProyectoController::class)->names('admin.estadosproyectos');
Route::get('estadosproyectos/{estadosproyecto}/enabled', [EstadoProyectoController::class, 'enabled'])->middleware('can:admin.estadosproyectos.enabled')->name('admin.estadosproyectos.enabled');

Route::resource('estadostareas', EstadoTareaController::class)->names('admin.estadostareas');
Route::get('estadostareas/{estadostarea}/enabled', [EstadoTareaController::class, 'enabled'])->middleware('can:admin.estadostareas.enabled')->name('admin.estadostareas.enabled');

Route::resource('tareas', TareaController::class)->names('admin.tareas');
Route::post('tareas/{file}/deleteFile', [TareaController::class, 'deleteFile'])->middleware('can:admin.tareas.deleteFile')->name('admin.tareas.deleteFile');
Route::get('tareas/{file}/descarga', [TareaController::class, 'descarga'])->middleware('can:admin.tareas.descarga')->name('admin.tareas.descarga');
Route::post('tareas/getinfotareas', [TareaController::class, 'getinfotareas'])->name('admin.tareas.getinfotareas');
Route::get('tareas/{proyecto}/indexproyecto', [TareaController::class, 'indexproyecto'])->middleware('can:admin.tareas.index')->name('admin.tareas.indexproyecto');
Route::get('tarea/gettarea', [TareaController::class, 'gettarea'])->name('admin.tareas.gettarea');
Route::get('tarea/gettaskbyproject', [TareaController::class, 'gettaskbyproject'])->name('admin.tareas.gettaskbyproject');
Route::get('tarea/searchProject', [TareaController::class, 'searchProject'])->name('admin.tareas.searchProject');
Route::get('tareas/{proceso}/indexproceso', [TareaController::class, 'indexproceso'])->middleware('can:admin.tareas.index')->name('admin.tareas.indexproceso');
Route::get('tarea/createnc', [TareaController::class, 'createnc'])->name('admin.tareas.createnc');

Route::resource('roles', RoleController::class)->names('admin.roles');

Route::resource('blogs', BlogController::class)->names('admin.blogs');
Route::get('blogs/{blog}/enabled', [BlogController::class, 'enabled'])->middleware('can:admin.blogs.enabled')->name('admin.blogs.enabled');

Route::resource('alertas', AlertaController::class)->names('admin.alertas');
Route::get('alerta/getalertas', [AlertaController::class, 'getalertas'])->name('admin.alertas.getalertas');
Route::post('alerta/getinfoalerts', [AlertaController::class, 'getinfoalerts'])->name('admin.alertas.getinfoalerts');

Route::resource('procesos', ProcesoController::class)->names('admin.procesos');
Route::get('procesos/{proceso}/enabled', [ProcesoController::class, 'enabled'])->middleware('can:admin.procesos.enabled')->name('admin.procesos.enabled');
Route::get('procesos/{proceso}/estrategico', [ProcesoController::class, 'estrategico'])->middleware('can:admin.procesos.enabled')->name('admin.procesos.estrategico');
Route::get('procesos/{proceso}/clave', [ProcesoController::class, 'clave'])->middleware('can:admin.procesos.enabled')->name('admin.procesos.clave');
Route::get('procesos/{proceso}/soporte', [ProcesoController::class, 'soporte'])->middleware('can:admin.procesos.enabled')->name('admin.procesos.soporte');
Route::get('prcesos/resumen', [ProcesoController::class, 'resumen'])->name('admin.procesos.resumen');

#Planificiacion 
Route::resource('estrategicas', EstrategicaController::class)->names('admin.estrategicas');
Route::get('estrategicas/{estrategica}/enabled', [EstrategicaController::class, 'enabled'])->middleware('can:admin.estrategicas.enabled')->name('admin.estrategicas.enabled');
Route::post('estrategicas/getestrategicacount', [EstrategicaController::class, 'getestrategicacount'])->name('admin.estrategicas.getestrategicascount');

Route::resource('operativas', OperativaController::class)->names('admin.operativas');
Route::get('operativas/{operativa}/enabled', [OperativaController::class, 'enabled'])->middleware('can:admin.operativas.enabled')->name('admin.operativas.enabled');
Route::get('operativas/{estrategica}/indexestrategica', [OperativaController::class, 'indexestrategica'])->middleware('can:admin.operativas.index')->name('admin.operativas.indexestrategica');


Route::resource('objetivos', ObjetivoController::class)->names('admin.objetivos');
Route::get('objetivos/{objetivo}/enabled', [ObjetivoController::class, 'enabled'])->middleware('can:admin.objetivos.enabled')->name('admin.objetivos.enabled');
Route::post('objetivos/getprojectcount', [ObjetivoController::class, 'getprojectcount'])->name('admin.objetivos.getprojectcount');
Route::post('objetivos/getinfoobjetivos', [ObjetivoController::class, 'getinfoobjetivos'])->name('admin.objetivos.getinfoproyectos');
Route::get('objetivos/{operativa}/indexoperativa', [ObjetivoController::class, 'indexoperativa'])->middleware('can:admin.objetivos.index')->name('admin.objetivos.indexoperativa');
Route::get('objetivo/getobjetive', [ObjetivoController::class, 'getobjetive'])->name('admin.objetivos.getobjetive');
Route::get('objetivo/getprojectbygroup', [ObjetivoController::class, 'getprojectbygroup'])->name('admin.objetivos.getprojectbygroup');
Route::get('objetivo/{objetivo}/charts', [ObjetivoController::class, 'charts'])->middleware('can:admin.objetivos.index')->name('admin.objetivos.charts');
Route::get('objetivo/searchObjetivesbyStrategy', [ObjetivoController::class, 'searchObjetivesbyStrategy'])->name('admin.objetivos.searchObjetivesbyStrategy');
Route::get('objetivo/searchObjetivesbyOperative', [ObjetivoController::class, 'searchObjetivesbyOperative'])->name('admin.objetivos.searchObjetivesbyOperative');
Route::get('objetivos/{estrategicaid}/{operativaid}/{estado}/indexstatus', [ObjetivoController::class, 'indexstatus'])->middleware('can:admin.objetivos.index')->name('admin.objetivos.indexstatus');
Route::get('objetivo/getobjetivebystatus', [ObjetivoController::class, 'getobjetivebystatus'])->name('admin.objetivos.getobjetivebystatus');
Route::get('objetivo/cargas', [ObjetivoController::class, 'cargas'])->name('admin.objetivos.cargas');

Route::resource('actividades', ActividadController::class)->names('admin.actividades');
Route::post('actividades/{file}/deleteFile', [ActividadController::class, 'deleteFile'])->middleware('can:admin.actividades.deleteFile')->name('admin.actividades.deleteFile');
Route::get('actividades/{file}/descarga', [ActividadController::class, 'descarga'])->middleware('can:admin.actividades.descarga')->name('admin.actividades.descarga');
Route::get('actividades/{objetivo}/indexobjetivo', [ActividadController::class, 'indexobjetivo'])->middleware('can:admin.actividades.index')->name('admin.actividades.indexobjetivo');
Route::get('actividad/getactividad', [ActividadController::class, 'getactividad'])->name('admin.actividades.getactividad');
Route::get('actividad/gettaskbyproject', [ActividadController::class, 'gettaskbyproject'])->name('admin.actividades.gettaskbyproject');
Route::get('actividad/searchProject', [ActividadController::class, 'searchProject'])->name('admin.actividades.searchProject');
Route::get('actividad/searchObjetives', [ActividadController::class, 'searchObjetives'])->name('admin.actividades.searchObjetives');
Route::post('actividades/getinfotareas', [ActividadController::class, 'getinfotareas'])->name('admin.actividades.getinfotareas');

Route::resource('indicadores', IndicadorController::class)->names('admin.indicadores');

Route::resource('agendas', AgendaController::class)->names('admin.agendas');


// Route::get('/cron-job', function () {
//         $alerta = new Alerta();

//         $alerta->name = "prueba";
//         $alerta->description = "descrpicion prueba";
//         $alerta->days = 5;
//         $alerta->save();
//  });


 Route::get('/cron-job', [HomeController::class,'cronjob']);


Route::get('historicos/{year}', [HistoricoController::class,'index'])->name('admin.historicos.index');;
Route::get('historicos/porprocesos/{year}', [HistoricoController::class, 'porprocesos'])->name('admin.historicos.porprocesos');
Route::post('historicos/getinfoproyectos', [HistoricoController::class, 'getinfoproyectos'])->name('admin.historicos.getinfoproyectos');
Route::post('historicos/getinfotareas', [HistoricoController::class, 'getinfotareas'])->name('admin.historicos.getinfotareas');