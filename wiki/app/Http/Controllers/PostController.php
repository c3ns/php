<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

class PostController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth', ['except' => ['index', 'show']]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $posts = Post::paginate(15);
        return view('posts.index', ['posts' => $posts]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $cat = Category::get();
        return view('posts.create', ['categories' => $cat]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {

        $validatedData = $request->validate([
            'title' => 'required|max:150|min:3',
            'content' => 'required|min:5',
        ]);

        $data = $request->all();

        $post = new Post;

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category = 2;
        $post->user = Auth::user()->id;

        $post->save();



        foreach($data['category'] as $cat_id)
        {
            $post->cat()->attach($cat_id);
        }

        $request->session()->flash('status', 'Post added successful');

        return redirect(route('posts.index'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $post = Post::find($id);
        return view('posts.show', ['post' => $post]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $post = Post::find($id);
        $cat = Category::all();
        $user = Auth::user();

        if ($user->can('edit', $post)) {
            return view('posts.edit', [
                'post' => $post,
                'categories' => $cat
            ]);
        } else
            return redirect(route('home'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request $request
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|max:150|min:3',
            'content' => 'required|min:5',
        ]);
        $data = $request->all();
        $post = Post::find($id);

        $post->title = $data['title'];
        $post->content = $data['content'];
        $post->category = $data['category'];
        $post->user = Auth::user()->id;

        $post->save();

        $request->session()->flash('status', 'Post updated');

        return redirect(route('posts.show', ['id' => $post->id]));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $post = Post::find($id);
        $user = Auth::user();

        if ($user->cant('edit', $post))
            return redirect(route('home'));

        $post->delete();
        Session::flash('status', 'Post deleted');
        return redirect(route('home'));
    }
}