<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\EstadoTarea;

class EstadoTareaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estadostareas.index')->only('index');
        $this->middleware('can:admin.estadostareas.create')->only('create', 'store');
        $this->middleware('can:admin.estadostareas.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.estadostareas.enabled')->only('enabled');
    }
    public function index()
    {
        $estadostareas = EstadoTarea::paginate();
        return view('admin.estadostareas.index', compact('estadostareas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.estadostareas.create');
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
        
        $estadostarea = EstadoTarea::create($request->all());
        $estadostareas = EstadoTarea::paginate();
        return redirect()->route('admin.estadostareas.index', compact('estadostareas'))->with('info','El Estado de Tarea guardo con exito');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(EstadoTarea $estadostarea)
    {
        return view ('admin.estadostareas.show', compact('estadostarea'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(EstadoTarea $estadostarea)
    {
        return view('admin.estadostareas.edit', compact('estadostarea'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, EstadoTarea $estadostarea)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);

        $estadostarea->update($request->all());
        return redirect()->route('admin.estadostareas.show', $estadostarea)->with('info', 'El Estado de Tarea se actualizo con exito');; 
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

    public function enabled(EstadoTarea $estadostarea)
    {
        $estadostarea->enabled=!$estadostarea->enabled;
        $estadostarea->save();
        $estadostareas = EstadoTarea::paginate();
        
        return redirect()->route('admin.estadostareas.index', compact("estadostareas"))->with('info', 'El Estado de Tarea se actualizo con exito'); 
        

    }
}
