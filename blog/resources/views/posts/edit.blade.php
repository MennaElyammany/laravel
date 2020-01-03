@extends('layouts.header')
@section('content')

   <div class="container my-5">
<form method="POST" action="/posts/{{$post['id']}}">
@csrf
@method('PATCH') <!-- to use patch method -->
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder= {{$post['title']}}>
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" placeholder={{$post['content']}}></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary"> Update</button>
</form>
</div>


@endsection