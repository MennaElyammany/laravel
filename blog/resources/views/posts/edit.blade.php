@extends('layouts.app')
@section('content')

   <div class="container my-5">
<form method="POST" action="/posts/{{$post['id']}}">
@csrf
@method('PATCH') <!-- to use patch method -->
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" value= "{{$post['title']}}">
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" >{{$post['content']}}</textarea>
  </div>
  
  <button type="submit" class="btn btn-primary"> Update</button>
</form>
</div>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

@endsection