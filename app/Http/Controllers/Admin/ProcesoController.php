<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proceso;
use App\Models\Proyecto;
use App\Models\Tarea;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProceso;


class ProcesoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.procesos.index')->only('index');
        $this->middleware('can:admin.procesos.create')->only('create', 'store');
        $this->middleware('can:admin.procesos.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.procesos.destroy')->only('destroy');
        $this->middleware('can:admin.procesos.enabled')->only('enabled');
    }


    public function index()
    {
        // $procesos = DB::select('select * from procesos where enabled = ?', [true]);
        $procesos = Proceso::All();
        $estrategicos = Proceso::where('estrategico',true)->get();
        $claves = Proceso::where('clave',true)->get();
        $soportes = Proceso::where('soporte',true)->get();
        return view('admin.procesos.index', compact("estrategicos","claves","soportes", "procesos"));
        
    }
    
    public function create()
    {
        return view('admin.procesos.create');
    }

    public function store(request $request)
    {
        // $proceso = new Proceso();

        // $proceso->name = $request->name;
        // $proceso->description = $request->description;
        // $proceso->enabled = true;
        // $proceso->save();

        $proceso = Proceso::create($request->all());

        return redirect()->route('admin.procesos.index', $proceso)->with('info', 'El Proceso se creo con exito'); 
    }
    
    public function edit(Proceso $proceso)
    {
        return view('admin.procesos.edit',compact("proceso"));
    }

    public function update(Request $request, Proceso $proceso)
    {
        $request->validate([ //si no se usa este tiene que ser StoreProceso (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);
        
        // $proceso->name= $request->name;
        // $proceso->description= $request->description;
        // $proceso->save();

        $proceso->update($request->all());
        return redirect()->route('admin.procesos.index', $proceso)->with('info', 'El Proceso se actualizo con exito');

    }

    public function getprocesocount()
    {
       
            $cantidad = Proceso::all()->count();
            return response()->json(['msg' => $cantidad]);
         
    }

    public function show(Proceso $proceso)
    {
        return view('admin.procesos.show',compact('proceso'));
    }

    public function enabled(Proceso $proceso)
    {
        $proceso->enabled=!$proceso->enabled;
        $proceso->save();
        $procesos = Proceso::All();
        return redirect()->route('admin.procesos.index',compact("procesos"))->with('info', 'El Proceso se actualizo con exito');
    }

    public function estrategico(Proceso $proceso)
    {
        if(!$proceso->estrategico)
        {
            $proceso->clave = false;    
            $proceso->soporte = false;
        }

        $proceso->estrategico=!$proceso->estrategico;
        $proceso->save();
        $procesos = Proceso::All();
        return redirect()->route('admin.procesos.index',compact("procesos"))->with('info', 'El Proceso se actualizo con exito');
    }

    public function clave(Proceso $proceso)
    {
        if(!$proceso->clave)
        {
            $proceso->soporte = false;    
            $proceso->estrategico = false;
        }

        $proceso->clave=!$proceso->clave;
        $proceso->save();
        $procesos = Proceso::All();
        return redirect()->route('admin.procesos.index',compact("procesos"))->with('info', 'El Proceso se actualizo con exito');
    }

    public function soporte(Proceso $proceso)
    {
        if(!$proceso->soporte)
        {
            $proceso->clave = false;    
            $proceso->estrategico = false;
        }

        $proceso->soporte=!$proceso->soporte;
        $proceso->save();
        $procesos = Proceso::All();
        return redirect()->route('admin.procesos.index',compact("procesos"))->with('info', 'El Proceso se actualizo con exito');
    }

    public function resumen(Request $request)
    {
        $year = date("Y");
        $procesoId = $request->get('peid');
        $proyectosconmedicion=[];

        
        $proyectosconmedicion = Proyecto::whereIn("estadoproyecto_id",[1,2,9,10])->where("measuring", 1)->where("year",$year)->where("id","!=",99)->where("proceso_id",$procesoId)->get();
        $proyectostotalbyyear = Proyecto::whereIn("estadoproyecto_id",[1,2,9,10])->where("year",$year)->where("proceso_id",$procesoId)->where("id","!=",99)->get()->count();
        $proyectossatisfactorios = Proyecto::whereIn("estadoproyecto_id",[1,2,9,10])->where("measuring", 1)->where("satisfactorio",1)->where("year",$year)->where("proceso_id",$procesoId)->where("id","!=",99)->get()->count();
        
        $proyectosids = Proyecto::where("year",$year)->where("id","!=",99)->get()->pluck("id");
        $tareas = Tarea::where("proceso_id",$procesoId)->whereIn("proyecto_id",$proyectosids)->get();
        
        $proyectosnosatisfactorios = $proyectosconmedicion->count() - $proyectossatisfactorios;
        $porcentajesatisfactorio =  $proyectosconmedicion->count()!= 0 ? $proyectossatisfactorios * 100 / $proyectosconmedicion->count() : $proyectossatisfactorios * 100;

        $data = [];


        $data[]=[
            
            'proymedibles' => $proyectostotalbyyear,
            'proyconmed' => $proyectosconmedicion->count(),
            'proysati' => $proyectossatisfactorios,
            'proynosati' => $proyectosnosatisfactorios,
            'porcproymedido' => $proyectostotalbyyear==0 ? round(($proyectosconmedicion->count()*100),2) : round(($proyectosconmedicion->count()*100)/$proyectostotalbyyear,2),
            'porcproysati' => $porcentajesatisfactorio
        ];


        return $data;
    }

}

