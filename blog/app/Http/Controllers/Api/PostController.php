<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Post; 
use  App\Http\Resources\PostResource ;
use App\Http\Requests\StorePostRequest;
class PostController extends Controller
{
    //
    public function index(){
    
        return PostResource::collection(Post::with('user')->paginate(3)); //access class static method collection ->returns array 0f objects of it
    }
    public function show($id){
        $post=Post::find($id);
        return new PostResource ($post);
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
            'user_id'=>$request->user()->id, //user method in post model attach this post to current user
            
            //slug filled automaticlly
            ]);
            return new PostResource($post);    
    } 
}
