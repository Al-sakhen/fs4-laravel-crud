<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

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
            'title' => ['required', 'max:30'],
            'description' => 'required | min:10',
            'image' => ['image', 'mimes:png,jpg,jpeg']
        ]);

        if( $request->hasFile('image') ){
            $image = $request->file('image'); //UploadedFile
            $path = $image->store('uploaded_images');
        }


        Post::create([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $path ?? null
        ]);

        return redirect()->route('posts.index')->with('success', 'Post Created Successfully');
    }


    public function edit($id)
    {
        $post = Post::findOrFail($id);
        return view('posts.update', compact('post'));
    }


    public function update(Request $request)
    {
        $request->validate([
            'title' => ['required', 'max:30'],
            'description' => 'required | min:10'
        ]);

        $post = Post::find($request->id);
        $old_image = $post->image; //path(truthly) || null(falsy)

        if( $request->hasFile('image') ){
            $image = $request->file('image'); //UploadedFile
            $new_image = $image->store('uploaded_images');
        }
        $post->update([
            'title' => $request->title,
            'description' => $request->description,
            'image' => $new_image ?? $old_image,
        ]);

        // delete old image if there is a new one
        if($old_image && $request->hasFile('image')){
            Storage::delete($old_image);
        }

        return redirect()->route('posts.index')->with('success', 'Post Updated Successfully');
    }


    public function show()
    {
        //
    }


    public function destroy($id)
    {
        $post = Post::findOrFail($id);
        $post->delete();

        if($post->image){
            Storage::delete($post->image);
        }
        return redirect()->back()->with('success', 'Post deleted Successfully');
    }
}
