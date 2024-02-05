<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Eje;
use App\Models\Grupo;
use App\Models\Proceso;
use App\Models\Tarea;
use App\Models\Norma;
use Illuminate\Support\Collection;
use App\Enums\ProjectStatusEnum;

class HistoricoController extends Controller
{
    public function index(string $year)
    {
        $year = (int)$year;
        $procesos = Proceso::All();

        $proyectos = new Collection();
        $proyectosAux = Proyecto::select(\DB::raw("Month(created_at) as month, COUNT(*) as count"))
                    ->whereYear('created_at', $year)
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count', 'month');
                    
        $proyectosids = Proyecto::where("year",$year)->where("id","!=",99)->get()->pluck("id");
        $tareas = Tarea::whereIn("proyecto_id",$proyectosids)->get();

        for($i=1;$i<=12; $i++)
        {
            $val = $proyectosAux[$i] ?? null;
            
            if ($val != null){
                $proyectos->push($val);
            }
            else{
                $proyectos->push(0);
            }
        }
        
        $proyectosend = new Collection();
        $proyectosendAux = Proyecto::select(\DB::raw("Month(`real`) as a, COUNT(*) as count"))
                            ->where('year', $year)
                            ->whereIn('estadoproyecto_id', [ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value])
                            ->groupBy(\DB::raw("Month(`real`)"))
                            ->pluck('count', 'a');


        for($i=1;$i<=12; $i++)
        {
            $val = $proyectosendAux[$i] ?? null;
            
            if ($val != null){
                $proyectosend->push($val);
            }
            else{
                $proyectosend->push(0);
            }
        }


        $ejes = Eje::all();
        $totalproyectos = Proyecto::where('year',$year)->where("id","!=",99)->count();
        $totalproyectos = $totalproyectos == 0 ? 1 : $totalproyectos;
        $grupos = Grupo::all();

        $data = [];
        foreach ($ejes as $eje) {

            $idgrupos = Grupo::where("eje_id",$eje->id)->get()->pluck("id");

            $proyectosporeje = Proyecto::whereIn('grupo_id',$idgrupos)->where('year', $year)->where("id","!=",99)->get()->count();
            
            $porcentaje = ($proyectosporeje * 100) / $totalproyectos;
            $data[]       = [
                'name'         => $eje->name,
                'y'      => $porcentaje,
            ];
        }

        $proyectosiso = Proyecto::where('grupo_id',12)->where('year',$year)->where("id","!=",99)->pluck('name');
        $proyectosisototal = Proyecto::where('grupo_id',12)->where('year',$year)->where("id","!=",99)->get();
        $i = 0;
        $dataproyectosiso = [];
        
        $arrayvaloresproceso= array_fill(0, $proyectosisototal->count(), 0);
        $arrayvaloresterminado= array_fill(0, $proyectosisototal->count(), 0);
        
        foreach($proyectosisototal as $proyectoiso)
        {
            
            $tareasisoenproceso = $proyectoiso->tareas()->where('estadotarea_id',2)->get();
            $arrayvaloresproceso[$i] = $tareasisoenproceso->count();
            
            $tareasisoterminadas = $proyectoiso->tareas()->where('estadotarea_id',3)->get();
            $arrayvaloresterminado[$i] = $tareasisoterminadas->count();

            $i++;

        }
        
        $dataproyectosiso[]       = [
            'name'         => "En Proceso",
            'data'      => $arrayvaloresproceso,
        ];
        
        $dataproyectosiso[]       = [
            'name'         => "Terminadas",
            'data'      => $arrayvaloresterminado,
        ];


        
        
        $proyectostotalbyyear = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->where("id","!=",99)->get()->count();
        $proyectosconmedicion = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->where("id","!=",99)->get();
        $proyectossatisfactorios = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->where("id","!=",99)->get()->count();
        $proyectosnosatisfactorios = $proyectosconmedicion->count() - $proyectossatisfactorios;
        
        $porcentajesatisfactorio =  $proyectosconmedicion->count()!= 0 ? $proyectossatisfactorios * 100 / $proyectosconmedicion->count() : $proyectossatisfactorios * 100;
        $porcentajenosatisfactorio = 100 - $porcentajesatisfactorio;

        $proyectosvencidoschart[] = [
            'name'         => "Satisfactorio",
            'y'      => $porcentajesatisfactorio
        ];

        $proyectosvencidoschart[] = [
            'name'         => "No Satisfactorio",
            'y'      => $porcentajenosatisfactorio
        ];
         



       // EJE 1
       $idgrupos = new Collection();
       $idgrupos = Grupo::where("eje_id",1)->get()->pluck("id");
       $proyectostotalbyyear1 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosconmedicion1 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get();
       $proyectossatisfactorios1 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosnosatisfactorios1 = $proyectosconmedicion1->count() - $proyectossatisfactorios1;
       $proyectossinmedicion1 = $proyectostotalbyyear1 - $proyectosconmedicion1->count();
       $porcentajesatisfactorio1 =  $proyectosconmedicion1->count() != 0 ? $proyectossatisfactorios1 * 100 / $proyectosconmedicion1->count() : 0;
       $porcentajenosatisfactorio1 = 100 - $porcentajesatisfactorio1;

       $proyectosvencidoscharte1[] = [
           'name'         => "Satisfactorio",
           'y'      => $porcentajesatisfactorio1
       ];

       $proyectosvencidoscharte1[] = [
           'name'         => "No Satisfactorio",
           'y'      => $porcentajenosatisfactorio1
       ];
        

       // EJE 2
       $idgrupos = new Collection();
       $idgrupos = Grupo::where("eje_id",2)->get()->pluck("id");
       $proyectostotalbyyear2 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosconmedicion2 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get();
       $proyectossatisfactorios2 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosnosatisfactorios2 = $proyectosconmedicion2->count() - $proyectossatisfactorios2;
       $proyectossinmedicion2 = $proyectostotalbyyear2 - $proyectosconmedicion2->count();
       $porcentajesatisfactorio2 =  $proyectosconmedicion2->count() != 0 ? $proyectossatisfactorios2 * 100 / $proyectosconmedicion2->count() : 0;
       $porcentajenosatisfactorio2 = 100 - $porcentajesatisfactorio2;

       $proyectosvencidoscharte2[] = [
           'name'         => "Satisfactorio",
           'y'      => $porcentajesatisfactorio2
       ];

       $proyectosvencidoscharte2[] = [
           'name'         => "No Satisfactorio",
           'y'      => $porcentajenosatisfactorio2
       ];

       // EJE 3
       $idgrupos = new Collection();
       $idgrupos = Grupo::where("eje_id",3)->get()->pluck("id");
       $proyectostotalbyyear3 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosconmedicion3 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get();
       $proyectossatisfactorios3 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosnosatisfactorios3 = $proyectosconmedicion3->count() - $proyectossatisfactorios3;
       $proyectossinmedicion3 = $proyectostotalbyyear3 - $proyectosconmedicion3->count();
       $porcentajesatisfactorio3 =  $proyectosconmedicion3->count() != 0 ? $proyectossatisfactorios3 * 100 / $proyectosconmedicion3->count() : 0;
       $porcentajenosatisfactorio3 = 100 - $porcentajesatisfactorio3;

       $proyectosvencidoscharte3[] = [
           'name'         => "Satisfactorio",
           'y'      => $porcentajesatisfactorio3
       ];

       $proyectosvencidoscharte3[] = [
           'name'         => "No Satisfactorio",
           'y'      => $porcentajenosatisfactorio3
       ];

       // EJE 4
       $idgrupos = new Collection();
       $idgrupos = Grupo::where("eje_id",4)->get()->pluck("id");
       $proyectostotalbyyear4 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosconmedicion4 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get();
       $proyectossatisfactorios4 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosnosatisfactorios4 = $proyectosconmedicion4->count() - $proyectossatisfactorios4;
       $proyectossinmedicion4 = $proyectostotalbyyear4 - $proyectosconmedicion4->count();
       $porcentajesatisfactorio4 =  $proyectosconmedicion4->count() != 0 ? $proyectossatisfactorios4 * 100 / $proyectosconmedicion4->count() : 0;
       $porcentajenosatisfactorio4 = 100 - $porcentajesatisfactorio4;

       $proyectosvencidoscharte4[] = [
           'name'         => "Satisfactorio",
           'y'      => $porcentajesatisfactorio4
       ];

       $proyectosvencidoscharte4[] = [
           'name'         => "No Satisfactorio",
           'y'      => $porcentajenosatisfactorio4
       ];

       // EJE 5
       $idgrupos = new Collection();
       $idgrupos = Grupo::where("eje_id",5)->get()->pluck("id");
       $proyectostotalbyyear5 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosconmedicion5 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get();
       $proyectossatisfactorios5 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosnosatisfactorios5 = $proyectosconmedicion5->count() - $proyectossatisfactorios5;
       $proyectossinmedicion5 = $proyectostotalbyyear5 - $proyectosconmedicion5->count();
       $porcentajesatisfactorio5 =  $proyectosconmedicion5->count() != 0 ? $proyectossatisfactorios5 * 100 / $proyectosconmedicion5->count() : 0;
       $porcentajenosatisfactorio5 = 100 - $porcentajesatisfactorio5;

       $proyectosvencidoscharte5[] = [
           'name'         => "Satisfactorio",
           'y'      => $porcentajesatisfactorio5
       ];

       $proyectosvencidoscharte5[] = [
           'name'         => "No Satisfactorio",
           'y'      => $porcentajenosatisfactorio5
       ];

       // EJE 6
       $idgrupos = new Collection();
       $idgrupos = Grupo::where("eje_id",6)->get()->pluck("id");
       $proyectostotalbyyear6 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosconmedicion6 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get();
       $proyectossatisfactorios6 = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->where("id","!=",99)->get()->count();
       $proyectosnosatisfactorios6 = $proyectosconmedicion6->count() - $proyectossatisfactorios6;
       $proyectossinmedicion6 = $proyectostotalbyyear6 - $proyectosconmedicion6->count();
       $porcentajesatisfactorio6 =  $proyectosconmedicion6->count() != 0 ? $proyectossatisfactorios6 * 100 / $proyectosconmedicion6->count() : 0;
       $porcentajenosatisfactorio6 = 100 - $porcentajesatisfactorio6;

       $proyectosvencidoscharte6[] = [
           'name'         => "Satisfactorio",
           'y'      => $porcentajesatisfactorio6
       ];

       $proyectosvencidoscharte6[] = [
           'name'         => "No Satisfactorio",
           'y'      => $porcentajenosatisfactorio6
       ];


       return view('admin.historicos.index', compact('proyectos', 'procesos','proyectosend', 'data', 'proyectosiso', 'dataproyectosiso', 'proyectosconmedicion','proyectosvencidoschart','proyectostotalbyyear','proyectosconmedicion','proyectossatisfactorios','proyectosnosatisfactorios','proyectosvencidoscharte1','proyectosvencidoscharte2','proyectosvencidoscharte3','proyectosvencidoscharte4','proyectosvencidoscharte5','proyectosvencidoscharte6','proyectostotalbyyear1','proyectosconmedicion1','proyectostotalbyyear2','proyectosconmedicion2','proyectostotalbyyear3','proyectosconmedicion3','proyectostotalbyyear4','proyectosconmedicion4','proyectostotalbyyear5','proyectosconmedicion5','proyectostotalbyyear6','proyectosconmedicion6','proyectossinmedicion1','proyectossinmedicion2','proyectossinmedicion3','proyectossinmedicion4','proyectossinmedicion5','proyectossinmedicion6','porcentajesatisfactorio', 'tareas', 'year'));

    

    }

   

