<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Blog;

class BlogController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:admin.blogs.index')->only('index');
        $this->middleware('can:admin.blogs.create')->only('create', 'store');
        $this->middleware('can:admin.blogs.edit')->only('edit', 'update', 'show');
        $this->middleware('can:admin.blogs.enabled')->only('enabled');
    }


    public function index()
    {
        // $blogs = DB::select('select * from blogs where enabled = ?', [true]);
        $blogs = Blog::paginate();
        
        return view('admin.blogs.index', compact("blogs"));
        
    }
    
    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        $request->validate([ //si no se usa este tiene que ser StoreEje (request)
            'name'=>'required',
            'description'=>'required'
        ]);

        // $blog = new Blog();

        // $blog->name = $request->name;
        // $blog->description = $request->description;
        // $blog->enabled = true;
        // $blog->save();

        $blog = Blog::create($request->all());

        return redirect()->route('admin.blogs.index', $blog)->with('info', 'El Blog se creo con exito'); 
    }
    
    public function edit(Blog $blog)
    {
        return view('admin.blogs.edit',compact("blog"));
    }

    public function update(Request $request, Blog $blog)
    {
        $request->validate([ //si no se usa este tiene que ser StoreBlog (request)
            'name'=>'required',
            'description'=>'required'
           
        ]);
        
        // $blog->name= $request->name;
        // $blog->description= $request->description;
        // $blog->save();

        $blog->update($request->all());
        return redirect()->route('admin.blogs.index', $blog)->with('info', 'El Blog se actualizo con exito');

    }

    public function show(Blog $blog)
    {
        return view('admin.blogs.show',compact('blog'));
    }

    public function enabled(Blog $blog)
    {
        $blog->enabled=!$blog->enabled;
        $blog->save();
        $blogs = Blog::paginate();
        return redirect()->route('admin.blogs.index',compact("blogs"))->with('info', 'El Blog se actualizo con exito');
    }
}
