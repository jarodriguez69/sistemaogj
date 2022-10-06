<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Eje;
use App\Models\Grupo;
use Illuminate\Support\Collection;

class HomeController extends Controller
{
    public function index()
    {
        $proyectos = new Collection();
        $proyectosAux = Proyecto::select(\DB::raw("Month(created_at) as month, COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count', 'month');
                    
        
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
                            ->whereYear('real', date('Y'))
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
        $totalproyectos = Proyecto::all()->count();
        $totalproyectos = $totalproyectos == 0 ? 1 : $totalproyectos;
        $grupos = Grupo::all();

        $data = [];
        foreach ($grupos as $grupo) {

            $proyectosporeje = Proyecto::where('grupo_id',$grupo->id)->get()->count();
            
            $porcentaje = ($proyectosporeje * 100) / $totalproyectos;
            $data[]       = [
                'name'         => $grupo->name,
                'y'      => $porcentaje,
            ];
        }
            
        $proyectosiso = Proyecto::where('grupo_id',12)->pluck('name');
        $proyectosisototal = Proyecto::where('grupo_id',12)->get();
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


        
        $year = date("Y");
        $proyectostotalbyyear = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->get()->count();
        $proyectosconmedicion = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->get();
        $proyectossatisfactorios = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->get()->count();
        $proyectosnosatisfactorios = $proyectosconmedicion->count() - $proyectossatisfactorios;
        
        $porcentajesatisfactorio =  $proyectossatisfactorios * 100 / $proyectosconmedicion->count();
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
       $proyectostotalbyyear1 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
       $proyectosconmedicion1 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get();
       $proyectossatisfactorios1 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
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
       $proyectostotalbyyear2 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
       $proyectosconmedicion2 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get();
       $proyectossatisfactorios2 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
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
       $proyectostotalbyyear3 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
       $proyectosconmedicion3 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get();
       $proyectossatisfactorios3 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
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
       $proyectostotalbyyear4 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
       $proyectosconmedicion4 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get();
       $proyectossatisfactorios4 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
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
       $proyectostotalbyyear5 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
       $proyectosconmedicion5 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get();
       $proyectossatisfactorios5 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
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
       $proyectostotalbyyear6 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
       $proyectosconmedicion6 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get();
       $proyectossatisfactorios6 = Proyecto::whereNotIn("estadoproyecto_id",[3,4])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->whereIn('grupo_id', $idgrupos)->get()->count();
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

       return view('admin.index', compact('proyectos', 'proyectosend', 'data', 'proyectosiso', 'dataproyectosiso', 'proyectosconmedicion','proyectosvencidoschart','proyectostotalbyyear','proyectosconmedicion','proyectossatisfactorios','proyectosnosatisfactorios','proyectosvencidoscharte1','proyectosvencidoscharte2','proyectosvencidoscharte3','proyectosvencidoscharte4','proyectosvencidoscharte5','proyectosvencidoscharte6','proyectostotalbyyear1','proyectosconmedicion1','proyectostotalbyyear2','proyectosconmedicion2','proyectostotalbyyear3','proyectosconmedicion3','proyectostotalbyyear4','proyectosconmedicion4','proyectostotalbyyear5','proyectosconmedicion5','proyectostotalbyyear6','proyectosconmedicion6','proyectossinmedicion1','proyectossinmedicion2','proyectossinmedicion3','proyectossinmedicion4','proyectossinmedicion5','proyectossinmedicion6'));

       

    }

    public function calendar()
    {
        return view('admin.calendar');
    }

}
