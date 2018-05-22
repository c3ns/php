<?php

namespace App\Http\Controllers;


use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class CategoryController extends Controller
{
    public function __construct(){
        $this->middleware('auth', ['except' => ['index','show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cat = Category::all();

        if(Auth::user()->cant('createCategory', Category::class))
            return redirect(route('home'));
        return view('categories.index', ['categories' => $cat]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        if(Auth::user()->cant('createCategory', Category::class))
            return redirect(route('home'));
        return view('categories.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validate = $request->validate([
            'name' => 'required|max:200|min:3|unique:category',
            'position' => 'required|integer|min:1',
        ]);

        $data = $request->all();
        $cat = new Category();
        $cat->name = $request->input('name');
        $cat->position = $request->input('position');

        $cat->save();

        $request->session()->flash('status', 'Category added successful');

        return redirect(route('cat.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $posts = Post::where('category', $id)->paginate(15);

        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cat = Category::find($id);

        if(Auth::user()->cant('createCategory', Category::class))
            return redirect(route('home'));
        return view('categories.edit', ['category' => $cat]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $validate = $request->validate([
            'name' => 'required|max:200|min:3',
            'position' => 'required|integer|min:1',
        ]);

        $data = $request->all();
        $cat = Category::find($id);
        $cat->name = $request->input('name');
        $cat->position = $request->input('position');

        $cat->save();

        $request->session()->flash('status', 'Category updated!');

        return redirect(route('cat.index'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::find($id);


        $category->delete();
        Session::flash('status', 'Category deleted');

        if(Auth::user()->cant('createCategory', Category::class))
            return redirect(route('home'));
        return redirect(route('cat.index'));
    }
}
