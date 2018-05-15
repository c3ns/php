<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Post;

class MainController extends Controller
{
    public function index(){
        return view('index', [
            'pageTitle' => "Homepage"
        ]);
    }
    public function store(Request $request){
        if ($request->isMethod('post')) {
            $data = $request->all();
            $post = new Post();
            $post->title = $data['title'];
            $post->content = $data['content'];
            $post->save();

            return redirect(route("main"));
        }
    }
    public function posts(){
        $posts = Post::get();
        return view('posts', [
            'pageTitle' => "Posts",
            'posts' => $posts
        ]);
    }
}
