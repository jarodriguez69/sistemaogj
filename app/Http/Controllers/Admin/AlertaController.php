<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Alerta;
use App\Models\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\Auth;
date_default_timezone_set("America/Argentina/Tucuman");

class AlertaController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('can:admin.alertas.index')->only('index');
    //     $this->middleware('can:admin.alertas.create')->only('create', 'store');
    //     $this->middleware('can:admin.alertas.edit')->only('edit', 'update', 'show');
    //     $this->middleware('can:admin.alertas.destroy')->only('destroy');
    //     $this->middleware('can:admin.alertas.descarga')->only('descarga');
    //     $this->middleware('can:admin.alertas.deleteFile')->only('deleteFile');
    // }


    public function index()
    {
        return view('admin.alertas.index');
    }

  
    public function create()
    {
        $users = User::all();
        return view('admin.alertas.create', compact('users'));
    }

    public function store(request $request)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'end'=>'required',
            'days'=>'required',
            'description'=>'required'
        ]);
        
        $alerta = alerta::create($request->all());
        
        //relacion mucho a mucho
        if($request->users){
            $alerta->users()->attach($request->users);
        }
     
        
        return redirect()->route('admin.alertas.index', $alerta)->with('info','La Alerta se guardo con exito');
    }
    
    public function edit(Alerta $alerta)
    {
        $users = User::all();
        return view('admin.alertas.edit',compact('alerta','users'));
    }

    public function update(Request $request, Alerta $alerta)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'end'=>'required',
            'days'=>'required',
            'description'=>'required'
        ]);

        $alerta->update($request->all());

        //relacion mucho a mucho
        $alerta->users()->sync($request->users);
        
        return redirect()->route('admin.alertas.edit', $alerta)->with('info', 'La alerta se actualizo con exito'); 

    }

 

    public function show(Alerta $alerta)
    {
        $users = User::all();
        return view('admin.alertas.show',compact('alerta','users'));
    }

    public function destroy(Alerta $alerta)
    {
        $alerta->delete();
        
        return redirect()->route('admin.alertas.index')->with('info','La Alerta se elimino con exito');;
    }

    public function getalertas(Request $request)
    {
        if($request->ajax())
        {
            $alertas = Alerta::select('id', 'name', 'description', 'days', 'end')->get();

            return Datatables::of($alertas)
                    ->addColumn('actions',function($alerta){
                        return view('admin.alertas.action', compact('alerta'));
                    })
                    ->rawColumns(['actions'])
                    ->make(true);
        }
    }
  
    
    public function getinfoalerts()
    {

            $user = Auth::user();
            $now = date('Y-m-d');
            $alertas = Alerta::where('end','>=', $now)->get();//->with('user')
            $salida="<ul> ";
            
            foreach($alertas as $alerta)
            {
                $date_past = strtotime('-'. $alerta->days .' day', strtotime($alerta->end));
                $date_past = date('Y-m-d', $date_past);
               
                if($alerta->users->contains($user) && $date_past == $now)
                {
                    $salida = $salida . "<li>" . $alerta->name . "</li>";
                }
                
                
            }
            if($salida == "<ul> "){
                $salida = "No tiene alertas para ver";
            }
            else{
                $salida = $salida . "</ul>";
            }
            




            return response()->json(['alertas'  => $salida]);
         
    }

}
