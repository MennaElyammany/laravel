<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Post; 
use App\Comment; 
use App\Http\Requests\StoreCommentRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Foundation\Http\FormRequest;

class commentsController extends Controller
{
    function store(StoreCommentRequest $request,$id)
    {    

        $post = Post::findOrFail($id);
    
        Comment::create([

            'body' => $request->body,
            'user_id'=>$request->user()->id, 
            'post_id'=>$id
            ]);
            
            
            return back();
    }
}