    public function porprocesos(Request $request, int $year)
    {
        $procesoId = $request->get('datesearch');
        $proyectosconmedicion=[];

        if($procesoId==0)
        {
            $proyectosconmedicion = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->where("id","!=",99)->get();
            $proyectostotalbyyear = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->where("id","!=",99)->get()->count();
            $proyectossatisfactorios = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->where("id","!=",99)->get()->count();

            $proyectosids = Proyecto::where("year",$year)->where("id","!=",99)->get()->pluck("id");
            $tareas = Tarea::whereIn("proyecto_id",$proyectosids)->get();
        }
        else
        {
            $proyectosconmedicion = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("year",$year)->where("id","!=",99)->where("proceso_id",$procesoId)->get();
            $proyectostotalbyyear = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("year",$year)->where("proceso_id",$procesoId)->where("id","!=",99)->get()->count();
            $proyectossatisfactorios = Proyecto::whereIn("estadoproyecto_id",[ProjectStatusEnum::PROCESOPLANIFICACION->value,ProjectStatusEnum::TERMINADOCIERRE->value,ProjectStatusEnum::TERMINADOCONACTIVIDADES->value,ProjectStatusEnum::PROCESOEJECUCION->value])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->where("proceso_id",$procesoId)->where("id","!=",99)->get()->count();
            
            $proyectosids = Proyecto::where("year",$year)->where("id","!=",99)->get()->pluck("id");
            $tareas = Tarea::where("proceso_id",$procesoId)->whereIn("proyecto_id",$proyectosids)->get();
        }
        $proyectosnosatisfactorios = $proyectosconmedicion->count() - $proyectossatisfactorios;
        $porcentajesatisfactorio =  $proyectosconmedicion->count()!= 0 ? $proyectossatisfactorios * 100 / $proyectosconmedicion->count() : $proyectossatisfactorios * 100;

        $data = [];
        $grilla=[];
        foreach($proyectosconmedicion as $query)
        {
            $grilla[] = [
                'id' => $query->id,
                'name' => $query->name,
                'eje' => $query->grupos->ejes->name,
                'grupos' => $query->grupos->name,
                'satisfactorio' => $query->satisfactorio ? "Satisfactorio" : "No Satisfactorio",
                'botones' => "<a href='". route('admin.proyectos.show', $query->id) ."' class=\"btn btn-sm btn-warning\" title=\"Ver\" target='_blank'><i class=\"fas fa-eye\"></i></a><a href='". route('admin.tareas.indexproyecto', $query->id) ."' class=\"btn btn-sm btn-dark\" title=\"Tareas\" target='_blank'><i class=\"fas fa-tasks\"></i></a><a href='". route('admin.proyectos.charts', $query->id) ."' class=\"btn btn-sm btn-primary\" title=\"Graficos\" target='_blank'><i class=\"fas fa-chart-bar\"></i></a>"
            ];
        }

        
        $grillatareas=[];
        foreach($tareas as $tarea)
        {
            $grillatareas[] = [
                'id' => $tarea->id,
                'name' => $tarea->name,
                'proyecto' => $tarea->proyectos->name,
                'estado' => $tarea->estadotarea->name,
                'botones' => '<a href="'. route('admin.tareas.show', $tarea->id) .'" class="btn btn-sm btn-warning" title="Ver" target=\'_blank\'><i class="fas fa-eye"></i></a> <a href="'. route('admin.tareas.edit', $tarea->id) .'" class="btn btn-sm btn-info" title="Editar" target=\'_blank\'><i class="fas fa-edit"></i></a> <a href="'. route('admin.tareas.destroy', $tarea->id) .'" class="btn btn-sm btn-danger" title="Eliminar" target=\'_blank\'><i class="fas fa-trash-alt"></i></a>'
            ];
        }

        $data[]=[
            'grilla' => $grilla,
            'grillatareas'=> $grillatareas,
            'proymedibles' => $proyectostotalbyyear,
            'proyconmed' => $proyectosconmedicion->count(),
            'proysati' => $proyectossatisfactorios,
            'proynosati' => $proyectosnosatisfactorios,
            'porcproymedido' => $proyectostotalbyyear==0 ? round(($proyectosconmedicion->count()*100),2) : round(($proyectosconmedicion->count()*100)/$proyectostotalbyyear,2),
            'porcproysati' => $porcentajesatisfactorio
        ];


        return $data;
    }

