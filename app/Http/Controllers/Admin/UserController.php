<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Livewire\WireDirective;
use Spatie\Permission\Models\Role;

use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{

    public function __construct()
    {
        $this->middleware('can:admin.users.index')->only('index');
        $this->middleware('can:admin.users.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.users.destroy')->only('destroy');
        $this->middleware('can:admin.users.create')->only('create', 'store');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        return view('admin.users.index', compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::all();
        return view('admin.users.create', compact('roles'));
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
            'email'=>'required'
            
        ]); 
         
       
        if($request->password !="")
        {
            $request->merge(['password' => Hash::make($request->password)]);
        }
        
        $user = User::create($request->all());
       
        $user->roles()->sync($request->roles);
        return redirect()->route('admin.users.index', $user)->with('info','El Usuario se guardo con exito');;
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $roles = Role::all();
        return view('admin.users.show',compact("user"), compact("roles"));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        
        $roles = Role::all();
        
        return view('admin.users.edit',compact("user"), compact("roles"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        //
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'email'=>'required'
            
        ]);
        
        $user->update($request->all());
        $user->roles()->sync($request->roles);

        return redirect()->route('admin.users.index', $user)->with('info','El Usuario se actualizo con exito');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $user->delete();
        
        return redirect()->route('admin.users.index')->with('info','El Usuario se elimino con exito');;
    }
}
