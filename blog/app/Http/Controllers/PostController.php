<?php

namespace App\Http\Controllers;
use App\Post; 

use Illuminate\Http\Request;

class PostController extends Controller
{
    function index(){
        $posts = Post::all(); //fetching 
        return view('posts.index',['posts'=>$posts]);
    }
    function create()
    {
        return view('posts.create');
    }
    function store()
    {
        //alternative
        // $post = new Post;
        // $post->title = request()->title;
        // $post->content = request()->content;
        // $post->save();
        
        Post::create([
            'title' => request()->title,
            'content' => request()->content
        ]);
        return redirect()->route('posts.index');
    }
    function show($id)
    {
        return view('posts.show', ['post' => Post::findOrFail($id)]) ;   //another way return request()->post;
    }
    function edit($id)
    {
        return view('posts.edit', ['post' => Post::findOrFail($id)]);
    }
    function update($id)
    {  Post::destroy($id);
         return redirect()->route('posts.index');
    }
    function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->destroy();
        return redirect()->route('posts.index');
        
    }
}