    public function getinfoproyectos(Request $request)
    {
        $year = $request->get('year');
        
        $cantidadproceso = Proyecto::where('estadoproyecto_id',1)->where('year', $year)->get()->count();            
        $cantidadprocesocontrol = Proyecto::where('estadoproyecto_id',10)->where('year', $year)->get()->count();            
        $cantidadterminados = Proyecto::where('estadoproyecto_id',2)->where('year', $year)->get()->count();
        $cantidadacumulados = Proyecto::where('estadoproyecto_id',3)->where('year', $year)->get()->count();            
        $cantidadsuspendidos = Proyecto::where('estadoproyecto_id',4)->where('year', $year)->get()->count();            
        $actividadesposteriores = Proyecto::where('estadoproyecto_id',9)->where('year', $year)->get()->count();     
        $cantidadconmedicion = Proyecto::whereIn("estadoproyecto_id",[1,2,9,10])->where('measuring',true)->where('year', $year)->get()->count();     
        $cantidadtotal = $cantidadproceso + $cantidadprocesocontrol + $cantidadterminados + $cantidadacumulados + $cantidadsuspendidos + $actividadesposteriores;
        return response()->json(['procesos'  => $cantidadproceso, 'terminados' => $cantidadterminados, 'acumulados' => $cantidadacumulados, 'suspendidos' => $cantidadsuspendidos, 'procesoscontrol' => $cantidadprocesocontrol, 'actividadesposteriores' => $actividadesposteriores,  'total' => $cantidadtotal, 'medicion' => $cantidadconmedicion]);
     
    }

