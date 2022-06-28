<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Eje;
use Illuminate\Http\Request;
use App\Http\Requests\StoreEje;


class EjeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.ejes.index')->only('index');
        $this->middleware('can:admin.ejes.create')->only('create', 'store');
        $this->middleware('can:admin.ejes.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.ejes.destroy')->only('destroy');
        $this->middleware('can:admin.ejes.enabled')->only('enabled');
    }


    public function index()
    {
        // $ejes = DB::select('select * from ejes where enabled = ?', [true]);
        $ejes = Eje::paginate();
        
        return view('admin.ejes.index', compact("ejes"));
        
    }
    
    public function create()
    {
        return view('admin.ejes.create');
    }

    public function store(StoreEje $request)
    {
        // $eje = new Eje();

        // $eje->name = $request->name;
        // $eje->description = $request->description;
        // $eje->enabled = true;
        // $eje->save();

        $eje = Eje::create($request->all());

        return redirect()->route('admin.ejes.index', $eje)->with('info', 'El Eje se creo con exito'); 
    }
    
    public function edit(Eje $eje)
    {
        return view('admin.ejes.edit',compact("eje"));
    }

    public function update(Request $request, Eje $eje)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required',
            'enabled'=>'required'
        ]);
        
        // $eje->name= $request->name;
        // $eje->description= $request->description;
        // $eje->save();

        $eje->update($request->all());
        return redirect()->route('admin.ejes.index', $eje)->with('info', 'El Eje se actualizo con exito');

    }

    public function getejecount()
    {
       
            $cantidad = Eje::all()->count();
            return response()->json(['msg' => $cantidad]);
         
    }

    public function show(Eje $eje)
    {
        return view('admin.ejes.show',compact('eje'));
    }

    public function enabled(Eje $eje)
    {
        $eje->enabled=!$eje->enabled;
        $eje->save();
        $ejes = Eje::paginate();
        return redirect()->route('admin.ejes.index',compact("ejes"))->with('info', 'El Eje se actualizo con exito');
    }


}

