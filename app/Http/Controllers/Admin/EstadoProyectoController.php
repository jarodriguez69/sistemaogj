<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\EstadoProyecto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class EstadoProyectoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estadosproyectos.index')->only('index');
        $this->middleware('can:admin.estadosproyectos.create')->only('create', 'store');
        $this->middleware('can:admin.estadosproyectos.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.estadosproyectos.enabled')->only('enabled');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

  
        $estadosproyectos = EstadoProyecto::paginate();
        return view('admin.estadosproyectos.index', compact('estadosproyectos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.estadosproyectos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required'
        ]);
        
        $estadosproyecto = EstadoProyecto::create($request->all());
        $estadosproyectos = EstadoProyecto::paginate();
        return redirect()->route('admin.estadosproyectos.index', compact('estadosproyectos'))->with('info','El Estado del Proyecto se guardo con exito');        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoProyecto $estadosproyecto)
    {
        return view ('admin.estadosproyectos.show', compact('estadosproyecto'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoProyecto $estadosproyecto)
    {
        
        return view('admin.estadosproyectos.edit', compact('estadosproyecto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoProyecto $estadosproyecto)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);

        $estadosproyecto->update($request->all());
        return redirect()->route('admin.estadosproyectos.index', $estadosproyecto)->with('info', 'El Estado de Proyecto se actualizo con exito');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function enabled(EstadoProyecto $estadosproyecto)
    {
        $estadosproyecto->enabled=!$estadosproyecto->enabled;
        $estadosproyecto->save();
        $estadosproyectos = EstadoProyecto::paginate();
        return redirect()->route('admin.estadosproyectos.index', compact("estadosproyectos"))->with('info', 'El Estado de Proyecto se actualizo con exito');
    }

    
}