    public function getinfotareas(Request $request)
    {
        $year=$request->get('year');
        $idproyectos = new Collection();
        $idproyectos = Proyecto::where("year",$year)->where("id","!=",99)->get()->pluck("id");

        $cantidadnoiniciada = Tarea::where('estadotarea_id',1)->whereIn('proyecto_id', $idproyectos)->get()->count();
        $cantidadproceso = Tarea::where('estadotarea_id',2)->whereIn('proyecto_id', $idproyectos)->get()->count();
        $cantidadterminados = Tarea::where('estadotarea_id',3)->whereIn('proyecto_id', $idproyectos)->get()->count();
        $cantidadrevisado = Tarea::where('estadotarea_id',4)->whereIn('proyecto_id', $idproyectos)->get()->count();
        $cantidadverificado = Tarea::where('estadotarea_id',5)->whereIn('proyecto_id', $idproyectos)->get()->count();
        $cantidadvalidado = Tarea::where('estadotarea_id',6)->whereIn('proyecto_id', $idproyectos)->get()->count();
        $cantidadrealizado = Tarea::where('estadotarea_id',7)->whereIn('proyecto_id', $idproyectos)->get()->count();


        $cantidadtotal = Tarea::whereIn('proyecto_id', $idproyectos)->get()->count();
        return response()->json([
                                'noiniciada' => $cantidadnoiniciada, 
                                'procesos'  => $cantidadproceso, 
                                'terminados' => $cantidadterminados, 
                                'revisada' => $cantidadrevisado, 
                                'verificada'  => $cantidadverificado, 
                                'validada' => $cantidadvalidado, 
                                'total'  => $cantidadtotal,
                                'realizados'  => $cantidadrealizado
                                
                            ]);
         
    }

}
