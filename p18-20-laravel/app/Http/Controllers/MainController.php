<?php

namespace App\Http\Controllers;

use App\Categorie;
use Illuminate\Http\Request;

use App\Post;
use App\Page;

class MainController extends Controller
{
    public function posts(){
        return view('posts', [
            'pageTitle' => "Add Page"
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
    public function index(Request $request){
        if(isset($request->id)){
            $pages = Page::where('category_id', $request->id)->get();
        }else{
            $pages = Page::get();
        }

        $cat = Categorie::get();
        return view('index', [
            'pageTitle' => "Homepage",
            'pages' => $pages,
            'cat' => $cat
        ]);
    }
}
