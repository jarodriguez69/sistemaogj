<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Proceso;
use Illuminate\Http\Request;
use App\Http\Requests\StoreProceso;


class ProcesoController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.procesos.index')->only('index');
        $this->middleware('can:admin.procesos.create')->only('create', 'store');
        $this->middleware('can:admin.procesos.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.procesos.destroy')->only('destroy');
        $this->middleware('can:admin.procesos.enabled')->only('enabled');
    }


    public function index()
    {
        // $procesos = DB::select('select * from procesos where enabled = ?', [true]);
        $procesos = Proceso::All();
        
        return view('admin.procesos.index', compact("procesos"));
        
    }
    
    public function create()
    {
        return view('admin.procesos.create');
    }

    public function store(request $request)
    {
        // $proceso = new Proceso();

        // $proceso->name = $request->name;
        // $proceso->description = $request->description;
        // $proceso->enabled = true;
        // $proceso->save();

        $proceso = Proceso::create($request->all());

        return redirect()->route('admin.procesos.index', $proceso)->with('info', 'El Proceso se creo con exito'); 
    }
    
    public function edit(Proceso $proceso)
    {
        return view('admin.procesos.edit',compact("proceso"));
    }

    public function update(Request $request, Proceso $proceso)
    {
        $request->validate([ //si no se usa este tiene que ser StoreProceso (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);
        
        // $proceso->name= $request->name;
        // $proceso->description= $request->description;
        // $proceso->save();

        $proceso->update($request->all());
        return redirect()->route('admin.procesos.index', $proceso)->with('info', 'El Proceso se actualizo con exito');

    }

    public function getprocesocount()
    {
       
            $cantidad = Proceso::all()->count();
            return response()->json(['msg' => $cantidad]);
         
    }

    public function show(Proceso $proceso)
    {
        return view('admin.procesos.show',compact('proceso'));
    }

    public function enabled(Proceso $proceso)
    {
        $proceso->enabled=!$proceso->enabled;
        $proceso->save();
        $procesos = Proceso::paginate();
        return redirect()->route('admin.procesos.index',compact("procesos"))->with('info', 'El Proceso se actualizo con exito');
    }


}

