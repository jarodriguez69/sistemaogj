<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Grupo;
use App\Models\Eje;
use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Support\Facades\Auth;



class GrupoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.grupos.index')->only('index');
        $this->middleware('can:admin.grupos.create')->only('create', 'store');
        $this->middleware('can:admin.grupos.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.grupos.destroy')->only('destroy');
    }

    public function index()
    {
        $grupos = Grupo::all();
        return view('admin.grupos.index', compact("grupos"));
    }

    public function indexeje(Eje $eje)
    {
        $grupos = Grupo::where('eje_id', $eje->id)->get();
        return view('admin.grupos.indexeje', compact("grupos", "eje"));
    }
    
    public function create()
    {
        $ejes = Eje::all();
        return view('admin.grupos.create', compact('ejes'));
    }

    public function store(request $request)
    {
        $request->validate([ 
            'name'=>'required',
            'description'=>'required',
            'eje_id'=>'required'
        ]);
        
        $grupo = grupo::create($request->all());

        return redirect()->route('admin.grupos.index', $grupo)->with('info','El Grupo se guardo con exito');        ;
    }
    
    public function edit(Grupo $grupo)
    {
        $ejes = Eje::all();
        return view('admin.grupos.edit', compact("grupo"), compact("ejes"));
    }

    public function update(Request $request, Grupo $grupo)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'eje_id'=>'required'
        ]);
        
        $grupo->update($request->all());

        return redirect()->route('admin.grupos.index', $grupo)->with('info', 'El Grupo se actualizo con exito'); 

    }

    public function show(Grupo $grupo)
    {
        return view('admin.grupos.show',compact('grupo'));
    }


    public function enabled(Grupo $grupo)
    {
        $grupo->enabled=!$grupo->enabled;
        $grupo->save();
        $grupos = Grupo::All();
        return redirect()->route('admin.grupos.index',compact("grupos"))->with('info', 'El Eje se actualizo con exito');
    }

    public function destroy(Grupo $grupo)
    {
        $grupo->delete();
        
        return redirect()->route('admin.grupos.index');
    }
}
