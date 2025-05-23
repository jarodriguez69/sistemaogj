<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Operativa;
use App\Models\Estrategica;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;



class OperativaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.operativas.index')->only('index');
        $this->middleware('can:admin.operativas.create')->only('create', 'store');
        $this->middleware('can:admin.operativas.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.operativas.destroy')->only('destroy');
    }

    public function index()
    {
        $operativas = Operativa::where("id","!=",1)->get();
        return view('admin.operativas.index', compact("operativas"));
    }

    public function indexestrategica(Estrategica $estrategica)
    {
        $operativas = Operativa::where('estrategica_id', $estrategica->id)->get();
        return view('admin.operativas.indexestrategica', compact("operativas", "estrategica"));
    }
    
    public function create()
    {
        $estrategicas = Estrategica::all();
        $users = User::all();
        return view('admin.operativas.create', compact('estrategicas','users'));
    }

    public function store(request $request)
    {
        $request->validate([ 
            'name'=>'required',
            'description'=>'required',
            'estrategica_id'=>'required'
        ]);
        
        $operativa = operativa::create($request->all());

        //relacion mucho a mucho
        if($request->users){
            $operativa->users()->attach($request->users);
        }

        return redirect()->route('admin.operativas.index', $operativa)->with('info','La Planificación Operativa se guardo con exito');        ;
    }
    
    public function edit(Operativa $operativa)
    {
        $estrategicas = Estrategica::all();
        $users = User::all();
        return view('admin.operativas.edit', compact("operativa"), compact("estrategicas","users"));
    }

    public function update(Request $request, Operativa $operativa)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEstrategica (request)
            'name'=>'required',
            'description'=>'required',
            'estrategica_id'=>'required'
        ]);
        
        $operativa->update($request->all());
        //relacion mucho a mucho
        if($request->users){
            $operativa->users()->sync($request->users);
        }
        return redirect()->route('admin.operativas.index', $operativa)->with('info', 'La Planificación Operativa se actualizo con exito'); 

    }

    public function show(Operativa $operativa)
    {
        $users = User::all();
        return view('admin.operativas.show',compact('operativa','users'));
    }


    public function enabled(Operativa $operativa)
    {
        $operativa->enabled=!$operativa->enabled;
        $operativa->save();
        $operativas = Operativa::All();
        return redirect()->route('admin.operativas.index',compact("operativas"))->with('info', 'La Planificación Operativa se actualizo con exito');
    }

    public function destroy(Operativa $operativa)
    {
        $operativa->delete();
        
        return redirect()->route('admin.operativas.index');
    }
}
