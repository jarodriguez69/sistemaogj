<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException; 
use App\Http\Controllers\Controller;
use App\Models\Proyecto;
use App\Models\Grupo;
use App\Models\EstadoProyecto;
use App\Models\EstadoTarea;
use App\Models\Objetivo;
use App\Models\Operativa;
use App\Models\Parte;
use App\Models\User;
use App\Models\Tarea;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;


class ProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.proyectos.index')->only('index');
        $this->middleware('can:admin.proyectos.create')->only('create', 'store');
        $this->middleware('can:admin.proyectos.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.proyectos.destroy')->only('destroy');
    }

    public function index(Request $request)
    {
        // $proyectos = Proyecto::where('status',12)->get();
        $proyectos = Proyecto::all();
        //$proyectos = Proyecto::paginate();
        
        return view('admin.proyectos.index', compact("proyectos"));
    }

    

    public function indexgrupo(Grupo $grupo)
    {
        $proyectos = Proyecto::where("grupo_id",$grupo->id)->get();
        return view('admin.proyectos.indexgrupo', compact("proyectos","grupo"));
    }


    public function getprojectcount()
    {
        try {
            
            $cantidad = Proyecto::all()->count();
            return response()->json(['msg' => $cantidad]);
          } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => 'Error al obtener datos']);
          }
    }

    public function setsession(Request $request)
    {
        session(['search' => $request->str]);
        return response()->json([session('search')]);
    }

    public function create()
    {
        $grupos = Grupo::where('enabled',true)->get();
        $users = User::all();
        $equipos = User::all();
        $partes = Parte::where('enabled',true)->get();
        $poas = Operativa::where('enabled',0)->get();//finalizada=1 Nofinalizada=0
        return view('admin.proyectos.create', compact('grupos','users','equipos','partes','poas'));
    }

    public function store(request $request)
    {
        
        // $proyecto = new proyecto();

        // $proyecto->name = $request->name;
        // $proyecto->description = $request->description;
        // $proyecto->enabled = true;
        // $proyecto->save();
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'grupo_id'=>'required'
        ]);
       
        
        
        $proyecto = proyecto::create($request->all());
        if($request->equipos){
            $proyecto->equipos()->attach($request->equipos);
        }
        if($request->partes){
            $proyecto->partes()->attach($request->partes);
        }

        //relacion mucho a mucho
        // if($request->eje){
        //     $proyecto->ejes()->attach($request->eje);
        // }

        return redirect()->route('admin.proyectos.index', $proyecto)->with('info','El Proyecto se guardo con exito');        ;
    }
    
    public function edit(Proyecto $proyecto, request $request)
    {
        $grupos = Grupo::all();
        $estados = EstadoProyecto::where('enabled',true)->get();
        $users = User::all();
        $equipos = User::all();
        $partes = Parte::where('enabled',true)->get();
        $poas = Operativa::where('enabled',0)->get();//finalizada=1 Nofinalizada=0
        $objetivosdelpoa =  Objetivo::where('operativa_id', $proyecto->objetivos2->operativas->id)->get();
        return view('admin.proyectos.edit', compact("proyecto","grupos","estados","users","equipos","partes","poas","objetivosdelpoa"));
    }

    public function update(Request $request, Proyecto $proyecto)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'grupo_id'=>'required'
        ]);
        $proyecto->partes()->sync($request->partes);
        $proyecto->equipos()->sync($request->equipos);
        $proyecto->update($request->all());

        //relacion mucho a mucho
        // if($request->tags){
        //     $proyecto->tags()->sync($request->tags);
        // }

        return redirect()->route('admin.proyectos.index', $proyecto)->with('info', 'El Proyecto se actualizo con exito'); 

    }

    public function show(Proyecto $proyecto)
    {
        $partes = Parte::where('enabled',true)->get();
        $equipos = User::all();
        return view('admin.proyectos.show',compact('proyecto','equipos','partes'));
    }

    // public function enabled(proyecto $proyecto)
    // {
    //     $proyecto->enabled=!$proyecto->enabled;
    //     $proyecto->save();
    //     $proyectos = proyecto::paginate();
        
    //     return redirect()->route('admin.proyectos.index', compact("proyectos"))->with('info', 'El Proyecto se actualizo con exito'); 
    // }

    public function destroy(Proyecto $proyecto)
    {
        $proyecto->delete();
        
        return redirect()->route('admin.proyectos.index');
    }

    public function getinfoproyectos()
    {

            
            $cantidadproceso = Proyecto::where('estadoproyecto_id',1)->get()->count();            
            $cantidadprocesocontrol = Proyecto::where('estadoproyecto_id',10)->get()->count();            
            $cantidadterminados = Proyecto::where('estadoproyecto_id',2)->get()->count();
            $cantidadacumulados = Proyecto::where('estadoproyecto_id',3)->get()->count();            
            $cantidadsuspendidos = Proyecto::where('estadoproyecto_id',4)->get()->count();            
            $actividadesposteriores = Proyecto::where('estadoproyecto_id',9)->get()->count();     
            $cantidadconmedicion = Proyecto::where('measuring',true)->get()->count();     
            $cantidadtotal = Proyecto::all()->count();
            return response()->json(['procesos'  => $cantidadproceso, 'terminados' => $cantidadterminados, 'acumulados' => $cantidadacumulados, 'suspendidos' => $cantidadsuspendidos, 'procesoscontrol' => $cantidadprocesocontrol, 'actividadesposteriores' => $actividadesposteriores,  'total' => $cantidadtotal, 'medicion' => $cantidadconmedicion]);
         
    }

    public function getproject(Request $request)
    {
        if($request->ajax())
        {
            $proyectos = Proyecto::with('grupos', 'objetivos2', 'estadoproyecto', 'user')->select('id', 'name', 'grupo_id', 'objetivo_id','begin', 'end', 'estadoproyecto_id', 'user_id')->get();
            return Datatables::of($proyectos)
                    ->addColumn('actions',function($proyecto){
                        return view('admin.proyectos.action', compact('proyecto'));
                    })
                    ->addColumn('poa',function($proyecto){
                        return $proyecto->objetivos2->operativas->name;
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function getprojectbygroup(Request $request)
    {
        if($request->ajax())
        {
            $proyectos = Proyecto::with('objetivos2','estadoproyecto', 'user')->select('id', 'name', 'objetivo_id', 'begin', 'end', 'estadoproyecto_id', 'user_id')->where('grupo_id', $request->grupo)->get();
            return Datatables::of($proyectos)
                    ->addColumn('actions',function($proyecto){
                        return view('admin.proyectos.action', compact('proyecto'));
                    })
                    ->addColumn('poa',function($proyecto){
                        return $proyecto->objetivos2->operativas->name;
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function charts (Proyecto $proyecto)
    {

        $cantidadcompletas = $proyecto->tareas()->where('estadotarea_id',3)->get()->count();
        $cantidadtotal = $proyecto->tareas()->count();
        $cantidadtotal = $cantidadtotal == 0 ? 1 : $cantidadtotal;
        
        $porcentaje=($cantidadcompletas * 100) / $cantidadtotal;
        $data = [
            ['% Completado',  $porcentaje],
            ['% Faltante',  100-$porcentaje]
        ];



        $estadosTareas = EstadoTarea::all();
        $i = 0;
        foreach ($estadosTareas as $estadotarea) {

            $cantidadporestado = $proyecto->tareas()->where('estadotarea_id',$estadotarea->id)->get()->count();
            
            $porcentaje = ($cantidadporestado * 100) / $cantidadtotal;
            if($i!=0)
            {
                $pasoporestados[]       = [
                    'name'         => $estadotarea->name,
                    'y'      => $porcentaje,
                ];
            }
            else
            {
                $pasoporestados[]       = [
                    'name'         => $estadotarea->name,
                    'y'      => $porcentaje,
                    'sliced' => true,
                    'selected' => true
                ];
                $i++;
            }
            
        }
            
        $tareas = [];
        $porcentajetareas = [];
        $porcentajeparcial=[];
        $tareasall = $proyecto->tareas;

        foreach($tareasall as $item)
        {
            $tareas[] = $item->name;
            if($item->estadotarea->id == 3)
            {
                $porcentajeparcial[] = 100;
            }
            else if($item->estadotarea->id == 2)
            {
                $porcentajeparcial[] = 50;
            }
            else
            {
                $porcentajeparcial[] = 0;
            }
        }
        $porcentajetareas[] =  [
                        'name'=> 'Completado',
                        'data' => $porcentajeparcial
                    ];

        
        $tareasvencidas = Tarea::where("estadotarea_id", 2)
        ->where("proyecto_id", $proyecto->id)
        ->where("end", "<=", date('Y-m-d'))
        ->get();
        

        $porcentajevencidos =  $tareasvencidas->count() * 100 / $cantidadtotal;
        $porcentajenovencidos = 100 - $porcentajevencidos;

        $tareasvencidaschart[] = [
            'name'         => "Vencidas",
            'y'      => $porcentajevencidos
        ];

        $tareasvencidaschart[] = [
            'name'         => "No Vencidas",
            'y'      => $porcentajenovencidos
        ];

        return view("admin.proyectos.charts", compact('proyecto','pasoporestados', 'data', 'tareas', 'porcentajetareas','tareasvencidas', 'tareasvencidaschart'));
    }


}