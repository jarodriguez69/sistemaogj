<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Mail\ContactanosMailable;
use Illuminate\Http\Request;
use App\Models\Actividad;
use App\Models\Documento;
use App\Models\Objetivo;
use App\Models\EstadoActividad;
use App\Models\Operativa;
use App\Models\User;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Mail;
use Yajra\DataTables\Facades\DataTables;

class ActividadController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.actividades.index')->only('index');
        $this->middleware('can:admin.actividades.create')->only('create', 'store');
        $this->middleware('can:admin.actividades.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.actividades.destroy')->only('destroy');
        $this->middleware('can:admin.actividades.descarga')->only('descarga');
        $this->middleware('can:admin.actividades.deleteFile')->only('deleteFile');
    }


    public function index()
    {
        // $actividades = Actividad::where('status',12)->get();
        // $actividades = Actividad::paginate();
        //$actividades = Actividad::all();
        return view('admin.actividades.index');
    }

    public function indexobjetivo(Objetivo $objetivo)
    {
        return view('admin.actividades.indexobjetivo', compact("objetivo"));
    }
    
    public function gettaskbyproject(Request $request)
    {
        if($request->ajax())
        {
            $actividades = Actividad::with('objetivos', 'estadoactividad')->select('id', 'name', 'objetivo_id', 'begin', 'end', 'estadoactividad_id','peso','porcentaje')->where('objetivo_id', $request->objetivo)->get();
            return Datatables::of($actividades)
                    ->addColumn('actions',function($actividad){
                        return view('admin.actividades.action', compact('actividad'));
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }

    public function create()
    {

        $objetivos = Objetivo::all();
        $estados = EstadoActividad::all();
        $users = User::all();
        $poas = Operativa::where('enabled',0)->get();//finalizada=1 Nofinalizada=0
        return view('admin.actividades.create', compact('objetivos', 'estados','users','poas'));
    }

    public function store(request $request)
    {
        
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'objetivo_id'=>'required|numeric|min:1',
            'porcentaje'=>'required|numeric|min:0|max:100'
        ]);
        
        $actividad = actividad::create($request->all());
        
        //relacion mucho a mucho
        if($request->users){
            $actividad->users()->attach($request->users);
            $correo = new ContactanosMailable($request->all());
            foreach($request->users as $userid){
                $useremail = User::where("id", $userid)->first()->email;
                Mail::to($useremail)->send($correo);

            }
        }
        
        if($request->file('file') != null){
            $documentos = $request->file('file')->store('public/documentos');
            $url = Storage::url($documentos);
            $name = $request->file('file')->getClientOriginalName();
            Documento::create([
                'url' => $url,
                'name' => $name,
                'actividad_id' => $actividad->id
            ]);
        }
        return redirect()->route('admin.actividades.index', $actividad)->with('info','La Actividad se guardo con exito');
    }
    
    public function edit(Actividad $actividade)
    {
        $estados = EstadoActividad::all();
        $users = User::all();
        $files =  Documento::where('actividad_id',$actividade->id)->get();
        $poas = Operativa::where('enabled',0)->get();//finalizada=1 Nofinalizada=0
        $objetivosdelpoa =  Objetivo::where('operativa_id', $actividade->objetivos->operativas->id)->get();
        return view('admin.actividades.edit',compact("actividade","objetivosdelpoa","estados","users","files","poas"));
    }

    public function update(Request $request, Actividad $actividade)
    {
        if($actividade->objetivos->operativas->enabled==false){

            $request->validate([ //si no se usa este tiene que ser StoreEje (request)
                'name'=>'required',
                'description'=>'required',
                'objetivo_id'=>'required|numeric|min:1',
                'porcentaje'=>'required|numeric|min:0|max:100'
            ]);

            $actividade->update($request->all());

            //relacion mucho a mucho
            $actividade->users()->sync($request->users);
            
            
            
            if($request->file('file') != null){
                $documentos = $request->file('file')->store('public/documentos');
                $url = Storage::url($documentos);
                $name = $request->file('file')->getClientOriginalName();
        
                Documento::create([
                    'url' => $url,
                    'name' => $name,
                    'actividad_id' => $actividade->id
                ]);
            } 
            
            return redirect()->route('admin.actividades.edit', $actividade)->with('info', 'La actividad se actualizo con exito'); 
        }
    }

    public function deleteFile(Documento $file)
    {
        $url = str_replace('storage','public',$file->url);
        Storage::delete($url);
        $file->delete();
        $files =  Documento::where('actividad_id',$file->actividad_id)->get();
        return response()->json(['msg' => 'Eliminado con Exito', 'files' => $files]);
    }   

    public function descarga(Documento $file)
    {
        $url = str_replace('storage','public',$file->url);
        return Storage::download($url);
    }   

    public function show(Actividad $actividade)
    {
        $objetivos = Objetivo::all();
        $estados = EstadoActividad::all();
        $users = User::all();

        return view('admin.actividades.show',compact("actividade","objetivos","estados","users"));
    }

    public function destroy(Actividad $actividade)
    {
        $actividade->delete();
        
        return redirect()->route('admin.actividades.index')->with('info','La Actividad se elimino con exito');;
    }

    public function getinfoactividades()
    {
        

        $cantidadnoiniciada = Actividad::where('estadoactividad_id',1)->get()->count();
        $cantidadproceso = Actividad::where('estadoactividad_id',2)->get()->count();
        $cantidadterminados = Actividad::where('estadoactividad_id',3)->get()->count();
        $cantidadrevisado = Actividad::where('estadoactividad_id',4)->get()->count();
        $cantidadverificado = Actividad::where('estadoactividad_id',5)->get()->count();
        $cantidadvalidado = Actividad::where('estadoactividad_id',6)->get()->count();




        $cantidadtotal = Actividad::all()->count();
        return response()->json([
                                'noiniciada' => $cantidadnoiniciada, 
                                'procesos'  => $cantidadproceso, 
                                'terminados' => $cantidadterminados, 
                                'revisada' => $cantidadrevisado, 
                                'verificada'  => $cantidadverificado, 
                                'validada' => $cantidadvalidado, 
                                'total'  => $cantidadtotal
                            ]);
         
    }

    public function getactividad(Request $request)
    {
     
        if($request->ajax())
        {
            
            $actividades = Actividad::with('objetivos', 'estadoactividad')->select('id', 'name', 'objetivo_id', 'begin', 'end', 'estadoactividad_id','peso','porcentaje')->get();
            return Datatables::of($actividades)
                    ->addColumn('actions',function($actividad){
                        return view('admin.actividades.action', compact('actividad'));
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }


    public function searchProject(Request $request)
    {
        return $request->get('poaid');;
        $term = $request->get('term');

        $querys = Objetivo::where('name', 'LIKE' , '%' . $term . '%')->get();


        $data = [];

        foreach($querys as $query)
        {
            $data[] = [
                'id' => $query->id,
                'label' => $query->name
            ];
        }
        return $data;
    }
    
    public function searchObjetives(Request $request)
    {
        
        
        $term = $request->get('poaid');

        $querys = Objetivo::where('operativa_id', $term)->get();


        $data = [];

        foreach($querys as $query)
        {
            $data[] = [
                'id' => $query->id,
                'label' => $query->name
            ];
        }
        return $data;
    }

}