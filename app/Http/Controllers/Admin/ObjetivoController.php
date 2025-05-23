<?php

namespace App\Http\Controllers\Admin;
use Illuminate\Database\Eloquent\ModelNotFoundException; 
use App\Http\Controllers\Controller;
use App\Models\Objetivo;
use App\Models\Operativa;
use App\Models\EstadoObjetivo;
use App\Models\EstadoTarea;
use App\Models\User;
use App\Models\Tarea;
use App\Models\Actividad;
use App\Models\Desarrollo;
use App\Models\EstadoActividad;
use App\Models\Estrategica;
use App\Models\TipoObjetivo;
use Illuminate\Contracts\Validation\Rule;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Auth;
use Yajra\DataTables\Facades\DataTables;

class ObjetivoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.objetivos.index')->only('index');
        $this->middleware('can:admin.objetivos.create')->only('create', 'store');
        $this->middleware('can:admin.objetivos.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.objetivos.destroy')->only('destroy');
    }

    public function index()
    {
        
        $year = date("Y");
        
        $estrategicosproceso = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
        $estrategicosterminado = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
        $operativosproceso = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
        $operativosterminado = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
        $calidadproceso = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
        $calidadterminado = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
        $estrategicosexcluido = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
        $operativosexcluido = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
        $calidadexcluido = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();

         // OBJETIVOS
         $objetivosestrategicostotal=$estrategicosproceso + $estrategicosterminado + $estrategicosexcluido;
         $objetivosoperativostotal=$operativosproceso + $operativosterminado + $operativosexcluido;
         $objetivoscalidadtotal=$calidadproceso + $calidadterminado + $calidadexcluido;
 
         $estrategicosprocesopor = $objetivosestrategicostotal != 0 ? $estrategicosproceso * 100 / $objetivosestrategicostotal : 0;
         $estrategicosterminadopor = $objetivosestrategicostotal != 0 ? $estrategicosterminado * 100 / $objetivosestrategicostotal : 0;
         $estrategicosexcluidopor = $objetivosestrategicostotal != 0 ? $estrategicosexcluido * 100 / $objetivosestrategicostotal : 0;
 
         $operativosprocesopor = $objetivosoperativostotal != 0 ? $operativosproceso * 100 / $objetivosoperativostotal : 0;
         $operativosterminadopor =$objetivosoperativostotal != 0 ? $operativosterminado * 100 / $objetivosoperativostotal : 0;
         $operativosexcluidopor = $objetivosoperativostotal != 0 ? $operativosexcluido * 100 / $objetivosoperativostotal : 0;
 
         $calidadprocesopor = $objetivoscalidadtotal != 0 ? $calidadproceso * 100 / $objetivoscalidadtotal : 0;
         $calidadterminadopor = $objetivoscalidadtotal != 0 ? $calidadterminado * 100 / $objetivoscalidadtotal : 0;
         $calidadexcluidopor = $objetivoscalidadtotal != 0 ? $calidadexcluido * 100 / $objetivoscalidadtotal : 0;
 
        $chartoperativos[] = [
            'name'         => "Cumplidos",
            'y'      => $operativosterminadopor
        ];
 
        $chartoperativos[] = [
            'name'         => "No Cumplidos",
            'y'      => $operativosprocesopor
        ];
 
        $chartoperativos[] = [
         'name'         => "Excluidos",
         'y'      => $operativosexcluidopor
         ];
 
        $chartestrategicos[] = [
         'name'         => "Cumplidos",
         'y'      => $estrategicosterminadopor
         ];
 
         $chartestrategicos[] = [
             'name'         => "No Cumplidos",
             'y'      => $estrategicosprocesopor
         ];
 
         $chartestrategicos[] = [
             'name'         => "Excluidos",
             'y'      => $estrategicosexcluidopor
         ];
 
         $chartcalidad[] = [
             'name'         => "Cumplidos",
             'y'      => $calidadterminadopor
         ];
 
         $chartcalidad[] = [
             'name'         => "No Cumplidos",
             'y'      => $calidadprocesopor
         ];
 
         $chartcalidad[] = [
             'name'         => "Excluidos",
             'y'      => $calidadexcluidopor
         ];

         
        return view('admin.objetivos.index', compact("estrategicosproceso","estrategicosterminado","operativosproceso","operativosterminado","calidadproceso","calidadterminado", "estrategicosexcluido", "operativosexcluido", "calidadexcluido",'chartoperativos', 'chartestrategicos','chartcalidad'));
    }

    

    public function indexoperativa(Operativa $operativa)
    {
        $year = $operativa->created_at->year;
        $estrategicosproceso = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
        $estrategicosterminado = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
        $operativosproceso = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
        $operativosterminado = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
        $calidadproceso = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
        $calidadterminado = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
        $estrategicosexcluido = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
        $operativosexcluido = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
        $calidadexcluido = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
        
        // OBJETIVOS
        $objetivosestrategicostotal=$estrategicosproceso + $estrategicosterminado + $estrategicosexcluido;
        $objetivosoperativostotal=$operativosproceso + $operativosterminado + $operativosexcluido;
        $objetivoscalidadtotal=$calidadproceso + $calidadterminado + $calidadexcluido;

        $estrategicosprocesopor = $objetivosestrategicostotal != 0 ? $estrategicosproceso * 100 / $objetivosestrategicostotal : 0;
        $estrategicosterminadopor = $objetivosestrategicostotal != 0 ? $estrategicosterminado * 100 / $objetivosestrategicostotal : 0;
        $estrategicosexcluidopor = $objetivosestrategicostotal != 0 ? $estrategicosexcluido * 100 / $objetivosestrategicostotal : 0;

        $operativosprocesopor = $objetivosoperativostotal != 0 ? $operativosproceso * 100 / $objetivosoperativostotal : 0;
        $operativosterminadopor = $objetivosoperativostotal != 0 ? $operativosterminado * 100 / $objetivosoperativostotal : 0;
        $operativosexcluidopor = $objetivosoperativostotal != 0 ? $operativosexcluido * 100 / $objetivosoperativostotal : 0;

        $calidadprocesopor = $objetivoscalidadtotal != 0 ? $calidadproceso * 100 / $objetivoscalidadtotal : 0;
        $calidadterminadopor = $objetivoscalidadtotal != 0 ? $calidadterminado * 100 / $objetivoscalidadtotal : 0;
        $calidadexcluidopor = $objetivoscalidadtotal != 0 ? $calidadexcluido * 100 / $objetivoscalidadtotal : 0;

       $chartoperativos[] = [
           'name'         => "Cumplidos",
           'y'      => $operativosterminadopor
       ];

       $chartoperativos[] = [
           'name'         => "No Cumplidos",
           'y'      => $operativosprocesopor
       ];

       $chartoperativos[] = [
        'name'         => "Excluidos",
        'y'      => $operativosexcluidopor
        ];

       $chartestrategicos[] = [
        'name'         => "Cumplidos",
        'y'      => $estrategicosterminadopor
        ];

        $chartestrategicos[] = [
            'name'         => "No Cumplidos",
            'y'      => $estrategicosprocesopor
        ];

        $chartestrategicos[] = [
            'name'         => "Excluidos",
            'y'      => $estrategicosexcluidopor
        ];

        $chartcalidad[] = [
            'name'         => "Cumplidos",
            'y'      => $calidadterminadopor
        ];

        $chartcalidad[] = [
            'name'         => "No Cumplidos",
            'y'      => $calidadprocesopor
        ];

        $chartcalidad[] = [
            'name'         => "Excluidos",
            'y'      => $calidadexcluidopor
        ];

        return view('admin.objetivos.indexoperativa', compact("operativa", "estrategicosproceso","estrategicosterminado","operativosproceso","operativosterminado","calidadproceso","calidadterminado","estrategicosexcluido","operativosexcluido","calidadexcluido",'chartoperativos', 'chartestrategicos','chartcalidad'));
    }

    public function indexstatus(int $estrategicaid, int $operativaid, int $estado)
    {
        
        if($estrategicaid != 0)
        {
            $idbyestrategicas = new Collection();
            $idbyestrategicas = Operativa::where("estrategica_id",$estrategicaid)->get()->pluck("id");
            $objetivos = Objetivo::where('tipoobjetivo_id', 1)->where('estadoobjetivo_id', $estado)->whereIn("operativa_id",$idbyestrategicas)->get();


            
            $years = Operativa::distinct()
                    ->whereNotNull('created_at')
                    ->get([\DB::raw('YEAR(created_at) as year')])
                    ->pluck('year');
            
            $estrategicosproceso = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $estrategicosterminado = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $operativosproceso = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $operativosterminado = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $calidadproceso = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $calidadterminado = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $estrategicosexcluido = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $operativosexcluido = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
            $calidadexcluido = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereIn(\DB::raw('YEAR(begin)'), $years)->get()->count();
        }
        else
        {
            $objetivos = Objetivo::where('estadoobjetivo_id', $estado)->where("operativa_id",$operativaid)->get();
            
            $operativa= Operativa::where("id",$operativaid)->get();
            $year=$operativa->first()->created_at->year;
            $estrategicosproceso = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
            $estrategicosterminado = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
            $operativosproceso = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
            $operativosterminado = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
            $calidadproceso = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',1)->whereYear('begin', '=', $year)->get()->count();
            $calidadterminado = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',2)->whereYear('begin', '=', $year)->get()->count();
            $estrategicosexcluido = Objetivo::where('tipoobjetivo_id',1)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
            $operativosexcluido = Objetivo::where('tipoobjetivo_id',2)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
            $calidadexcluido = Objetivo::where('tipoobjetivo_id',3)->where("id","!=",1)->where('estadoobjetivo_id',3)->whereYear('begin', '=', $year)->get()->count();
        }

        // OBJETIVOS
        $objetivosestrategicostotal=$estrategicosproceso + $estrategicosterminado + $estrategicosexcluido;
        $objetivosoperativostotal=$operativosproceso + $operativosterminado + $operativosexcluido;
        $objetivoscalidadtotal=$calidadproceso + $calidadterminado + $calidadexcluido;

        $estrategicosprocesopor = $estrategicosproceso * 100 / $objetivosestrategicostotal;
        $estrategicosterminadopor = $estrategicosterminado * 100 / $objetivosestrategicostotal;
        $estrategicosexcluidopor = $estrategicosexcluido * 100 / $objetivosestrategicostotal;

        $operativosprocesopor = $operativosproceso * 100 / $objetivosoperativostotal;
        $operativosterminadopor = $operativosterminado * 100 / $objetivosoperativostotal;
        $operativosexcluidopor = $operativosexcluido * 100 / $objetivosoperativostotal;

        $calidadprocesopor = $calidadproceso * 100 / $objetivoscalidadtotal;
        $calidadterminadopor = $calidadterminado * 100 / $objetivoscalidadtotal;
        $calidadexcluidopor = $calidadexcluido * 100 / $objetivoscalidadtotal;

       $chartoperativos[] = [
           'name'         => "Cumplidos",
           'y'      => $operativosterminadopor
       ];

       $chartoperativos[] = [
           'name'         => "No Cumplidos",
           'y'      => $operativosprocesopor
       ];

       $chartoperativos[] = [
        'name'         => "Excluidos",
        'y'      => $operativosexcluidopor
        ];

       $chartestrategicos[] = [
        'name'         => "Cumplidos",
        'y'      => $estrategicosterminadopor
        ];

        $chartestrategicos[] = [
            'name'         => "No Cumplidos",
            'y'      => $estrategicosprocesopor
        ];

        $chartestrategicos[] = [
            'name'         => "Excluidos",
            'y'      => $estrategicosexcluidopor
        ];

        $chartcalidad[] = [
            'name'         => "Cumplidos",
            'y'      => $calidadterminadopor
        ];

        $chartcalidad[] = [
            'name'         => "No Cumplidos",
            'y'      => $calidadprocesopor
        ];

        $chartcalidad[] = [
            'name'         => "Excluidos",
            'y'      => $calidadexcluidopor
        ];

        return view('admin.objetivos.indexstatus', compact("objetivos", "estrategicosproceso","estrategicosterminado","operativosproceso","operativosterminado","calidadproceso","calidadterminado","estrategicosexcluido","operativosexcluido","calidadexcluido",'chartoperativos', 'chartestrategicos','chartcalidad'));
    }

    public function getprojectcount()
    {
        try {
            
            $cantidad = Objetivo::all()->count();
            return response()->json(['msg' => $cantidad]);
          } catch (ModelNotFoundException $e) {
            return response()->json(['msg' => 'Error al obtener datos']);
          }
    }

    public function create()
    {
        $operativas = Operativa::where('enabled',false)->get();
        $tipos = TipoObjetivo::all();
        $estados = EstadoObjetivo::all();
        $users = User::all();
        $odses = Desarrollo::where('enabled',true)->get();
        return view('admin.objetivos.create', compact('operativas','tipos','estados', 'users', 'odses'));
    }

    public function store(request $request)
    {
        
        // $objetivo = new objetivo();

        // $objetivo->name = $request->name;
        // $objetivo->description = $request->description;
        // $objetivo->enabled = true;
        // $objetivo->save();
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'operativa_id'=>'required',
            'meta' => 'required'
        ]);
        
       
        $request->merge(['user_id' => Auth::user()->id]);
        $objetivo = objetivo::create($request->all());

        if($request->desarrollos){
            $objetivo->desarrollos()->attach($request->desarrollos);
        }
        
        //relacion mucho a mucho
        // if($request->eje){
        //     $objetivo->ejes()->attach($request->eje);
        // }

        return redirect()->route('admin.objetivos.index', $objetivo)->with('info','El Objetivo se guardo con exito');        ;
    }
    
    public function edit(Objetivo $objetivo)
    {
        $operativas = Operativa::where('enabled',false)->get();
        $estados = EstadoObjetivo::all();
        $users = User::all();
        $tipos = TipoObjetivo::all();
        $odses = Desarrollo::where('enabled',true)->get();
        return view('admin.objetivos.edit', compact("objetivo", "operativas", "estados", "users", "tipos", "odses"));
    }

    public function update(Request $request, Objetivo $objetivo)
    {
        if($objetivo->operativas->enabled==false){ 
            $request->validate([ //si no se usa este tiene que ser StoreEje (request)
                'name'=>'required',
                'description'=>'required',
                'operativa_id'=>'required',
                'meta' => 'required'
                   
            ]);
            
            $objetivo->update($request->all());
    
            if($request->desarrollos){
                $objetivo->desarrollos()->sync($request->desarrollos);
            }
    
            //relacion mucho a mucho
            // if($request->tags){
            //     $objetivo->tags()->sync($request->tags);
            // }
    
            return redirect()->route('admin.objetivos.index', $objetivo)->with('info', 'El Objetivo se actualizo con exito'); 
        }
    }

    public function show(Objetivo $objetivo)
    {
        $odses = Desarrollo::where('enabled',true)->get();
        return view('admin.objetivos.show',compact('objetivo','odses'));
    }

    // public function enabled(objetivo $objetivo)
    // {
    //     $objetivo->enabled=!$objetivo->enabled;
    //     $objetivo->save();
    //     $objetivos = objetivo::paginate();
        
    //     return redirect()->route('admin.objetivos.index', compact("objetivos"))->with('info', 'El Objetivo se actualizo con exito'); 
    // }

    public function destroy(Objetivo $objetivo)
    {
        $objetivo->delete();
        
        return redirect()->route('admin.objetivos.index');
    }

    public function getinfoobjetivos()
    {

            
            $cantidadproceso = Objetivo::where('estadoobjetivo_id',1)->get()->count();            
            $cantidadterminados = Objetivo::where('estadoobjetivo_id',2)->get()->count();
            $cantidadacumulados = Objetivo::where('estadoobjetivo_id',3)->get()->count();            
            $cantidadsuspendidos = Objetivo::where('estadoobjetivo_id',4)->get()->count();            
            $cantidadnoiniciados = Objetivo::where('estadoobjetivo_id',5)->get()->count();            
            $cantidadtotal = Objetivo::all()->count();
            return response()->json(['procesos'  => $cantidadproceso, 'terminados' => $cantidadterminados, 'acumulados' => $cantidadacumulados, 'suspendidos' => $cantidadsuspendidos, 'noiniciados' => $cantidadnoiniciados,  'total' => $cantidadtotal]);
         
    }

    public function getobjetive(Request $request)
    {
        if($request->ajax())
        {
            $year = date("Y");
            $objetivos = Objetivo::with('operativas', 'user', 'tipoobjetivo', 'estadoobjetivos')->select('id', 'name', 'operativa_id', 'tipoobjetivo_id', 'meta','estadoobjetivo_id', 'user_id', 'esporcentaje')->where("id","!=",1)->whereYear('begin', '=', $year)->get();
            return Datatables::of($objetivos)
                    ->addColumn('actions',function($objetivo){
                        return view('admin.objetivos.action', compact('objetivo'));
                    })
                    ->addColumn('avance', function($objetivo) {
                        
                        $actividades = Actividad::where('objetivo_id', $objetivo->id)->where('estadoactividad_id', '!=', 3)->get();
                        $avance = 0 + $actividades->sum('porcentaje');
                        return  $avance . "%";
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }
    
    // public function getobjetivebystatus(Request $request, int $estrategicaid, int $estado)
    public function getobjetivebystatus(Request $request,int $estrategicaid, int $estado)
    {

        if($request->ajax())
        {
            
            $objetivos = Objetivo::with('operativas', 'user', 'tipoobjetivo', 'estadoobjetivos')->select('id', 'name', 'operativa_id', 'tipoobjetivo_id', 'meta','estadoobjetivo_id', 'user_id', 'esporcentaje')->get();
            return Datatables::of($objetivos)
                    ->addColumn('actions',function($objetivo){
                        return view('admin.objetivos.action', compact('objetivo'));
                    })
                    ->addColumn('avance', function($objetivo) {
                        
                        $actividades = Actividad::where('objetivo_id', $objetivo->id)->where('estadoactividad_id', '!=', 3)->get();
                        $avance = 0 + $actividades->sum('porcentaje');
                        return  $avance . "%";
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function getprojectbygroup(Request $request)
    {
        if($request->ajax())
        {

            $objetivos = Objetivo::with('operativas', 'user', 'tipoobjetivo', 'estadoobjetivos')->select('id', 'name', 'operativa_id', 'tipoobjetivo_id', 'meta','estadoobjetivo_id', 'user_id', 'esporcentaje')->where('operativa_id', $request->operativa)->get();
            return Datatables::of($objetivos)
                    ->addColumn('actions',function($objetivo){
                        return view('admin.objetivos.action', compact('objetivo'));
                    })
                    ->addColumn('avance', function($objetivo) {
                        
                        $actividades = Actividad::where('objetivo_id', $objetivo->id)->where('estadoactividad_id', '!=', 3)->get();

                        return $actividades->sum('porcentaje') . "%";
                    })
                    ->rawColumns(['actions'])
                    ->make(true);


           
        }
    }

    public function charts (Objetivo $objetivo)
    {

        $cantidadcompletas = $objetivo->actividades()->where('estadoactividad_id',2)->get()->count();
        $cantidadtotal = $objetivo->actividades()->count();
        $cantidadtotal = $cantidadtotal == 0 ? 1 : $cantidadtotal;
        
        $porcentaje=($cantidadcompletas * 100) / $cantidadtotal;
        $data = [
            ['% Completado',  $porcentaje],
            ['% Faltante',  100-$porcentaje]
        ];



        $estadosTareas = EstadoActividad::all();
        $i = 0;
        foreach ($estadosTareas as $estadotarea) {

            $cantidadporestado = $objetivo->actividades()->where('estadoactividad_id',$estadotarea->id)->get()->count();
            
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
        $tareasall = $objetivo->actividades;

        foreach($tareasall as $item)
        {
            $tareas[] = $item->name;
            $porcentajeparcial[] = $item->porcentaje;
            // if($item->estadoactividad->id == 3)
            // {
                
            // }
            // else if($item->estadoactividad->id == 2)
            // {
            //     $porcentajeparcial[] = 50;
            // }
            // else
            // {
            //     $porcentajeparcial[] = 0;
            // }
        }
        $porcentajetareas[] =  [
                        'name'=> 'Completado',
                        'data' => $porcentajeparcial
                    ];

        
        $tareasvencidas = Actividad::where("estadoactividad_id", 2)
        ->where("objetivo_id", $objetivo->id)
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

        return view("admin.objetivos.charts", compact('objetivo','pasoporestados', 'data', 'tareas', 'porcentajetareas','tareasvencidas', 'tareasvencidaschart'));
    }

    public function searchObjetivesbyStrategy(Request $request)
    {
        $idbyestrategicas = new Collection();
        $id = $request->get('peid');
        $idbyestrategicas = Operativa::where("estrategica_id",$id)->get()->pluck("id");
        $querysProceso = Objetivo::where('tipoobjetivo_id', 1)->where('estadoobjetivo_id', 1)->whereIn("operativa_id",$idbyestrategicas)->get()->count();
        $querysTerminado = Objetivo::where('tipoobjetivo_id', 1)->where('estadoobjetivo_id', 2)->whereIn("operativa_id",$idbyestrategicas)->get()->count();
        $total = $querysProceso + $querysTerminado;

        $data = [
            ['En Proceso', ($querysProceso / $total) * 100],
            ['Terminados', ($querysTerminado / $total) * 100]
        ];

        
        return $data;
    }

    public function searchObjetivesbyOperative(Request $request)
    {
        $id = $request->get('peid');
        $querysProceso = Objetivo::where('estadoobjetivo_id', 1)->where("operativa_id",$id)->get()->count();
        $querysTerminado = Objetivo::where('estadoobjetivo_id', 2)->where("operativa_id",$id)->get()->count();
        $total = $querysProceso + $querysTerminado;

        $data = [
            ['En Proceso', ($querysProceso / $total) * 100],
            ['Terminados', ($querysTerminado / $total) * 100]
        ];

        
        return $data;
    }

    public function cargas(Request $request)
    {
        
        
        $term = $request->get('datesearch');
        $fecha= date('d/m/Y', strtotime($term));
        $querys = Objetivo::where('tracing', 'LIKE', '%'.$fecha.'%')->get();


        $data = [];

        foreach($querys as $query)
        {
            $data[] = [
                'id' => $query->id,
                'label' => $query->name,
                'poa' => $query->operativas->name
            ];
        }
        return $data;
    }

}