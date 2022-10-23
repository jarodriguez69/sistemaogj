<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Estrategica;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEstrategica;


class EstrategicaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.estrategicas.index')->only('index');
        $this->middleware('can:admin.estrategicas.create')->only('create', 'store');
        $this->middleware('can:admin.estrategicas.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.estrategicas.destroy')->only('destroy');
        $this->middleware('can:admin.estrategicas.enabled')->only('enabled');
    }


    public function index()
    {
        // $estrategicas = DB::select('select * from estrategicas where enabled = ?', [true]);
        $estrategicas = Estrategica::where("id","!=",1)->paginate();
        
        return view('admin.estrategicas.index', compact("estrategicas"));
        
    }
    
    public function create()
    {
        return view('admin.estrategicas.create');
    }

    public function store(Request $request)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEstrategica (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);

        $estrategica = Estrategica::create($request->all());

        return redirect()->route('admin.estrategicas.index', $estrategica)->with('info', 'La Planificación Estratégica se creo con exito'); 
    }
    
    public function edit(Estrategica $estrategica)
    {
        return view('admin.estrategicas.edit',compact("estrategica"));
    }

    public function update(Request $request, Estrategica $estrategica)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEstrategica (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);
        
        // $estrategica->name= $request->name;
        // $estrategica->description= $request->description;
        // $estrategica->save();

        $estrategica->update($request->all());
        return redirect()->route('admin.estrategicas.index', $estrategica)->with('info', 'La Planificación Estratégica se actualizo con exito');

    }

    public function getestrategicacount()
    {
       
            $cantidad = Estrategica::all()->count();
            return response()->json(['msg' => $cantidad]);
         
    }

    public function show(Estrategica $estrategica)
    {
        return view('admin.estrategicas.show',compact('estrategica'));
    }

    public function enabled(Estrategica $estrategica)
    {
        $estrategica->enabled=!$estrategica->enabled;
        $estrategica->save();
        $estrategicas = Estrategica::paginate();
        return redirect()->route('admin.estrategicas.index',compact("estrategicas"))->with('info', 'La Planificación Estratégica se actualizo con exito');
    }


}

