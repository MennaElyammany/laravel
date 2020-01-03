@extends('layouts.header')
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

    
@endsection