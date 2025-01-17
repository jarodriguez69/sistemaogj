<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use App\Models\Tarea;
use App\Models\Proyecto;
use App\Models\EstadoTarea;
use App\Models\User;
use App\Models\File;
use App\Models\Proceso;
use App\Models\Fuente;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Collection;

class TareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.tareas.index')->only('index');
        $this->middleware('can:admin.tareas.create')->only('create', 'store');
        $this->middleware('can:admin.tareas.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.tareas.destroy')->only('destroy');
        $this->middleware('can:admin.tareas.descarga')->only('descarga');
        $this->middleware('can:admin.tareas.deleteFile')->only('deleteFile');
    }


    public function index()
    {
        $year = date("Y");
        $idproyectos = new Collection();
        $idproyectos = Proyecto::where("year",$year)->get()->pluck("id");

        // $tareas = Tarea::where('status',12)->get();
        // $tareas = Tarea::paginate();
        $tareas = Tarea::whereIn('proyecto_id', $idproyectos)->get();
        return view('admin.tareas.index', compact("tareas"));
    }

    public function indexproyecto(Proyecto $proyecto)
    {
        $tareas = Tarea::where("proyecto_id",$proyecto->id)->get();
        return view('admin.tareas.indexproyecto', compact("tareas","proyecto"));
    }
    
    public function indexproceso(Proceso $proceso)
    {
        $year = date("Y");
        $proyectosids = Proyecto::where("year",$year)->get()->pluck("id");
        $tareas = Tarea::where("proceso_id",$proceso->id)->whereIn("proyecto_id",$proyectosids)->get();
        
        return view('admin.tareas.indexproceso', compact("tareas","proceso"));
    }

    public function gettaskbyproject(Request $request)
    {
        if($request->ajax())
        {
            $tareas = Tarea::with('estadotarea')->select('id', 'name', 'begin', 'end', 'estadotarea_id')->where('proyecto_id', $request->proyecto)->get();
            return Datatables::of($tareas)
                    ->addColumn('actions',function($tarea){
                        return view('admin.tareas.action', compact('tarea'));
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function create()
    {

        $proyectos = Proyecto::all();
        $estados = EstadoTarea::all();
        $procesos = Proceso::where('enabled',true)->orderBy('name')->get();
        $users = User::all();
        return view('admin.tareas.create', compact('proyectos', 'estados','users', 'procesos'));
    }

    public function createnc()
    {

        $proyectos = Proyecto::all();
        $estados = EstadoTarea::all();
        $procesos = Proceso::where('enabled',true)->orderBy('name')->get();
        $users = User::all();
        $fuentes = Fuente::all();
        return view('admin.tareas.createnc', compact('proyectos', 'estados','users', 'procesos','fuentes'));
    }

    public function store(request $request)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'proyecto_id'=>'required'
        ]);
        
        $tarea = tarea::create($request->all());
        
        if($request->file('file') != null){
            $documentos = $request->file('file')->store('public/documentos');
            $url = Storage::url($documentos);
            $name = $request->file('file')->getClientOriginalName();
            File::create([
                'url' => $url,
                'name' => $name,
                'tarea_id' => $tarea->id
            ]);
        }
        
        //relacion mucho a mucho
        if($request->users){
            $tarea->users()->attach($request->users);
            $correo = new ContactanosMailable($request->all());
            foreach($request->users as $userid){
                $useremail = User::where("id", $userid)->first()->email;
                Mail::to($useremail)->send($correo);
            }
        }
        
       
        return redirect()->route('admin.tareas.index', $tarea)->with('info','La Tarea se guardo con exito');
    }
    
    public function edit(Tarea $tarea)
    {
        $proyectos = Proyecto::all();
        $estados = EstadoTarea::where('enabled',true)->get();
        $users = User::all();
        $procesos = Proceso::where('enabled',true)->orderBy('name')->get();
        $fuentes = Fuente::all();
        $files =  File::where('tarea_id',$tarea->id)->get();
        
        return view('admin.tareas.edit',compact("tarea","proyectos","estados","users","files","procesos", "fuentes"));

    }

    public function update(Request $request, Tarea $tarea)
    {

        if($tarea->proyectos->objetivos2->first()->operativas->enabled==false)
        {
            $request->validate([ //si no se usa este tiene que ser StoreEje (request)
                'name'=>'required',
                'description'=>'required',
                'proyecto_id'=>'required'
            ]);
    
            $tarea->update($request->all());
    
            if($request->file('file') != null){
                $documentos = $request->file('file')->store('public/documentos');
                $url = Storage::url($documentos);
                $name = $request->file('file')->getClientOriginalName();
        
                File::create([
                    'url' => $url,
                    'name' => $name,
                    'tarea_id' => $tarea->id
                ]);
            } 

            //relacion mucho a mucho
            if($request->users){
                $tarea->users()->sync($request->users);
                
                $correo = new ContactanosMailable($request->all());
                
                foreach($request->users as $userid){
                    $useremail = User::where("id", $userid)->first()->email;
                    Mail::to($useremail)->send($correo);
    
                }
            }
            else{
                $tarea->users()->sync($request->users);
            }
            
            
            
            
            return redirect()->route('admin.tareas.edit', $tarea)->with('info', 'La tarea se actualizo con exito'); 
        }
        else
        {
            return redirect()->route('admin.tareas.edit', $tarea)->with('info', 'La tarea no se actualizo. POA Finalizado');
        }


       

    }

    public function deleteFile(File $file)
    {
        $url = str_replace('storage','public',$file->url);
        Storage::delete($url);
        $file->delete();
        $files =  File::where('tarea_id',$file->tarea_id)->get();
        return response()->json(['msg' => 'Eliminado con Exito', 'files' => $files]);
    }   

    public function descarga(File $file)
    {
        $url = str_replace('storage','public',$file->url);
        return Storage::download($url);
    }   

    public function show(Tarea $tarea)
    {
        $proyectos = Proyecto::all();
        $estados = EstadoTarea::all();
        $users = User::all();
        $procesos = Proceso::where('enabled',true)->orderBy('name')->get();
        $files =  File::where('tarea_id',$tarea->id)->get();
        return view('admin.tareas.show',compact("tarea","proyectos","estados","users","files", "procesos"));
    }

    public function destroy(Tarea $tarea)
    {
        $tarea->delete();
        
        return redirect()->route('admin.tareas.index')->with('info','La Tarea se elimino con exito');;
    }

    public function getinfotareas()
    {
        $year = date("Y");
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

    public function gettarea(Request $request)
    {
        if($request->ajax())
        {
            $tareas = Tarea::with('proyectos', 'estadotarea')->select('id', 'name', 'proyecto_id', 'begin', 'end', 'estadotarea_id')->get();
            return Datatables::of($tareas)
                    ->addColumn('actions',function($tarea){
                        return view('admin.tareas.action', compact('tarea'));
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }


    public function searchProject(Request $request)
    {
        $term = $request->get('term');

        $querys = Proyecto::where('name', 'LIKE' , '%' . $term . '%')->get();


        $data = [];

        foreach($querys as $query)
        {
            $data[] = [
                'id' => $query->id,
                'label' => $query->name.' - '.$query->year
            ];
        }
        return $data;
    }
}