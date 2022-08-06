<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Proyecto;
use App\Models\Eje;
use App\Models\Grupo;

class HomeController extends Controller
{
    public function index()
    {
        $proyectos = Proyecto::select(\DB::raw("COUNT(*) as count"))
                    ->whereYear('created_at', date('Y'))
                    ->groupBy(\DB::raw("Month(created_at)"))
                    ->pluck('count');



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



        $proyectosvencidos = Proyecto::where("estadoproyecto_id", 1)
                                        ->where("end", "<=", date('Y-m-d'))
                                        ->get();
        
        $porcentajevencidos =  $proyectosvencidos->count() * 100 / $totalproyectos;
        $porcentajenovencidos = 100 - $porcentajevencidos;

        $proyectosvencidoschart[] = [
            'name'         => "Vencidos",
            'y'      => $porcentajevencidos
        ];

        $proyectosvencidoschart[] = [
            'name'         => "No Vencidos",
            'y'      => $porcentajenovencidos
        ];
         
        return view('admin.index', compact('proyectos', 'data', 'proyectosiso', 'dataproyectosiso', 'proyectosvencidos','proyectosvencidoschart'));
    }

    public function calendar()
    {
        return view('admin.calendar');
    }

}
