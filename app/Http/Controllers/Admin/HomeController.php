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
         
        return view('admin.index', compact('proyectos', 'proyectosend', 'data', 'proyectosiso', 'dataproyectosiso', 'proyectosconmedicion','proyectosvencidoschart','proyectostotalbyyear','proyectosconmedicion','proyectossatisfactorios','proyectosnosatisfactorios'));

        

    }

    public function calendar()
    {
        return view('admin.calendar');
    }

}
