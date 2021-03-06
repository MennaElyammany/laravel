@extends('layouts.app')
@section('content')
<div class="container my-5">
<form method="POST" action="/posts" enctype="multipart/form-data">
@csrf
  <div class="form-group">
    <label for="exampleInputEmail1">Title</label>
    <input name="title"type="text" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" >
  </div>
  <div class="form-group">
    <label for="exampleFormControlTextarea1">Description</label>
    <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3" ></textarea>
  </div>
  <div class="form-group">
    <label for="image"> Attach image</label>
    <input type="file" class="form-control-file" name="image" >
  </div>
  <button type="submit" class="btn btn-primary">Submit</button>
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