
@extends('layouts.app')
@section('content')

<div class="card m-5" style="max-width: 50rem;">
  <div class="card-header bg-light" >
    Post Info
  </div>

  @if($post['image'])
  <img src="{{(asset('storage/'.$post['image']))}}"style="width: 150px; height: 150px" >
  
  @endif
 
  <div class="card-body">
    <h5 class="card-title"> <span class="font-weight-bold" >Title:- </span>{{$post['title']}}</h5>
    <h5 class="card-title"> <span class="font-weight-bold" >Description:- </span>{{$post['content']}}</h5>
    
    <form class="form-inline" method="POST" action="/comments/{{$post['id']}}">
            @csrf
            <div class="form-group">
       
        <textarea name="body" class="form-control" id="exampleFormControlTextarea1"  placeholder="Add Comment" ></textarea>
         </div>
             <button type="submit" class="btn btn-info my-3" >ADD</button>   
                    
           </form>
           @foreach($post->comments as $comment)  
           <div style="background-color:#9FF9C9">
           <p>{{ $comment->user->name }}  {{\Carbon\Carbon::parse($comment->created_at)->format('y-m-d')}}</p>
           <p>{{ $comment->body }}</p>
           </div>
          @endforeach


  </div>
</div>
<div class="card m-5" style="max-width: 50rem;">
  <div class="card-header bg-light" >
    Post Creator Info
  </div>
  <div class="card-body">
    <h5 class="card-title"> <span class="font-weight-bold" >Name:- </span>{{$post->user->name}}</h5>
    <h5 class="card-title"> <span class="font-weight-bold" >Email:- </span>{{$post->user->email}}</h5>
    <h5 class="card-title"> <span class="font-weight-bold" >Created at:- </span> {{Carbon::createFromFormat('Y-m-d H:i:s', $post["created_at"])->format('l jS \\of F Y h:i:s A')}}</h5>
  </div>
</div>

    
@endsection