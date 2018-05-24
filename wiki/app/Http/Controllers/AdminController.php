<?php

namespace App\Http\Controllers;

use App\Category;
use App\Post;
use App\User;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(['auth', 'admin']);
    }

    public function index()
    {
        return view('admin.index', [
            'posts' => Post::count(),
            'categories' => Category::count(),
            'users' => User::count()
        ]);
    }
    public function posts()
    {
        $posts = Post::paginate(15);

        return view('admin.posts', ['posts' => $posts]);
    }

}
