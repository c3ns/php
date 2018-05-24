<?php

namespace App\Http\Controllers;

use App\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth']);
    }

    public function index()
    {
        $posts = Post::where('user', Auth::user()->id)->get();

        return view('user.index', ['posts' => $posts]);
    }
}
