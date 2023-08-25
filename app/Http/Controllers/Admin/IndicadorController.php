<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Indicador;
use Illuminate\Http\Request;



class IndicadorController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.indicadores.index')->only('index');
        $this->middleware('can:admin.indicadores.create')->only('create', 'store');
        $this->middleware('can:admin.indicadores.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.indicadores.destroy')->only('destroy');
    }


    public function index()
    {
        return "jos";
        // $indicadores = DB::select('select * from indicadores where enabled = ?', [true]);
        $indicadores = Indicador::all();
        
        return view('admin.indicadores.index', compact("indicadores"));
        
    }
    
    public function create()
    {
        return view('admin.indicadores.create');
    }

    public function store(request $request)
    {
        // $indicador = new Indicador();

        // $indicador->name = $request->name;
        // $indicador->description = $request->description;
        // $indicador->enabled = true;
        // $indicador->save();

        $indicador = Indicador::create($request->all());

        return redirect()->route('admin.indicadores.index', $indicador)->with('info', 'El Indicador se creo con exito'); 
    }
    
    public function edit(Indicador $indicador)
    {
        return view('admin.indicadores.edit',compact("indicador"));
    }

    public function update(Request $request, Indicador $indicador)
    {
        $request->validate([ //si no se usa este tiene que ser StoreIndicador (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);
        
        // $indicador->name= $request->name;
        // $indicador->description= $request->description;
        // $indicador->save();

        $indicador->update($request->all());
        return redirect()->route('admin.indicadores.index', $indicador)->with('info', 'El Indicador se actualizo con exito');

    }

    public function getindicadorcount()
    {
       
            $cantidad = Indicador::all()->count();
            return response()->json(['msg' => $cantidad]);
         
    }

    public function show(Indicador $indicador)
    {
        return view('admin.indicadores.show',compact('indicador'));
    }



}

