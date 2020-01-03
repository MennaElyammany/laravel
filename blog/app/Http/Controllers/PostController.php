<?php
namespace App\Http\Controllers;
use App\Post; 
use App\Http\Requests\StorePostRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;

class PostController extends Controller
{
    function index(){
        $posts = Post::paginate(4); //fetching data from database and paginating 4 posts per page
        return view('posts.index',['posts'=>$posts]);
    }
    function create()
    {
        return view('posts.create');
    }
    function store(StorePostRequest $request)
    {
        //alternative
        // $post = new Post;
        // $post->title = request()->title;
        // $post->content = request()->content;
        // $post->save();
        
        Post::create([
            'title' => $request->title,
            'content' => $request->content, // ?????????????????
            'user_id'=>$request->user()->id //user method in post model attach this post to current user
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
    {  $post=Post::findOrFail($id);
         $post->title = request()->title;
         $post->content = request()->content;
         $post->save();
         return redirect()->route('posts.index');
    }
    function destroy($id)
    {
        $post=Post::findOrFail($id);
        $post->delete();
        return redirect()->route('posts.index');
        
    }
}
