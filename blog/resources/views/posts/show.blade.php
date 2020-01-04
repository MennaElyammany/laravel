
@extends('layouts.app')
@section('content')

<div class="card m-5" style="max-width: 50rem;">
  <div class="card-header bg-light" >
    Post Info
  </div>
  <div class="card-body">
    <h5 class="card-title"> <span class="font-weight-bold" >Title:- </span>{{$post['title']}}</h5>
    <h5 class="card-title"> <span class="font-weight-bold" >Description:- </span>{{$post['content']}}</h5>
    

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