<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;

class SearchController extends Controller
{
//    public function __construct()
//    {
//        $this->middleware(['auth']);
//    }

    public function search(Request $request)
    {
        if($request->ajax()){
            $posts = Post::where('content', 'LIKE', '%'.$request->search.'%')->get();

            return view('ajax')->with('results',$posts);
        }
    }
}
