<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PostController extends Controller
{
    // Actions
    // any action must return response => [view , redirect , json , file]
    // actions usually be => [index , create , store , edit , update ,show , destroy/delete ]
    public function index()
    {
        // $posts = DB::select("SELECT * FROM `posts`"); // query builder
        $posts = Post::get(); // eloquent orm
        // dd($posts);
        // dump and die
        return view('posts' , compact('posts'));
    }
    public function create()
    {
        //
    }
    public function store()
    {
        //
    }
    public function edit()
    {
        //
    }
    public function update()
    {
        //
    }
    public function show()
    {
        //
    }
    public function delete()
    {
        //
    }
}
