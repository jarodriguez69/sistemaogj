<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Agenda;

class AgendaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.agendas.index')->only('index');
        $this->middleware('can:admin.agendas.create')->only('create', 'store');
        $this->middleware('can:admin.agendas.edit')->only('edit', 'update', 'show', 'destroy');
    }


    public function index()
    {
        // $agendas = DB::select('select * from agendas where enabled = ?', [true]);
        $agendas = Agenda::paginate();
        
        return view('admin.agendas.index', compact("agendas"));
        
    }
    
    public function create()
    {
        return view('admin.agendas.create');
    }

    public function store(Request $request)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
        ]);

        // $agenda = new Agenda();

        // $agenda->name = $request->name;
        // $agenda->description = $request->description;
        // $agenda->enabled = true;
        // $agenda->save();

        $agenda = Agenda::create($request->all());

        return redirect()->route('admin.agendas.index', $agenda)->with('info', 'La Agenda se actualizo con exito'); 
    }
    
    public function edit(Agenda $agenda)
    {
        return view('admin.agendas.edit',compact("agenda"));
    }

    public function update(Request $request, Agenda $agenda)
    {
        $request->validate([ //si no se usa este tiene que ser StoreAgenda (request)
            'name'=>'required',
        ]);
        
        // $agenda->name= $request->name;
        // $agenda->description= $request->description;
        // $agenda->save();

        $agenda->update($request->all());
        return redirect()->route('admin.agendas.index', $agenda)->with('info', 'La Agenda se actualizo con exito');

    }

    public function show(Agenda $agenda)
    {
        return view('admin.agendas.show',compact('agenda'));
    }

    public function destroy(Agenda $agenda)
    {
        $agenda->delete();
        return redirect()->route('admin.agendas.index')->with('info','La Agenda se actualizo con exito');;
    }
}
