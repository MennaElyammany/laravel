@extends('layouts.header')
@section('content')
<div class="container my-5">
<form method="POST" action="/posts">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
  </div>
  
  <button type="submit" class="btn btn-primary">Submit</button>
</form>
</div>
@endsection