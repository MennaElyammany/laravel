<?php
namespace App\Http\Controllers;
use App\Post; 
use App\Http\Requests\StorePostRequest;
use App\Http\Requests\UpdatePostRequest;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Storage;
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
       
dd($request->user());
        $post=Post::create([
            
            'title' => $request->title,
            'content' => $request->content, // ?????????????????
            'user_id'=>$request->user()->id, //user method in post model attach this post to current user
            
            //slug filled automaticlly
            ]);
            if($request->image){
            $post->update(['image'=>$request->file('image')->store('uploads','public')]);
           
            }
            
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
    function update(UpdatePostRequest $request,$id)
    { 
         $post=Post::findOrFail($id);
         $post->slug = null; //reset slug 
         $post->title =$request->title;
         $post->content = $request->content;
        
             if($request->image){
                unlink(public_path()."/storage/".$post['image']);
                $post->update(['image'=>$request->file('image')->store('uploads','public')]);
             }
            else{
                if($post->image){
                unlink(public_path()."/storage/".$post['image']); 
                $post->update(['image'=>null]);
            }}
         $post->save();
         return redirect()->route('posts.index');
    }
    function destroy($id)
    {
        $post=Post::findOrFail($id);
        
        if($post['image'])
        {
            
        unlink(public_path()."/storage/".$post['image']); //delete image from storage
      
        }
        $post->delete();
        
        return redirect()->route('posts.index');
        
    }
}
