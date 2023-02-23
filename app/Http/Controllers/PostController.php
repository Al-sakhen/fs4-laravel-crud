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
        return view('posts.index', compact('posts'));
    }


    public function create()
    {
        return view('posts.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'max:30'],
            'description' => 'required | min:10'
        ]);
        // $errors => messages
        // dd($request->all());
        Post::create([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('posts')->with('success' , 'Post Created Successfully');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.update', compact('post'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required' , 'max:30'],
            'description' => 'required | min:10'
        ]);

        $post = Post::find($request->id);
        $post->update([
            'title' => $request->title,
            'description' => $request->description
        ]);

        return redirect('posts')->with('success' , 'Post Updated Successfully');
    }


    public function show()
    {
        //
    }


    public function delete($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();
        // $post->destroy();
        return redirect()->back()->with('success' , 'Post deleted Successfully');
    }
}
